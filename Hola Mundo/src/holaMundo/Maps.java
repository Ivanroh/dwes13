package holaMundo;

//import java.util.ArrayList;
import java.util.HashMap;

public class Maps {

	public static void main(String[] args) {
		
		/*HashMap<String, Integer> arrayAsociativo=new HashMap<>();
		
		arrayAsociativo.put("Junio",06);
		arrayAsociativo.put("Julio",07);
		arrayAsociativo.put("Agosto",8);
		
		arrayAsociativo.forEach((mes,fecha)->System.out.println("Mes: "+mes+" Fecha: "+fecha));
		 */
		
		HashMap<String,Integer> numTlf=new HashMap<>();
		
		numTlf.put("Ivan",664167891);
		numTlf.put("Rodrigo",664167892);
		numTlf.put("Luis",664167893);
		numTlf.put("Daniel",664167894);
		
		int busca=664167891;
		numTlf.forEach((nombre,numTlfno) -> {
			if (numTlfno == busca) {
				System.out.println("El télefono: "+busca+" corresponde al usuario "+nombre);
			}	
		});
	
		if (numTlf.containsValue(664167893)){
			System.out.println("Existe el valor");
		}
		
		if (numTlf.containsKey("Rodrigo")){
			System.out.println("Existe la clave");
		}
		
		
		System.out.println("\nEl número de Daniel es: "+numTlf.get("Daniel"));
		
		
		//ArrayList<String> ;
	
	}

}
