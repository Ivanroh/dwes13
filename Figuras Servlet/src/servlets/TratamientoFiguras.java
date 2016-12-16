package servlets;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import figuras.Circunferencia;
import figuras.Color;
import figuras.Cuadrado;
import figuras.Elipse;
import figuras.Rectangulo;

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
		String borde=req.getParameter("borde");
		String tamanio;


		if(borde.equalsIgnoreCase("si")){
			 tamanio="5";
		}
		else tamanio="0";
		
		
		if (!ladoX.equalsIgnoreCase("")) {
			if (ladoY.equalsIgnoreCase("")) {
				// cuadrado
				
				out.print("<h4>Figura</h4>");
				out.print("<p>Cuadrado</p>");
				
				Cuadrado cua=new Cuadrado("Cuadrado", Color.valueOf(color),Double.parseDouble(ladoX));
				out.print("<svg width="+ladoX+" height="+ladoX+"> <rect width="+cua.getLado()+" height="+cua.getLado()+" style='fill:"+cua.getColor()+";stroke:black;stroke-width:"+tamanio+";'> </svg>");
				
			} else {
				// Rectangulo
				out.print("<h4>Figura</h4>");
				out.print("<p>Rectangulo</p>");
				Rectangulo rec=new Rectangulo("Rectangulo", Color.valueOf(color), Double.parseDouble(ladoX), Double.parseDouble(ladoY));
				out.print("<svg width="+ladoX+" height="+ladoY+"> <rect width="+rec.getBase()+" height="+rec.getAltura()+" style='fill:"+rec.getColor()+";stroke:black;stroke-width:"+tamanio+";'> </svg>");
				
			}
		} else if (!radioX.equals("")) {
				if(radioY.equals("")){
					//circundferencia
					out.print("<h4>Figura</h4>");
					out.print("<p>circundferencia</p>");
					Circunferencia cir=new Circunferencia("Circunferencia", Color.valueOf(color),  Double.parseDouble(radioX));
					out.println("<svg height="+900+" width="+1000+"> <circle cx='200' cy='80' r="+cir.getRadio()+" style='fill:"+cir.getColor()+";stroke:black;stroke-width:"+tamanio+";'/></svg>");
					
				}	
				else{
					//elipse
					out.print("<h4>Figura</h4>");
					out.print("<p>elipse</p>");
					Elipse eli=new Elipse("Elipse", Color.valueOf(color), Double.parseDouble(radioX), Double.parseDouble(radioY));
					out.println("<svg height="+900+" width="+1000+"> <ellipse cx='200' cy='80' rx="+eli.getRadioX()+" ry="+eli.getRadioY()+" style='fill:"+eli.getColor()+";stroke:black;stroke-width:"+tamanio+";'/> </svg> ");					
					
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
