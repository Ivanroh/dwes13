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
 * Servlet implementation class Alta
 */
@WebServlet("/Alta")
public class Alta extends HttpServlet {
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
		if ((session.getAttribute("login") != null) && (session.getAttribute("login").equals("1"))) {
			response.sendRedirect(contexto.getContextPath() + "/MostrarContenido");
		}

		if (request.getParameter("enviar") != null) {
			// validar nombre
			usuario = request.getParameter("usuario");
			contra = request.getParameter("password");

			if (usuario == "" || (contra == "")) {
				mensajeError = "Los campos usuario y contraseña no pueden estar vacios";
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
						String consulta_insertar = "INSERT INTO usuario VALUES ('" + request.getParameter("usuario")
								+ "', '" + request.getParameter("password") + "', '" + request.getParameter("nombre")
								+ "', '" + request.getParameter("tipo") + "', '" + request.getParameter("descripcion")
								+ "');";
						sentencia.executeUpdate(consulta_insertar);
						mensajeError += "Te has registradro correctamente";
						response.sendRedirect(contexto.getContextPath() + "/Login");

					} else {
						mensajeError += "El usuario ya existe en la base de datos";
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
				"<html><head><meta charset='UTF-8'/><style> .error {color: red}</style><title>Alta Usuario</title></head><body>");
out.print("	<h3>Alta Usuario</h3><h3>Rellene los siguientes datos</h3><p>* datos obligatorios</p>");
		
		out.println("<form action='" + request.getRequestURI() + "' method='post'>" + "<label>Usuario:*</label><br> <input type='text' name='usuario'><br/>"
				+ "<label>Contraseña:*</label><br/><input type='password' name='password'><br/>"
				+ "<label>Nombre Completo:</label><br> <input type='text' name='nombre'><br/>"
				+ "<label>Descripción:</label><br> <textarea rows='4' cols='50' name='descripcion'></textarea><br/>"
				+ "<label>Tipo de cuenta:</label><br>Estándar <input type='radio' name='tipo' value='0' checked>Administrador <input type='radio' name='tipo' value='1'><br/>"
				+ "<input type='submit' value='Registrarse' name='enviar'>" + "</form>" + "<p><a href='"
				+ contexto.getContextPath() + "/Login'>¿Ya tienes cuenta? Haz clic en este enlace</a></p>");
		
		out.print("<p class='error'>"+ mensajeError + "</p>" );
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
