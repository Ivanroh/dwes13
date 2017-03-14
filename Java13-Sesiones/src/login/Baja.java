package login;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 * Servlet implementation class Baja
 */
@WebServlet("/Baja")
public class Baja extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		ServletContext contexto = getServletContext();

		String mensajeError = "";
		String usuario = "", contra = "";

		HttpSession session = request.getSession();
		if ((session.getAttribute("login") != null) && (!session.getAttribute("login").equals("1"))) {
			response.sendRedirect(contexto.getContextPath() + "/MostrarContenido");
		}

		if (request.getParameter("enviar") != null) {
			// validar nombre
			usuario = (String) session.getAttribute("usuario");
			contra = request.getParameter("password");
			if (contra == "") {
				mensajeError = "Debes introducir la contraseña";
			} else {
				// Conectarse
				Connection conn = null;
				Statement sentencia = null;
				try {
					// Paso 1: Cargar el driver JDBC.
					Class.forName("org.mariadb.jdbc.Driver").newInstance();

					// Paso 2: Conectarse a la Base de Datos utilizando la clase
					// Connection
					String userName = "alum_rw";
					String password = "alumno";
					String url = "jdbc:mariadb://localhost:4000/catalogo";
					conn = DriverManager.getConnection(url, userName, password);
					// Paso 3: Crear sentencias SQL, utilizando objetos de tipo
					// Statement
					sentencia = conn.createStatement();
					// Paso 4: Ejecutar la sentencia SQL a través de los objetos
					// Statement
					String consulta = "SELECT * from usuario WHERE login='" + usuario + "'";
					ResultSet rset = sentencia.executeQuery(consulta);
					// Paso 5: Mostrar resultados
					if (!rset.isBeforeFirst()) {
						mensajeError = "No se encuentra el usuario";
					}
					rset.next();
					if (rset.getString("login").equals(usuario)) {
						if (rset.getString("password").equals(request.getParameter("password"))) {
							Statement sentencia2 = conn.createStatement();
							sentencia2.executeUpdate("DELETE FROM usuario WHERE login = '" + usuario + "';");
							sentencia2.close();
							response.sendRedirect(contexto.getContextPath() + "/Logout");
						}
						else
							mensajeError="La contraseña no coincide";
					}
					

					// Paso 6: Desconexión
					if (rset != null)
						rset.close();
					if (sentencia != null)
						sentencia.close();
					if (conn != null)
						conn.close();
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		}
		// salida
		PrintWriter out = response.getWriter();
		response.setContentType("text/html;UTF-8");
		out.println(
				"<html><head><meta charset='UTF-8'/><style> .error {color: red}</style><title>Baja usuario</title></head><body>");

		out.println("<form action='" + request.getRequestURI() + "' method='post'>" 
		+ "<label>Confirme la contraseña:</label>"
				+ "<input type='password' name='password'/><br/>"
				+ "<input type='submit' name='enviar' value='Enviar'/></form>");
		out.print("<p class='error'>"+ mensajeError + "</p>" );
		out.println("<a href='" + contexto.getContextPath() + "/MostrarContenido'>Cancelar</a>");
		out.println("</body></html>");
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
