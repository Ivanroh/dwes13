package hanoi;

public class Disco {
	
	private int diametro;

	
	public Disco(int diametro) {
		
		if (diametro<3) {
			System.out.println("ADVERTENCIA: di�metro demasiado peque�o, se le asigna un 3.");
			this.diametro=3;
		}else if (diametro%2==0) {
			System.out.println("ADVERTECIA:  di�metro del disco inv�lido, se le asigna un "+(diametro+1)+".");
			this.diametro=diametro+1;
		}
		else 
			this.diametro = diametro;
	}

	public void dibujarDisco(int diametro){
		for (int i = 0; i < diametro; i++) {
			System.out.print("o");
		}
	}

	public int getDiametro() {
		return diametro;
	}
	



}
