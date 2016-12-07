package servlets;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class TratamientoFiguras extends HttpServlet {
	private static final long serialVersionUID = 1L;

	protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		res.setContentType("text/html");
		PrintWriter out = res.getWriter();
		out.println("<html><head><title>Resultado</title><meta charset='UTF-8'></head><body>");

		String ladoX = req.getParameter("ladoX");
		String ladoY = req.getParameter("ladoY");
		String radioX = req.getParameter("radioX");
		String radioY = req.getParameter("radioY");
		String color=req.getParameter("color");

		if (!ladoX.equalsIgnoreCase("")) {
			if (ladoY.equalsIgnoreCase("")) {
				// cuadrado
				out.print("<svg width="+ladoX+" height="+ladoX+"> <rect width="+ladoX+" height="+ladoX+" style='color:"+color+"'> </svg>");
				out.print("<p>Cuadrado</p>");
			} else {
				// Rectangulo
				out.print("<svg width="+ladoX+" height="+ladoY+"> <rect width="+ladoX+" height="+ladoY+" style='color:"+color+"'> </svg>");
				out.print("<p>Rectangulo</p>");
			}
		} else if (!radioX.equals("")) {
				if(radioY.equals("")){
					//circundferencia
					out.println("<svg height="+900+" width="+1000+"> <circle cx='200' cy='80' r="+radioX+" style='color:"+color+"'/></svg>");
					out.print("<p>circundferencia</p>");
				}	
				else{
					//elipse
					out.println("<svg height="+900+" width="+1000+"> <ellipse cx='200' cy='80' rx="+radioX+" ry="+radioY+" style='color:"+color+"'/> </svg> ");					
					out.print("<p>elipse</p>");
				}		
		}


		out.print("</body></html>");
		out.close();

	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
