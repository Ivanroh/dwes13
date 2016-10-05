import java.util.ArrayList;
/**
 *
 * @author Iv�n Hidalgo
 *
 */

public class GestorFiguras {


	private ArrayList<Figura> listaFiguras;

	public GestorFiguras() {
		listaFiguras=new ArrayList<Figura>();
	}

	/**
	 * M�todo auxiliar para cargar figuras predefinidas
	 */
	public void cargarFiguras(){
		Cuadrado cua=new Cuadrado("Cuadrado",Color.WHITE,4.2);
		Triangulo tri=new Triangulo("Triangulo",Color.BLUE,8, 15);
		Circunferencia circun1=new Circunferencia("Circunferncia 1",Color.RED,4.8);
		Circunferencia circun2=new Circunferencia("Circunferncia 2",Color.WHITE,1.5);

		listaFiguras.add(cua);		
		listaFiguras.add(tri);		
		listaFiguras.add(circun1);		
		listaFiguras.add(circun2);		
	}



	/**
	 * M�todo para a�adir una figura
	 * @param figura Se le pasa una figura como par�metro
	 */
	public void anadirFigura(Figura figura){
		if (buscarTitulo(figura.getTitulo())==null) {
			listaFiguras.add(figura);
		}
		else
			System.out.println("Ya existe una figura con este titulo");
	}

	/**
	 * M�todo para eliminar una figura
	 * @param titulo A partir del t�tulo se hara la busqueda para eliminar la figura
	 */
	public void eliminarFigura(String titulo){			
		if (buscarTitulo(titulo)==null) {
			System.out.println("No existe ning�na figura con el t�tulo: "+titulo);
		}

		else{		
			listaFiguras.remove(buscarTitulo(titulo));
			System.out.println("Figura eliminada");
		}
	}

	/**
	 * M�todo auxiliar para buscar por t�tulo
	 * @param titulo busca por titulo para saber si existe en el ArrayList
	 * @return Figura Devuelve una figura o null si no lo encuentra
	 */
	public Figura buscarTitulo(String titulo){
		boolean encontrado=false;
		for (int i = 0; i <listaFiguras.size()&&!encontrado; i++) {
			Figura f= listaFiguras.get(i);
			if (f.getTitulo().equalsIgnoreCase(titulo)) {
				encontrado=true;
				return listaFiguras.get(i);
			}
		}
		return null;

	}

	/**
	 * M�todo que muestra un listado de las figuras que contiene
	 */
	public void mostrarFiguras(){
		for (int i = 0; i < listaFiguras.size(); i++) {
			Figura f=listaFiguras.get(i);
			System.out.println(f.toString());
		}
	}

	/**
	 * M�todo que permite sumar todas las �reas de la colecci�n
	 * @return
	 */
	public double sumaAreas(){
		double sumaAreas=0;
		for (Figura f : listaFiguras) {
			sumaAreas+=f.area();
		}
		return sumaAreas;
	}
}
