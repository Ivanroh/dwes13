package hanoi;

import java.util.ArrayList;

public class Poste {

	private ArrayList<Disco> listaDiscos;
	
	public ArrayList<Disco> getListaDiscos() {
		return listaDiscos;
	}

	public void setListaDiscos(ArrayList<Disco> listaDiscos) {
		this.listaDiscos = listaDiscos;
	}

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
	
	/*dibujar:  debe ir dibujando los discos del poste desde el último que se insertó hasta  el 
	primero,  utilizando  el  método “dibujar” que  programamos  en  la  clase  Disco.  Al  final dibujaremos
 	la base del poste. La base consiste en símbolos “=”: para  que  el  dibujo quede bien, habrá 2 más que el 
	diámetro del disco más grande contenido en el poste. Por  ejemplo,  si  el  disco  más  grande  tiene diámetro
	7,  la  base  del  poste  tendrá  9 símbolos “=”:*/

	public void dibujar(){
		
		for (int i = 0; i < listaDiscos.size(); i++) {
			listaDiscos.get(i).dibujarDisco();
			System.out.println("");
		}		
		for (int i = 0; i < listaDiscos.get(listaDiscos.size()-1).getDiametro()+2; i++) {
			System.out.print("=");
		}
		
		
	}
}
