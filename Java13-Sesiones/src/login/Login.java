package login;

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
import javax.servlet.http.HttpSession;

/**
 * Servlet implementation class Login
 */
@WebServlet("/Login")
public class Login extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String mensajeError="";
		HttpSession session = request.getSession();
		
		if (session.getAttribute("login")!=null && (int)session.getAttribute("login")==1) {
			response.sendRedirect("/Java13-Sesiones/MostrarContenido");
		}
		
		if(request.getParameter("enviar")!=null){
			
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
			
				//Cambiar resultado, eejcuta la consulta
				ResultSet rset = sentencia.executeQuery("select * from usuario");
				if (!rset.isBeforeFirst()) {
					mensajeError="No hay resultados.";
				}
				boolean esta=false;
				
				String usuario= request.getParameter("usuario");				
				String contra= request.getParameter("contra");
				
				while (rset.next()) {
					
					if (rset.getString("login").equalsIgnoreCase(usuario)){
						if (rset.getString("password").equalsIgnoreCase(contra)){
							session.setAttribute("loging", 1);
							session.setAttribute("usuario", usuario);
							esta=true;
						}
						
					}
					
				}
			
				if (!esta) {
					mensajeError="El usuario no se encuentra registrado.";
				}
			
			} catch (Exception e) {
				e.printStackTrace();
			}
			
		}
		else{
			PrintWriter out = response.getWriter();
			out.println("<html><head><meta charset='UTF-8'/>" + "<style> .error {color: red}</style>"
					+ "<title>Sesiones en JavaEE</title></head><body>");
			response.setContentType("text/html;UTF-8");
			out.print("<h3>Identificación del usuario</h3>");
			out.print("<form action='"+request.getRequestURI()+"' method='post'>");
			out.print("	<label>Usuario: </label></br><input type='text' name='usuario'> <br>");
			out.print("	<label>Contraseña: </label></br><input type='password' name='contra'> <br>");
			out.print("	<input type='submit' name='enviar' value='Enviar'>");
			out.print("</form>");	
			if (!mensajeError.equals("")) {
				out.println("<p class='error'>"+mensajeError+"</p>");
			}			
			out.println("</body></html>");
		}


	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
