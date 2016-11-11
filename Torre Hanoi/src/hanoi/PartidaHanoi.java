package hanoi;

import java.util.ArrayList;

public class PartidaHanoi {

	private ArrayList<Poste> postes;
	private int discosJuega;
	
	
	
	
	
	
	public ArrayList<Poste> getPostes() {
		return postes;
	}






	public void setPostes(ArrayList<Poste> postes) {
		this.postes = postes;
	}






	public int getDiscosJuega() {
		return discosJuega;
	}






	public void setDiscosJuega(int discosJuega) {
		this.discosJuega = discosJuega;
	}






	public PartidaHanoi(int discosJuega) {
		postes= new ArrayList<Poste>(3);
		
		if(discosJuega<1){
			System.out.println("ERROR: La partida debe tener al menos un disco");
			this.discosJuega=1;
		}else
			this.discosJuega = discosJuega;
		
		Poste uno=new Poste();
		Poste dos=new Poste();
		Poste tres=new Poste();
		
		/*Irá  creando e insertando discos en el primer poste hasta llegar al número de 
		discos deseado. ¿De qué diámetro serán? Se irán incrementando en dos unidades desde el 
		diámetro mínimo,  que  es  3.  Así,  si  nos  piden  cinco  discos, los  crearemos  con  los diámetros 
		3,  5,  7,  9  y  11. Observa que  se  cumple [diametro  del  disco =  numero  de  disco  *  2  +  1].
		Por ejemplo,  el  disco  1  tiene tamaño  3,  el  disco  2  tiene  tamaño  5,  y  así  sucesivamente. 
		Recuerda  que  los discos más grandes se insertan primero, para respetar las reglas del juego*/
		
		/*for (int i = discosJuega; i < 1; i--) {
			if(i%2==0){
				Disco aux=new Disco(3+i);
				uno.insertarDisco(aux);
			}	
		}*/
		
		for (int i = 0; i < discosJuega; i++) {			
				Disco aux=new Disco(3+i*2);
				uno.insertarDisco(aux);
		}
		
		//Por último, insertará los tres postes en la lista de postes
		
		postes.add(uno);
		postes.add(dos);
		postes.add(tres);
		
	}
	
	public boolean haTerminado(){
		
		if (postes.get(0).getListaDiscos().size()==0 && postes.get(0).getListaDiscos().size()==0 ){
			return true;
		}
		else if(postes.get(0).getListaDiscos().size()==discosJuega){
			return true;
		}
		return false;
	} 
	

	/*mover:  recibe como  parámetros  dos  números  de  poste:  origen  y  destino.  Extrae  un disco  del  poste  origen  y  
	 * lo  inserta  en  el  poste  destino. No  devuelve  nada,  pero mostrará  un  mensaje  de  error  si  no  se  ha  podido 
	 * mover  el  poste,  algo  que  puede ocurrir en alguno de los siguientes casos:*/
	
	
	public void mover(int origen, int destino){
		/*Si  el  tamaño  del  disco  que  está  en  la  cima  del  poste  origen  es  mayor  que  el 
		tamaño  del  disco  que  está  en  la  cima  del  poste  destino.¡Vigila  el  caso 	particular  en  el  
		que  el  poste  de  destino  está  vacío!  En  ese  caso  siempre  se puede insertar.*/
		
		
		if(origen!=0 || origen!=1 || origen!=2 && destino!=0 || destino!=1 || destino!=2){
			System.out.println("Error");
		}else
			if(postes.get(origen).esVacio()){
				System.out.println("Error");
			}else 
				if(!postes.get(destino).getListaDiscos().isEmpty());
				else
					if(postes.get(destino).getListaDiscos().get(postes.get(destino).getListaDiscos().size()-1).getDiametro() > postes.get(origen).getListaDiscos().get(postes.get(origen).getListaDiscos().size()-1).getDiametro()){
					System.out.println("Error");
					}
					else
						postes.get(destino).insertarDisco(postes.get(origen).extraerDisco());
	}
	
	
	/*dibujar:  dibuja en pantalla  la situación actual de  la partida: para ello se  apoyará en el 
	método “dibujar” de la clase Poste, que a su vez se apoya en el método “dibujar” de la clase Disco*/
	
	public void dibujar(){
		
	}	
	
}
