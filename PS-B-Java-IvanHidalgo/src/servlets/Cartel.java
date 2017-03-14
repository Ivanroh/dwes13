package servlets;

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

/**
 * Servlet implementation class Cartel
 */
@WebServlet("/Cartel")
public class Cartel extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public Cartel() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		ServletContext contexto = getServletContext();
		response.setContentType("text/html;UTF-8");
		PrintWriter out = response.getWriter();
		out.println(
				"<html><head><meta charset='UTF-8'/></head><body>");

		String pais = request.getParameter("pais");
		// String param_dia = request.getParameter("dia");
		boolean errorPais = false;

		if (errorPais) {
			out.println("<h3>Error: falta el país</h3>");
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
				String url = "jdbc:mariadb://localhost:4000/ps2013";
				conn = DriverManager.getConnection(url, userName, password);

				// Paso 3: Crear sentencias SQL, utilizando objetos de tipo
				// Statement
				sentencia = conn.createStatement();

				// Paso 4: Ejecutar la sentencia SQL a través de los objetos
				// Statement

				String consulta = "SELECT * FROM actuacion, dias WHERE actuacion.dia=dias.id AND actuacion.origen=" + pais;
				ResultSet rset = sentencia.executeQuery(consulta);
				if (!rset.isBeforeFirst()) {
					out.println("<h3>No existe</h3>");
				} else {
					// Continuar
					out.println( "<table border='1'>");
					out.println( "<tr>");
					out.println( "<th style='background-color:lightgrey;' >Nombre del artista</th>");
					out.println( "<th style='background-color:lightgrey;' >País de origen</th>");
					out.println( "</tr>");
					
		
					while (rset.next()) {
						out.print( "<tr>");
						//Falla porque al pasarle por parametro pide un String dentro de sus comilla '' 
						//y se le pasa el nombre tal cual, si se le añaden las comillas al link funciona
						// por falta de tiempo no se pudo solucionar
						out.print( "<td><a href='"+ contexto.getContextPath()+"/Artista?artista=&#39;"+ rset.getString("nombre") +"&#39;'><span> " + rset.getString("nombre") + "</span></a></td>");
						out.print( "<td><span> "+ rset.getString("origen")+"</span></td>");
						out.print( "</tr>");
					}
					out.println( "</table>");
		
				}
				out.print("<br/><a href='" + contexto.getContextPath()+ "/PaginaPrincipal'>Volver a la página principal</a>");
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
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
