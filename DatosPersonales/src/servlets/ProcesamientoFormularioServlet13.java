package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Enumeration;
import java.util.Map;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.sun.org.apache.xerces.internal.impl.xpath.regex.ParseException;

public class ProcesamientoFormularioServlet13 extends HttpServlet {
	private static final long serialVersionUID = 1L;

	public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException {
		res.setContentType("text/html");
		PrintWriter out = res.getWriter();
			

		out.println("<html><head><title>Resultado</title><meta charset='UTF-8'></head><body>");

		out.print("<h4>Nombre de todos los campos</h4><ul>");
		Enumeration<String> param = req.getParameterNames();
		
		while (param.hasMoreElements()) {
				out.println("<li>" + param.nextElement() + "</li>");
		}
		out.print("</ul>");
		
		out.print("<h4>Nombre campo - valores</h4>");
		
		Map<String, String[]> campoValor=req.getParameterMap();
		campoValor.forEach((parametro,valores)->{
			if(!parametro.equalsIgnoreCase("enviar")){
				out.println("<p>"+parametro+": ");
			}
			for(String v: valores){
				if(!parametro.equalsIgnoreCase("enviar")){
					out.print("- "+v);
				}
				
			}
		});
		
		
		// SimpleDateFormat formatoFecha=new SimpleDateFormat("yyyy-MM-dd");
				/*
				 * try{ Date fecha=formatoFecha.parse(req.getParameter("fecha"));
				 * SimpleDateFormat formatoSalida=new SimpleDateFormat("dd/MM/yyyy");
				 * out.print("Fecha"+formatoSalida); }catch (ParseException e) {
				 * e.printStackTrace(); } catch (java.text.ParseException e) { // TODO
				 * Auto-generated catch block e.printStackTrace(); }
		*/
		
		
		//FECHA
		
		out.println("<h4>Salida de fecha</h4>");
		
		SimpleDateFormat formatForm=new SimpleDateFormat("yyyy-MM-dd");
		try{
			Date fecha= formatForm.parse(req.getParameter("fechaPedido"));
			SimpleDateFormat formatSalida=new SimpleDateFormat("dd/MM/yyyy");
			out.println("<p>Fecha: "+formatSalida.format(fecha)+"</p>");
		}
		catch (ParseException | java.text.ParseException e) {
			e.printStackTrace();
		}
		
		
		
		/*
		String producto = req.getParameter("producto");
		// String fecha=req.getParameter("fecha");
		String urgencia = req.getParameter("urgencia");
		String capacidad = req.getParameter("capacidad");
		String[] tipo = req.getParameterValues("tipo");
				
		out.println("<body><p> producto:" + producto + "</p>"
		/* + "<h1> fecha:"+fechs+"</h1>" 
				+ "<p> urgencia - " + urgencia + "</p>" + "<p> capacidad - " + capacidad + "</p>" + "<p>Tipo - </p>"
				+ "<p> " + tipo[0] + " " + tipo[1] + " " + tipo[2] + "</p>");
*/
		out.print("</body></html>");
		out.close();

	}

	public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException {
		doGet(req, res);
	}

	public String getServletInfo() {
		return "Servlet de Ejemplo usando HttpServlet";
	}

}
