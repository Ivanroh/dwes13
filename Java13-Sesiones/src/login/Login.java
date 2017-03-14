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
 * Servlet implementation class Login
 */
@WebServlet("/Login")
public class Login extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		ServletContext contexto = getServletContext();
		String mensajeError = "";
		HttpSession session = request.getSession();

		String usuario = "";
		String contra = "";

		if ((session.getAttribute("login") != null) && (session.getAttribute("login").equals("1"))) {
			response.sendRedirect(contexto.getContextPath() + "/MostrarContenido");
		}

		PrintWriter out = response.getWriter();

		if (request.getParameter("enviar") != null) {

			usuario = request.getParameter("usuario");
			contra = request.getParameter("contra");

			if (usuario == "" || (contra == "")) {
				mensajeError = "Los campos usuario y contraseña no pueden estar vacios";
			} else {
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

					// Cambiar resultado, eejcuta la consulta
					String consulta = "SELECT * from usuario WHERE login='" + usuario + "'";
					ResultSet rset = sentencia.executeQuery(consulta);
					// Paso 5: Mostrar resultados
					if (!rset.isBeforeFirst()) {
						mensajeError = "No se encuentra el usuario en la base de datos";
					} else {
						rset.next();
						if (!rset.getString("password").equals(contra)) {
							mensajeError = "La contraseña es incorrecta";
						} else {
							session.setAttribute("login", "1");
							session.setAttribute("usuario", usuario);
							response.sendRedirect(contexto.getContextPath() + "/MostrarContenido");
						}
					}

				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		}

		out.println("<html><head><meta charset='UTF-8'/>" + "<style> .error {color: red}</style>"
				+ "<title>Sesiones en JavaEE</title></head><body>");
		response.setContentType("text/html;UTF-8");
		out.print("<h3>Identificación del usuario</h3>");
		out.print("<form action='" + request.getRequestURI() + "' method='post'>");
		out.print("	<label>Usuario: </label></br><input type='text' name='usuario'> <br>");
		out.print("	<label>Contraseña: </label></br><input type='password' name='contra'> <br>");
		out.print("	<input type='submit' name='enviar' value='Enviar'>");
		out.print("</form>");
		out.print("<p><a href='" + contexto.getContextPath()
				+ "/Alta'>¿Aún no estás registrado? Haz clic en este enlace</a></p>");

		if (!mensajeError.equals("")) {
			out.println("<p class='error'>" + mensajeError + "</p>");

		}
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
