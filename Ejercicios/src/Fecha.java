import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class Fecha extends HttpServlet {

	private static final long serialVersionUID = 1L;
	private Date fecha;
	public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException {
		res.setContentType("text/html");
		this.fecha=new Date();
		PrintWriter out = res.getWriter();
		out.println("<html><head><title>Fecha</title></head>");
		out.println("<body><h1>"+fecha+"</h1></body></html>");
		out.close();
		
	}

	public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException {
		doGet(req, res);
	}

	public String getServletInfo() {
		return "Servlet de Ejemplo usando HttpServlet";
	}
}