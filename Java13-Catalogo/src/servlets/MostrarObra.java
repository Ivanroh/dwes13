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
		//boolean errorIdObraInexistente = false;
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

				String consultaObra = "SELECT *,nombre AS autor FROM obra,autor WHERE idObra = " + idObra
						+ " AND autor.id=obra.idAutor";
				ResultSet rset = sentencia.executeQuery(consultaObra);
				if (!rset.isBeforeFirst()) {
					out.println("<p>Este artista no tiene ninguna obra</p>");
				} else {
					// Continuar
					out.println("<ul>");
					while (rset.next()) {
						Cancion can = new Cancion(rset.getInt("idObra"), rset.getString("artista"),
								rset.getString("titulo"), rset.getString("categoria"), rset.getDouble("duracion"),
								rset.getString("imagen"), rset.getInt("idAutor"), rset.getString("autor"));
						
						out.println("<li>Identificador de la obra: <span>" + can.getIdObra() + "</span></li>");
						out.println("<li>Artista: <span>" + can.getArtista() + "</span></li>");
						out.println("<li>Titulo:<span> " + can.getTitulo() + "</span></li>");
						out.println("<li>Categoria: <span>" + can.getCategoria()+ "</span></li>");
						out.println("<li>Duración: <span>" + can.getDuracion() + "</span></li>");
						out.println("<li>Identificador del autor: <span>" + can.getIdAutor() + "</span></li>");
						out.println("<li>Nombre del Autor: <span>" + can.getAutor() + "</span></li>");
						out.println("<li>Imagen</li> <img  src='img/" + can.getImagen() + "' width='100px'>");
					}
					out.println("</ul>");
				}

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
