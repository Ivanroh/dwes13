package servlets;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 * Servlet implementation class Saludo
 */
@WebServlet("/Saludo")
public class Saludo extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		HttpSession session = request.getSession();
		String mensajeError = "";
	
		if (request.getParameter("cerrarSesion")!=null) {
			session.invalidate();
			session=request.getSession();
		}
		
		if (request.getParameter("enviar") != null) {
			if (request.getParameter("usuario").equals("")) {
				mensajeError = "Usuario sin rellenar, complete el formulario antes de enviar.";
			} else
				session.setAttribute("usuario", request.getParameter("usuario"));
		}
		PrintWriter out = response.getWriter();
		out.println("<html><head><meta charset='UTF-8'/>" + "<style> .error {color: red}</style>"
				+ "<title>Sesiones en JavaEE</title></head><body>");
		response.setContentType("text/html;UTF-8");
		if (session.getAttribute("usuario")!=null) {
			out.println("<h3>Bienvenid@ "+session.getAttribute("usuario") +"</h3>");
		}
		else{
			out.print("<h3>Identificación del usuario</h3>");
			out.print("<form action='"+request.getRequestURI()+"' method='post'>");
			out.print("	<label>Usuario: </label></br><input type='text' name='usuario'> <br>");
			out.print("	<input type='submit' name='enviar' value='Enviar'>");
			out.print("</form>");	
			if (!mensajeError.equals("")) {
				out.println("<p class='error'>"+mensajeError+"</p>");
			}
		}
		
		out.println("<p><a href='" + request.getRequestURI() + "?cerrarSesion=true'>Cerrar sesión</a></p>");
		
		out.println("</body></html>");

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
