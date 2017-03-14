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
 * Servlet implementation class MostrarContenido
 */
@WebServlet("/MostrarContenido")
public class MostrarContenido extends HttpServlet {
	private static final long serialVersionUID = 1L;
       

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	
		ServletContext contexto = getServletContext();

		HttpSession session = request.getSession();
		if ((session.getAttribute("login")==null) || (!session.getAttribute("login").equals("1"))) {
			response.sendRedirect(contexto.getContextPath()+"/Login");
		}
		String nombreCompleto="";
		
		PrintWriter out = response.getWriter();
		response.setContentType("text/html;UTF-8");

		out.println("<html><head><meta charset='UTF-8'/><style> .error {color: red}</style><title>Bienvenid@</title></head><body>");

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
			// Paso 4: Ejecutar la sentencia SQL a través de los objetos Statement
			String consulta = "SELECT * from usuario WHERE login='"+session.getAttribute("usuario")+"'";
			ResultSet rset = sentencia.executeQuery(consulta);
			// Paso 5: Mostrar resultados
			if (!rset.isBeforeFirst() ) {    
			    response.sendRedirect(contexto.getContextPath()+"/Logout");
			} 
			else {
				rset.next();
				nombreCompleto= rset.getString("nombre");
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

		out.println("<h2>Bienvenid@ "+nombreCompleto+"</h2>");
		out.println("<p><a href='"+contexto.getContextPath()+"/Logout'>Cerrar sesión</a></p>");		
		out.println("<p><a href='"+contexto.getContextPath()+"/Baja'>Eliminar cuenta</a></p>");		
		out.println("</body></html>");

	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		doGet(request, response);
	}

}
