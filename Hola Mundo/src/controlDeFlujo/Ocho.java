package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Ocho {

	public static void main(String[] args) {
		
		/*8) Basándote en la estructura `do-while`, diseña un menú de dos niveles,
		es decir: en un primer momento se pedirá escoger entre varias opciones, 
		y en cada una de ellas se pedirá de nuevo escoger entre un nuevo conjunto.
		La temática es libre (cálculo de áreas, enciclopedia, etc). 
		Es importante que tu programa reaccione correctamente ante entradas 
		erróneas del usuario, y que en todos los menús haya una opción para volver.*/
		
		Scanner sc=new Scanner(System.in);
		int opcion;
		boolean valido=true,sale=false;
		
		
		do{
		valido=true;
		sale=false;

		System.out.println("Eliga el tema del que desea obtener información");
		System.out.println("1. Libros ");
		System.out.println("2. Música");
		System.out.println("3. Cine");
		System.out.println("");
		
		try {
			opcion=sc.nextInt();
			switch (opcion) {
			case 1:
				do{
					try {
						if (sale) {
							valido=false;
							break;
						}
						else{
							System.out.println("1. Libros destacados en 2016");
							System.out.println("2. Libro más vendido");
							System.out.println("3. Volver");
							opcion=sc.nextInt();
							switch (opcion) {
							case 1:
								System.out.println("1º La chica del tren - Paula Hawkins / Narrativa Contemporánea\n"
									+ "2º El silencio de la ciudad blanca - Eva García Saénz / Novela Negra/n"
									+ "3º La viuda - Fiona Barton / Novela Negra"); break;
							case 2: System.out.println("Historia de dos ciudades (A Tale of Two Cities)	Charles Dickens	Inglés	1859	Más de 200 millones"); break;
							case 3:sale=true; 
									valido=false; break;
							default:valido=false;break;
							}
						}
		
					} catch (Exception e) {
						System.out.println("Error");
						valido=false;
						sc=new Scanner(System.in);
					}
				
				}
				while(!valido);
				break;
			case 2:
				do{
					try {
						if (sale) {
							valido=false;
							break;
						}
						else{
							System.out.println("1. Single más vendida de la historia.");
							System.out.println("2. Genero musical más escuchado en España");
							System.out.println("3. Volver");
							opcion=sc.nextInt();
							switch (opcion) {
							case 1:
								System.out.println("Bing Crosby - Estados Unidos	«White Christmas»	1942	50 millones"); break;
							case 2: System.out.println("El reggaeton es el género musical más escuchado en España"); break;
							case 3:sale=true; 
									valido=false; break;
							default:valido=false;break;
							}
						}
		
					} catch (Exception e) {
						System.out.println("Error");
						valido=false;
						sc=new Scanner(System.in);
					}
				}
				while(!valido);
				
				
				break;
			case 3:
				do{
					try {
						if (sale) {
							valido=false;
							break;
						}
						else{
							System.out.println("1.  Últimos estrenos");
							System.out.println("2. Película con mayor recaudacion (2016).");
							System.out.println("3. Volver");
							opcion=sc.nextInt();
							switch (opcion) {
							case 1:System.out.println("- 23/09/2016 - Blanka. "
									+ "- 23/09/2016 - Captain Fantastic."
									+ "- 23/09/2016 - El gruñón ."
									+ "- 16/09/2016 - El Pincel Mágico"); break;
							case 2: System.out.println("Capitán América (Civil War) 6 de mayo Marvel Studios / Walt Disney Pictures"); break;
							case 3:sale=true; 
									valido=false; break;
							default:valido=false;break;
							}
						}
		
					} catch (Exception e) {
						System.out.println("Error");
						valido=false;
						sc=new Scanner(System.in);
					}
				
				}
				while(!valido);
				break;

			default: valido=false;break;
			}
	
			
		} catch (InputMismatchException e) {
			System.out.println("Error");
			valido=false;
			sc=new Scanner(System.in);
		}
			
		}
		while(!valido);
		
		sc.close();

	}

}
