package hanoi;

public class Disco {
	
	private int diametro;

	
	public Disco(int diametro) {
		
		if (diametro<3) {
			System.out.println("ADVERTENCIA: diámetro demasiado pequeño, se le asigna un 3.");
			this.diametro=3;
		}else if (diametro%2==0) {
			System.out.println("ADVERTECIA:  diámetro del disco inválido, se le asigna un "+(diametro+1)+".");
			this.diametro=diametro+1;
		}
		else 
			this.diametro = diametro;
	}

	public void dibujarDisco(){
		for (int i = 0; i < diametro; i++) {
			System.out.print("o");
		}
	}

	public int getDiametro() {
		return diametro;
	}
	



}
