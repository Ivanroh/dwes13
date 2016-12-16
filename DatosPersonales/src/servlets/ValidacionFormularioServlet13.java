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
		String urgencia = req.getParameter("urgencia");
		String capacidad = req.getParameter("capacidad");
		String[] tipo = req.getParameterValues("tipo");
		String[] comentario = req.getParameterValues("comentario");
		String usuario = req.getParameter("usuario");
		
		//Validar contraseña
		String contra = req.getParameter("contrasenia");

		String numeros = "0123456789";
		String mayus = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
		String especiales = "ªº!@$%/()=?¿¡";

		boolean valiContra = false;

		for (int i = 0; i < contra.length(); i++) {
			if ((numeros.indexOf(contra.charAt(i)) != -1)) {
				// VERDADERO
				valiContra = true;
			}
		}
		if (valiContra) {
			valiContra = false;
			for (int i = 0; i < contra.length(); i++) {
				if ((mayus.indexOf(contra.charAt(i)) != -1)) {
					valiContra = true;
				}
			}
		}
		if (valiContra) {
			valiContra = false;
			for (int i = 0; i < contra.length(); i++) {
				if ((especiales.indexOf(contra.charAt(i)) != -1)) {
					valiContra = true;
				}
			}
		}

		if (valiContra) {
			out.println("<p>Contraseña válida " + contra + "</p>");
		} else
			out.println(
					"<p style='color:darkred;'>La contraseña debe tener al menos un número, una mayúscula y un caracter especial "
							+ contra + "</p>");

		//Validar fecha
		
		String fecha = req.getParameter("fecha");
		
		
		
		/*
		if (producto.isEmpty()) {
			out.println("<span>Producto vacio" + req.getRequestURI() + " </span>");
			String ruta = "http://localhost:8080/DatosPersonales";
		}*/

	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
