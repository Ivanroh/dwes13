package servlets;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


@WebServlet("/ValidacionFormularioServlet13")
public class ValidacionFormularioServlet13 extends HttpServlet {
	private static final long serialVersionUID = 1L;
       

	protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		res.setContentType("text/html");
		PrintWriter out = res.getWriter();
		
		
		String producto = req.getParameter("producto");
		String fecha=req.getParameter("fecha");
		String urgencia = req.getParameter("urgencia");
		String capacidad = req.getParameter("capacidad");
		String[] tipo = req.getParameterValues("tipo");
		String[] comentario=req.getParameterValues("comentario");
		
		if(producto.isEmpty()){
			out.println("<span>Producto vacio"+req.getRequestURI()+" </span>");
			String ruta="http://localhost:8080/DatosPersonales";
			
		}
		
		
		

		
		
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		doGet(request, response);
	}

}
