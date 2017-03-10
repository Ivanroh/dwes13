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
 * Servlet implementation class PaginaPrincipal
 */
@WebServlet("/PaginaPrincipal")
public class PaginaPrincipal extends HttpServlet {
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

		Connection conn = null;
		Statement sentencia = null;
		try {
			// Paso 1: Cargar el driver JDBC.
			Class.forName("org.mariadb.jdbc.Driver").newInstance();

			// Paso 2: Conectarse a la Base de Datos utilizando la clase
			// Connection
			String userName = "alum";
			String password = "alumno";
			String url = "jdbc:mariadb://localhost:4000/ps2013";
			conn = DriverManager.getConnection(url, userName, password);

			// Paso 3: Crear sentencias SQL, utilizando objetos de tipo
			// Statement
			sentencia = conn.createStatement();

			// Paso 4: Ejecutar la sentencia SQL a través de los objetos
			// Statement
			String consulta = "SELECT * from info where idioma = 'es'";
			/*Cookie nuevaCookiIdioma = new Cookie("idioma", "");
			nuevaCookiIdioma.setPath("/PS-B-Java-IvanHidalgo");
			response.addCookie(nuevaCookiIdioma);
			response.sendRedirect("/PS-B-Java-IvanHidalgo/PaginaPrincipal");*/

			if (request.getParameter("idioma") != null) {

				if (request.getParameter("idioma").equalsIgnoreCase("es")) {
					//nuevaCookiIdioma.setValue("es");
					consulta = ("SELECT * from info where idioma = 'es'");
				} else {
					if (request.getParameter("idioma").equalsIgnoreCase("en")) {
						consulta = ("SELECT * from info where idioma = 'en'");
						//nuevaCookiIdioma.setValue("en");
					}
				}

			}

			
			ResultSet rset = sentencia.executeQuery(consulta);
			if (!rset.isBeforeFirst()) {
				out.println("<h3>No hay resultados</h3>");
			}
			out.print("<a href='PaginaPrincipal?idioma=es'><img src='img/es.png'></a>"); 
			out.print(" ");
			out.print("<a href='PaginaPrincipal?idioma=en'><img src='img/en.png'></a>");
			
			out.print("<h2>Festival de música Primavera Sound</h2>");
			out.println("<img  src='img/portada.jpg'><br>");
			while (rset.next()) {
				out.print("<tr>");
				out.print("<td>" + rset.getString("presentacion") + "</td></br>");
				out.print("</tr>");
			}
			out.print("</table>");

			String consulta2 = "SELECT * FROM actuacion , dias WHERE actuacion.dia=dias.id group by dias.dia";
			rset = sentencia.executeQuery(consulta2);
			out.println("<h3>Días:</h3><ul id='menu'>");
			while (rset.next()) {
				out.print("<li>");
				//out.println(rset.getString("origen"));
				out.print("<a href='Cartel?pais=" +rset.getString("origen") + "'>Día " + rset.getString("dia")	+ " </a>");
				out.print("</li>");
			}
			out.print("</table>");

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
