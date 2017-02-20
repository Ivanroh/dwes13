package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class MostrarCatalogo
 */
@WebServlet("/MostrarCatalogo")
public class MostrarCatalogo extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {

		// ServletContext contexto = getServletContext();
		response.setContentType("text/html;UTF-8");
		PrintWriter out = response.getWriter();
		out.println("<html><head><meta charset='UTF-8'/></head><body>");
		// Cancion cancion=new Cancion();

		Connection conn = null;
		Statement sentencia = null;
		try {
			// Paso 1: Cargar el driver JDBC.
			Class.forName("org.mariadb.jdbc.Driver").newInstance();

			// Paso 2: Conectarse a la Base de Datos utilizando la clase
			// Connection
			String userName = "alum";
			String password = "alumno";
			String url = "jdbc:mariadb://localhost:4000/catalogo";
			conn = DriverManager.getConnection(url, userName, password);

			// Paso 3: Crear sentencias SQL, utilizando objetos de tipo
			// Statement
			sentencia = conn.createStatement();

			// Paso 4: Ejecutar la sentencia SQL a través de los objetos
			// Statement
			String consulta = "SELECT * from obra";

			if (request.getParameter("obra") != null) {

				consulta = "SELECT * from obra where titulo ='"+ request.getParameter("obra") + "'";

				//out.println("<p>" + consulta + "</p>");
				if (request.getParameter("nom") != null) {
					if (request.getParameter("nom").equalsIgnoreCase("titulo")) {
						if (request.getParameter("orden").equalsIgnoreCase("desc")) {
							consulta = "SELECT * from obra order by titulo desc";
						} else
							consulta = "SELECT * from obra order by titulo";
					} else if (request.getParameter("nom").equalsIgnoreCase("autor")) {
						if (request.getParameter("orden").equalsIgnoreCase("desc")) {
							consulta = "SELECT * from obra order by artista desc";
						} else
							consulta = "SELECT * from obra order by artista";
					}
				}
			} else
				consulta = "SELECT * from obra";
			
			ResultSet rset = sentencia.executeQuery(consulta);

			if (!rset.isBeforeFirst()) {
				out.println("<h3>No hay resultados</h3>");
			}

			// Paso 5: Mostrar resultados

			/*
			 * Incluye en /MostrarCatalogo un formulario con un campo de texto
			 * para buscar obras por nombre. El formulario será procesado por la
			 * misma plantilla, y mostrará solo aquellas obras cuyo nombre
			 * contenga el texto buscado. Esto puede hacerse de dos formas: Más
			 * sencilla: obligar a que contenga todo el texto leído del campo en
			 * el mismo orden Más compleja y mejor: separar las palabras
			 * introducidas en el campo, y obligar a que las contenga todas Al
			 * final se incluirá el enlace Eliminar filtros para volver a la
			 * misma plantilla, sin parámetros. (Opcional): permitir la búsqueda
			 * también por autor
			 */

			out.print("<h3>Buscar obra por título</h3>");
			out.print("<form action='MostrarCatalogo' method='post'>");
			out.print("	<label>Nombre de la obra: </label><input type='text' name='obra'> <br />");
			out.print("	<input type='submit' name='enviar' value='Buscar Obra'>");
			out.print("</form>");

			out.print("<table border='1'>");
			out.print("<tr>");
			out.print(
					"<th>Título <a href='MostrarCatalogo?nom=titulo&orden=asc'>&#9650;</a><a href='MostrarCatalogo?nom=titulo&orden=desc'>&#9660;</a></th>");
			out.print(
					"<th>Autor <a href='MostrarCatalogo?nom=autor&orden=asc'>&#9650;</a><a href='MostrarCatalogo?nom=autor&orden=desc'>&#9660;</a></th>");
			out.print("</tr>");
			while (rset.next()) {
				Cancion can = new Cancion(rset.getInt("idObra"), rset.getString("artista"), rset.getString("titulo"),
						rset.getString("categoria"), rset.getDouble("duracion"), rset.getString("imagen"),
						rset.getInt("idAutor"));
				out.print("<tr>");
				out.print("<td><a href='MostrarObra?idObra=" + can.getIdObra() + "' >" + can.getTitulo() + "</td>");
				out.print(
						"<td><a href='MostrarCatalogo?id=" + can.getIdAutor() + "' >" + can.getArtista() + "</a></td>");
				out.print("</tr>");
			}
			out.print("</table>");

			// Crear filtro para id autor

			int id = 0;
			String idParametro = request.getParameter("id");

			try {
				id = Integer.parseInt(idParametro);
			} catch (Exception e) {
				System.out.println(e);
			}
			if (id != 0) {
				// _______________________________________
				String consultaAutor = "SELECT * from autor where id=" + id;
				rset = sentencia.executeQuery(consultaAutor);
				if (!rset.isBeforeFirst()) {
					out.println("<h3>No hay resultados</p>");
				}
				// Paso 5: Mostrar resultados

				else {
					rset.next();
					out.println("<p>Obras del autor " + rset.getString("nombre") + ":</p>");
				}

				String consultaObras = "SELECT *,nombre AS autor FROM obra,autor WHERE id = " + id
						+ " AND autor.id=obra.idAutor";
				rset = sentencia.executeQuery(consultaObras);
				if (!rset.isBeforeFirst()) {
					out.println("<p>Este autor no tiene ninguna obra</p>");
				}
				out.println("<table border='1'>");

				while (rset.next()) {
					out.println("<tr>");
					out.println("<th style='background-color:lightgrey;' >Obra</th>");
					out.println("<td>Titulo:<span> " + rset.getString("titulo") + "</span></td>");
					out.println("<td>Categoria: <span>" + rset.getString("categoria") + "</span></td>");
					out.println("<td>Duración: <span>" + rset.getDouble("duracion") + "</span></td>");
					out.println("<td><img  src='img/" + rset.getString("imagen") + "' width='100px'></td>");
					out.println("</tr>");
				}
				out.println("</table>");
			}
			out.print("<br/><a href='/Java13-Catalogo/MostrarCatalogo'>Eliminar filtros</a>");

			// Paso 6: Desconexión
			if (sentencia != null)
				sentencia.close();
			if (conn != null)
				conn.close();
		} catch (Exception e) {
			e.printStackTrace();
		}

		out.println("</body></html>");
		out.close();

	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
