package servlets;

import java.io.BufferedWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardOpenOption;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/ManipulacionArchivos")
public class ManipulacionArchivos extends HttpServlet {
	private static final long serialVersionUID = 1L;

	protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {

		res.setContentType("text/html");
		PrintWriter out = res.getWriter();
		

		ServletContext contexto = getServletContext();
		//out.println(contexto.getRealPath("/files/modulos.txt"));

		/*String ruta = contexto.getRealPath("/files/modulos.txt");
		BufferedReader br = new BufferedReader(new InputStreamReader(new FileInputStream(ruta), "UTF-8"));
		String linea;		
		while ((linea = br.readLine()) != null) {
			out.println(linea);
		}
		br.close();

		
		String ruta = contexto.getRealPath("/files/modulos.txt");
		BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(
			    new FileOutputStream(ruta), "UTF-8"));
		bw.append("Lenguajes de marcas\n");
		bw.append("Entornos de desarrollo\n");
		bw.close();
		
		String ruta = contexto.getRealPath("/files/modulos.txt");
		BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(
		      new FileOutputStream(ruta,true), "UTF-8"));
		bw.write("¿He podido añadir esta línea? Contiene UTF-8\n");
		bw.close();
		
		String ruta = contexto.getRealPath("/files/nuevo.txt");
		File archivo = new File(ruta);
		archivo.createNewFile();
		
		
		String ruta = contexto.getRealPath("/files/nuevo.txt");
		File archivo = new File(ruta);
		archivo.delete();*/
		
		
		/*ArrayList<String> nombres = new ArrayList<String>();
		nombres.add("Julia");
		nombres.add("Ana");
		nombres.add("Sergio");
		nombres.add("Alberto");

	//	nombres.forEach(valor-> out.println(valor));
		//nombres.forEach(out::println);
		

		nombres.stream()
		  .filter(s -> s.startsWith("A"))
		  .map(String::toUpperCase)
		  .sorted()
		  .forEach(System.out::println);
		
		
		Path path = Paths.get(contexto.getRealPath("/files/modulos.txt"));
		try (Stream<String> stream = Files.lines(path)) {
				stream.forEach(out::println);
		} catch (Exception e) {
				out.println(e.toString());
		}
		
		Path path = Paths.get(contexto.getRealPath("/files/modulos.txt"));
		try (Stream<String> stream = Files.lines(path)) {
		  stream.forEach(s -> {
		    out.println(s);
		  });
		} catch (Exception e) {
		  out.println(e.toString());
		}*/
		/*
		Path path = Paths.get(contexto.getRealPath("/files/modulos.txt"));
		try (Stream<String> stream = Files.lines(path)) {
		  stream.forEach(s -> {
		    out.println(s);
		  });
		} catch (Exception e) {
		  out.println(e.toString());
		}
		
		try (Stream<String> stream = Files.lines(path)) {
			  stream.forEach(s -> {
					out.println(s + "<br/>");
			});
			} catch (Exception e) {
				out.println(e.toString());
			}
		
		try (Stream<String> stream = Files.lines(path)) {
			stream.forEach(s -> {
			  if (s.startsWith("E"))
			    out.println(s + "<br/>");
			});
		} catch (Exception e) {
			out.println(e.toString());
		}
		
		
		try (Stream<String> stream = Files.lines(path)) {
			  stream
			  .filter(s -> s.startsWith("D"))
			    .map(String::toUpperCase)
			    .sorted()
			    .forEach(s -> out.println(s + "<br/>"));
			}*/
		
		/*Path rutaArchivoEscritura = Paths.get(contexto.getRealPath("/files/modulos.txt"));        
		try (BufferedWriter writer = Files.newBufferedWriter(rutaArchivoEscritura, StandardCharsets.UTF_8)) {
		  writer.write("Desarrollo web en entorno servidor\n");
		  writer.write("Inglés técnico\n");   
		}
		try (BufferedWriter writer = Files.newBufferedWriter(rutaArchivoEscritura, StandardCharsets.UTF_8, StandardOpenOption.APPEND)) {
			  writer.write("Lenguajes de Marcas\n");
			  writer.write("Entornos de desarrollo\n");   
			}*/
		
		
		Path rutaArchivoSecreto = Paths.get(contexto.getRealPath("/WEB-INF/secreto.txt"));      
		try (BufferedWriter writer = Files.newBufferedWriter(rutaArchivoSecreto, StandardCharsets.UTF_8)) {
		  writer.write("Información no visible por los usuarios\n");  
		}
		
		out.close();

	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
