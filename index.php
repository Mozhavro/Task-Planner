<?php

require_once dirname(__FILE__). '/session.php';
require_once dirname(__FILE__). '/vendor/autoload.php';
require_once dirname(__FILE__). '/classes/Task.class.php';
require_once dirname(__FILE__). '/classes/User.class.php';

// TODO: If not installed then installation wizard

// TODO: if not authorized then auth esle tasks list

$loader = new Twig_Loader_Filesystem( dirname(__FILE__). '/templates' );
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    // 'cache' => dirname(__FILE__). '/templates/cache',
));

if ( !isset($_SESSION['login']) ) {

	$context = array();
	$template = $twig->load('auth.html');

} else {
	$user = \App\User::getByName($_SESSION['login']);
	header('Location: /profile');
}

echo $template->render($context);