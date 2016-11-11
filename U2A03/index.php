<html>
<body>


<?php
/*Crea un nuevo proyecto PHP o que consistirá en una página web “index.php” o “index.html”
 *  con enlaces a las siguientes páginas , que ersolverán diferentes problemas. En cada una de las
 páginas se incluirá un enlace “Volver” para regresar a la página principal.*/


echo "<table style='border:solid 1px;'>";
echo "<caption><h4 style='border:solid 1px;'>Escoja una de las siguientes opciones</h4></caption>\n";

echo "<tr>";
echo "<form action='ecf-diferencia.php'>";
echo "<td>Diferencia entre dos números:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "<tr>";

echo "<tr>";
echo "<form action='ecf-suma.php'>";
echo "<td>Suma de los X primeros números naturales:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";

echo "<tr>";
echo "<form action='ecf-potencia.php'>";
echo "<td>Potencia de un número:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";

echo "<tr>";
echo "<form action='ecf-factorial.php'>";
echo "<td>Factorial de un número:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";
//
echo "<tr>";
echo "<form action='ecf-multiplicacion.php'>";
echo "<td>Tabla de multiplicar de un número:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";

echo "<tr>";
echo "<form action='ecf-recorte.php'>";
echo "<td>Recorte de una cadena de texto:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";

echo "<tr>";
echo "<form action='ecf-meses.php'>";
echo "<td>Número de días de un mes:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";

echo "<tr>";
echo "<form action='ecf-acumulador.php'>";
echo "<td>Acumulador de números:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";

echo "<tr>";
echo "<form action='ecf-multiplos.php'>";
echo "<td>Múltiplos de 3 y 5 (1-1000)Múltiplos de 3 y 5 (1-1000):</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";

echo "<tr>";
echo "<form action='ecf-cuadrado.php'>";
echo "<td>Generador de un cuadrado:</td><td><input style='border:solid 1px;' type='submit' name='enviar' value='Acceder'></td>";
echo "</form>";
echo "</tr>";


echo "<table>";

?>
</html>
</body>