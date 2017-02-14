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
 * Servlet implementation class MostrarObra
 */
@WebServlet("/MostrarObra")
public class MostrarObra extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		response.setContentType("text/html;UTF-8");
		PrintWriter out = response.getWriter();
		out.println("<html><head><meta charset='UTF-8'/></head><body>");

		int idObra = 0;
		boolean errorIdObraAusente = false;
		boolean errorIdObraFormato = false;
		boolean errorIdObraInexistente = false;
		String idObraParametro = request.getParameter("idObra");
		if (idObraParametro == null)
			errorIdObraAusente = true;
		else {
			try {
				idObra = Integer.parseInt(idObraParametro);
			} catch (Exception e) {
				errorIdObraFormato = true;
			}
		}

		if (errorIdObraAusente) {
			out.println("<h3>Error: falta identificador de cuidador</h3>");
		} else if (errorIdObraFormato) {
			out.println("<h3>Error: el identificador de cuidador debe ser numérico</h3>");
		} else {
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
				String consulta = "SELECT * from obra where idObra=" + idObra;
				ResultSet rset = sentencia.executeQuery(consulta);
				if (!rset.isBeforeFirst()) {
					// out.println("<h3>No hay resultados</p>");
					errorIdObraInexistente = true;
				}

				// Paso 5: Mostrar resultados

				if (errorIdObraInexistente) {
					out.println("<h3>Obra no existente</p>");

				} else {
					rset.next();
					out.println("<p>Obras del artista " + rset.getString("artista") + ":</p>");

				}

				String consultaObra = "SELECT *,nombre AS autor FROM obra,autor WHERE idObra = " + idObra
						+ " AND autor.id=obra.idAutor";
				rset = sentencia.executeQuery(consultaObra);
				if (!rset.isBeforeFirst()) {
					out.println("<p>Este artista no tiene ninguna obra</p>");
				}
				// Continuar
				while (rset.next()) {
					out.println("<li>Identificador de la obra: <span>" + rset.getInt("idObra") + "</span></li>");
					out.println("<li>Artista: <span>" + rset.getString("artista") + "</span></li>");
					out.println("<li>Titulo:<span> " + rset.getString("titulo") + "</span></li>");
					out.println("<li>Categoria: <span>" + rset.getString("categoria") + "</span></li>");
					out.println("<li>Duración: <span>" + rset.getDouble("duracion") + "</span></li>");
					out.println("<li>Identificador del autor: <span>" + rset.getInt("idAutor") + "</span></li>");
					// out.println( "<li>Nombre del Autor:
					// <span>"+rset.getString("autor")+"</span></li>");
					out.println("<li>Imagen</li> <img  src='img/"+rset.getString("imagen")+"' width='100px'>");
				}
				out.println("</ul>");

				out.print("<br/><a href='/Java13-Catalogo/MostrarCatalogo'>volver</a>");

				// Paso 6: Desconexión
				if (sentencia != null)
					sentencia.close();
				if (conn != null)
					conn.close();
			} catch (Exception e) {
				e.printStackTrace();
			}
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

		doGet(request, response);
	}

}
