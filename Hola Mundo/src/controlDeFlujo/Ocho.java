package controlDeFlujo;

import java.util.InputMismatchException;
import java.util.Scanner;

public class Ocho {

	public static void main(String[] args) {
		
		/*8) Bas�ndote en la estructura `do-while`, dise�a un men� de dos niveles,
		es decir: en un primer momento se pedir� escoger entre varias opciones, 
		y en cada una de ellas se pedir� de nuevo escoger entre un nuevo conjunto.
		La tem�tica es libre (c�lculo de �reas, enciclopedia, etc). 
		Es importante que tu programa reaccione correctamente ante entradas 
		err�neas del usuario, y que en todos los men�s haya una opci�n para volver.*/
		
		Scanner sc=new Scanner(System.in);
		int opcion;
		boolean valido=true,sale=false;
		
		
		do{
		valido=true;
		sale=false;

		System.out.println("Eliga el tema del que desea obtener informaci�n");
		System.out.println("1. Libros ");
		System.out.println("2. M�sica");
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
							System.out.println("2. Libro m�s vendido");
							System.out.println("3. Volver");
							opcion=sc.nextInt();
							switch (opcion) {
							case 1:
								System.out.println("1� La chica del tren - Paula Hawkins / Narrativa Contempor�nea\n"
									+ "2� El silencio de la ciudad blanca - Eva Garc�a Sa�nz / Novela Negra/n"
									+ "3� La viuda - Fiona Barton / Novela Negra"); break;
							case 2: System.out.println("Historia de dos ciudades (A Tale of Two Cities)	Charles Dickens	Ingl�s	1859	M�s de 200 millones"); break;
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
							System.out.println("1. Single m�s vendida de la historia.");
							System.out.println("2. Genero musical m�s escuchado en Espa�a");
							System.out.println("3. Volver");
							opcion=sc.nextInt();
							switch (opcion) {
							case 1:
								System.out.println("Bing Crosby - Estados Unidos	�White Christmas�	1942	50 millones"); break;
							case 2: System.out.println("El reggaeton es el g�nero musical m�s escuchado en Espa�a"); break;
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
							System.out.println("1.  �ltimos estrenos");
							System.out.println("2. Pel�cula con mayor recaudacion (2016).");
							System.out.println("3. Volver");
							opcion=sc.nextInt();
							switch (opcion) {
							case 1:System.out.println("- 23/09/2016 - Blanka. "
									+ "- 23/09/2016 - Captain Fantastic."
									+ "- 23/09/2016 - El gru��n ."
									+ "- 16/09/2016 - El Pincel M�gico"); break;
							case 2: System.out.println("Capit�n Am�rica (Civil War) 6 de mayo Marvel Studios / Walt Disney Pictures"); break;
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
