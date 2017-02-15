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
			ResultSet rset = sentencia.executeQuery(consulta);

			if (!rset.isBeforeFirst()) {
				out.println("<h3>No hay resultados</p>");
			}

			// Paso 5: Mostrar resultados

			out.print("<table border='1'>");
			out.print("<tr>");
			out.print("<th>Título</th>");
			out.print("<th>Autor</th>");
			out.print("</tr>");
			while (rset.next()) {
				Cancion can = new Cancion(rset.getInt("idObra"), rset.getString("artista"), rset.getString("titulo"),
						rset.getString("categoria"), rset.getDouble("duracion"), rset.getString("imagen"),
						rset.getInt("idAutor"));
				out.print("<tr>");
				out.print("<td><a href='MostrarObra?idObra=" + can.getIdObra() + "' >" + can.getTitulo() + "</td>");
				out.print("<td><a href='MostrarCatalogo?id=" + can.getIdAutor() + "' >" + can.getArtista() + "</a></td>");
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
					out.println( "<tr>");
					out.println( "<th style='background-color:lightgrey;' >Obra</th>");
					out.println( "<td>Titulo:<span> " +rset.getString("titulo")+ "</span></td>");
					out.println( "<td>Categoria: <span>"+ rset.getString("categoria")+ "</span></td>");
					out.println( "<td>Duración: <span>" + rset.getDouble("duracion")+ "</span></td>");
					out.println( "<td><img  src='img/"+rset.getString("imagen")+"' width='100px'></td>");
					out.println( "</tr>");
				}
				out.println( "</table>");
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
