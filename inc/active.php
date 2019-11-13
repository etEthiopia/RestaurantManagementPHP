<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$page = $components[2];
$comp = explode('.', $page);
$active = $comp[0];

switch($active) {

	case 'index' : $title = 'HOME';
		break;
	case 'login' : $title = 'LOG IN';
		break;
	case 'register' : $title = 'REGISTER';
		break;
	case 'reservation' : $title = 'RESERVE A SPOT';
		break;
	case 'dashboard' : $title = 'DASHBOARD';
			break;
	case 'management' : $title = 'MANAGEMENT';
				break;
	default : $title = '';

}

?>
