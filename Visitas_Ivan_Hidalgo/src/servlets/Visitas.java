package servlets;

import java.io.BufferedWriter;
import java.io.FileOutputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.io.PrintWriter;
import java.util.Date;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class Visitas extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
   
	protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
	
		res.setContentType("text/html");
		PrintWriter out = res.getWriter();
		out.println("<html><head><title>Resultado</title><meta charset='UTF-8'></head><body>");
		ServletContext contexto = getServletContext();
		String ruta=contexto.getRealPath("/files/libro.txt");
		Date fecha=new Date();
		
		
		
		String autor=req.getParameter("autor");
		
		String cita[]=req.getParameterValues("cita");
		
		out.print("<p>"+fecha+" "+autor+" escribe:</p>");
		
		out.print("<p>");

		for (int i = 0; i < cita.length; i++) {
			out.print(cita[i]);
		}
		out.print("</p>");


		/*BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(
			    new FileOutputStream(ruta), "UTF-8"));
		bw.write(autor);
		bw.close();*/
		
		
		 FileWriter fichero = null;
	     PrintWriter pw = null;

	     fichero = new FileWriter(ruta);
	     pw = new PrintWriter(fichero);
	          
	     pw.write(autor);
		
	     pw.close();
		
		
		
		out.print("</body></html>");
		out.close();
		
	}

	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		doGet(request, response);
	}

}
