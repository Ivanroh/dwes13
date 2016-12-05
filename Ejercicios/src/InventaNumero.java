import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class InventaNumero extends HttpServlet {

	private static final long serialVersionUID = 1L;
	
	public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException {
		res.setContentType("text/html");
		double numAleatorio=Math.random()*1000;
		numAleatorio=Math.round(numAleatorio);
		PrintWriter out = res.getWriter();
		out.println("<html><head><title>Número Aleatorio</title></head>");
		out.println("<body><h1>Número aleatorio</h1>");
		out.println("<h2>"+numAleatorio+"</h2></body></html>");
		out.close();
	}

	public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException {
		doGet(req, res);
	}

	public String getServletInfo() {
		return "Servlet de Ejemplo usando HttpServlet";
	}
}