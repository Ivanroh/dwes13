package hanoi;

//import java.util.Scanner;

public class Principal {

	public static void main(String[] args) {
		/*Scanner teclado=new Scanner(System.in);
		System.out.println("Introduzca el diametro del disco");
		int diametro=teclado.nextInt();
		
		Disco disc=new Disco(diametro);
		
		disc.dibujarDisco();
		
		teclado.close();
		
		//Poste p=new Poste();
		
	//	p.insertarDisco(disc);
		
		/*p.dibujar();
		
		p.esVacio();
		
		p.extraerDisco();
		
		p.insertarDisco(new Disco(10));*/
		
		//teclado.close();
		
		/*Poste uno=new Poste();
		
		Disco duno=new Disco(3);
		Disco ddos=new Disco(5);
		Disco dtres=new Disco(7);
		
		
		uno.insertarDisco(duno);
		uno.insertarDisco(ddos);
		uno.insertarDisco(dtres);
		*/
		
		PartidaHanoi partida=new PartidaHanoi(3);
		
		//System.out.println(partida.getPostes().size());
		System.out.println(partida.getPostes().get(0).getListaDiscos().get(0).getDiametro());
		System.out.println(partida.getPostes().get(0).getListaDiscos().get(1).getDiametro());
		System.out.println(partida.getPostes().get(0).getListaDiscos().get(2).getDiametro());
		
		
		
		
		//System.out.println(partida.getPostes().get(1).getListaDiscos().size());
		

		//System.out.println(partida.getPostes().get(2).getListaDiscos().size());

		
	
		
		//uno.dibujar();
		
	}

}
