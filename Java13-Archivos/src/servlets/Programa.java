package servlets;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.io.PrintWriter;
import java.util.ArrayList;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/Programa")
public class Programa extends HttpServlet {
	private static final long serialVersionUID = 1L;
	private ArrayList<String> listaNombres = new ArrayList<String>();

	protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		PrintWriter out = res.getWriter();
		res.setContentType("text/html");
		ServletContext contexto = getServletContext();
		String ruta = contexto.getRealPath("/files/nombres.txt");
		File archivo = new File(ruta);

		
		archivo.createNewFile();
		out.println("<html><head><title>Gestor de Nombres</title><meta charset='UTF-8'></head><body>");
		//enctype='multipart/form-data'
		out.println("<form action='/Java13-Archivos/Programa' method='post'>");
		out.println("<h4>Introduzca un nombre</h4>");
		out.println("<input type='text' name='nombre'><br/> ");
		out.println("Añadir <input type='radio' name='opc' value='si'> ");
		out.println("Borrar <input type='radio' name='opc' value='no'> <br /> ");
		out.println(
				"Volcar resultados (marcar solo si se va a terminar) <input type='radio' name='final' value='si'></br> ");

		//out.println("</br><label>Escoger archivo:</label> <input type='file' name='archivo'><br/>");

		out.println("<input type='submit' name='enviar' value='Enviar'> <br /> ");
		out.println("</form>");

		String nombre = req.getParameter("nombre");
		String opcion = req.getParameter("opc");
		String fin = req.getParameter("final");
		boolean esta = false;

		// out.println(nombre);
		// out.println(opcion);

		/*
		 * listaNombres.add("ivan"); listaNombres.add("i");
		 * listaNombres.add("v"); listaNombres.add("a"); listaNombres.add("n");
		 * if(listaNombres.contains("i")) out.println("contiene la i");
		 * 
		 * out.print(listaNombres.size());
		 * 
		 * for (int i = 0; i < listaNombres.size(); i++) {
		 * 
		 * out.println("<p>" + listaNombres.get(i) + "</p>"); }
		 */

		if (opcion != null) {
			if (opcion.equals("si")) {
				esta = false;

				if (listaNombres.size() == 0) {
					out.println("<p>Nombre agregado correctamente.</p>");
					agregarNombre(nombre, listaNombres);
					// out.print(listaNombres.size());
					// listaNombres.add(nombre);
				} else {

					if (listaNombres.contains(nombre))
						out.println("<p>El nombre ya esta registrado.</p>");

					/*
					 * for (int i = 0; i < listaNombres.size(); i++) { if
					 * (listaNombres.get(i).equalsIgnoreCase(nombre)) { esta =
					 * true; } }
					 * 
					 * if (esta) {
					 * out.println("<p>El nombre ya esta registrado.</p>"); }
					 */ else {
						// listaNombres.add(nombre);
						agregarNombre(nombre, listaNombres);
						out.println("<p>Nombre agregado correctamente.</p>");
					}
				}

			} else if (opcion.equals("no")) {
				// out.println("<p>nooo</p>");
				esta = false;
				int posicion = 0;
				if (listaNombres.size() == 0)
					out.println("<p>No hay elemetos que borrar.</p>");
				else {

					for (int i = 0; i < listaNombres.size(); i++) {
						if (listaNombres.get(i).equalsIgnoreCase(nombre)) {
							posicion = i;
							esta = true;
						}
					}

					if (esta) {
						listaNombres.remove(posicion);
						out.println("<p>El nombre se ha eliminado correctamente.</p>");
					} else {
						out.println("<p>El nombre no esta registrado. Comprube el nombre que quiere eliminar.</p>");
					}
				}

			} else
				out.println("<p>No se a selecionado ningúna acción, porfavor marque añador o borrar.</p>");

		}

		out.println("<p>Archivo provisional</p>");

		for (int i = 0; i < listaNombres.size(); i++) {
			out.println("<p>" + listaNombres.get(i) + "</p>");
		}

		if (fin != null) {
			if (fin.equals("si")) {
				
				/*String rutaSubida = contexto.getRealPath("/upload");

				// Crea el directorio files si no existe
				File directorioDestino = new File(rutaSubida);
				if (!directorioDestino.exists()) {
					directorioDestino.mkdirs();
				}
				
				// Localizar la parte correspondiente al archivo y escribir el archivo

				try {
					for (Part part : req.getParts()) {
						String nombreArchivo = getFileName(part);
						if (nombreArchivo.length() > 0) {

							if (nombreArchivo.equalsIgnoreCase("nombres.txt")) {
								System.out.println("Escribiendo " + nombreArchivo);
								part.write(rutaSubida + File.separator + nombreArchivo);
							}else 
								out.println("<p>El nombre no coincide con (nombres.txt)</p>");
						}
					}
					out.println("<h3>Archivo subido correctamente</h3>");
				} catch (Exception e) {
					e.printStackTrace();
					out.println("<h3>No se pudo subir el archivo</h3>");
				} 
				
				*/
				

				BufferedWriter bw = new BufferedWriter(
						new OutputStreamWriter(new FileOutputStream(ruta, true), "UTF-8"));

				for (int i = 0; i < listaNombres.size(); i++) {
					bw.write(listaNombres.get(i) + "/");
					// out.println("<p>" + listaNombres.get(i) + "</p>");
				}

				bw.close();

			}
		}
		out.print("</body></html>");
		out.close();

	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

	/*private String getFileName(Part part) {
		String contentDisp = part.getHeader("content-disposition");
		// System.out.println("La cabecera content-disposition es: " +
		// contentDisp);
		String[] tokens = contentDisp.split(";");
		for (String token : tokens) {
			if (token.trim().startsWith("filename")) {
				return token.substring(token.indexOf("=") + 2, token.length() - 1);
			}
		}
		// si hemos llegado hasta aquí, no se encontró 'filename' en este
		// elemento de la cabecera
		return "";
	}*/

	public void agregarNombre(String nom, ArrayList<String> array) {
		array.add(nom);
	}
}
