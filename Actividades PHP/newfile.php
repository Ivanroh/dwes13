<?php

$pais = $_REQUEST['pais'];

switch ($pais) {
	case 'espana':
		echo '{"region":"Asturias"}';
		echo '{"region":"Galicia"}';
		echo '{"region":"Cantabria"}';
		echo '{"region":"País Vasco"}';
		echo '{"region":"Navarra"}';
		echo '{"region":"Aragón"}';
		echo '{"region":"Cataluña"}';
		echo '{"region":"Castilla y León"}';
		echo '{"region":"Madrid"}';
		echo '{"region":"La Rioja"}';
		echo '{"region":"Extremadura"}';
		echo '{"region":"Castilla La Mancha"}';
		echo '{"region":"Valencia"}';
		echo '{"region":"Murcia"}';
		echo '{"region":"Andalucía"}';
		echo '{"region":"Canarias"}';
		echo '{"region":"Baleares"}';
		break;
}