package hanoi;

import java.util.ArrayList;

public class Poste {

	private ArrayList<Disco> listaDiscos;

	public Poste() {
		listaDiscos=new ArrayList<Disco>();
	}
	
	public boolean esVacio(){		
		return listaDiscos.isEmpty();
	}
	
	public double obteberDiametroDiscoCima(){
		if (esVacio())
			return 0;
		else 
			return listaDiscos.get(listaDiscos.size()).getDiametro();			
	}
	
	public void insertarDisco(Disco disco){
		listaDiscos.add(disco);
	}
	
	public Disco extraerDisco(){
		if (esVacio())
			return null;
		else
			return listaDiscos.get(listaDiscos.size());
	}
	
	/*dibujar: debe ir dibujando los discos del poste desde el �ltimo que se insert� hasta el
	primero, utilizando el m�todo �dibujar� que programamos en la clase Disco. Al final
	dibujaremos la base del poste. La base consiste en s�mbolos �=�: para que el dibujo
	quede bien, habr� 2 m�s que el di�metro del disco m�s grande contenido en el poste.
	Por ejemplo, si el disco m�s grande tiene di�metro 7, la base del poste tendr� 9
	s�mbolos �=�:*/

	
	public void dibujar(){
		for (int i = 0; i < listaDiscos.size(); i++) {
			listaDiscos.get(i).dibujarDisco();
		}
		
		if (esVacio()) {
			for (int i = 0; i < 5; i++) {
				System.out.print("=");
			}
		}
		else{
		
			for (int i = 0; i <listaDiscos.get(listaDiscos.size()).getDiametro()+2; i++) {
				System.out.print("=");
			}
		}
		
	}
}
