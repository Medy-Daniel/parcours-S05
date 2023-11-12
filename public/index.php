<?php

// Charge toutes les dépendances du programme
$BASE_URL = 'http://localhost/S05/parcours-S05/parcours-S05/public/';

require __DIR__ . '/../vendor/autoload.php';


require_once __DIR__ . '/../app/controllers/CoreController.php';


require_once __DIR__ . '/../app/controllers/MainController.php';

require_once __DIR__ . '/../app/controllers/ErrorController.php';



// Constantes de configuration 
// URL de base du site

// Namespace où chercher les controllers
// $NAMESPACE_CONTROLLERS = 'parcours\controllers\\';




// ========================
// AltoRouter
// ========================

// new instance of AltoRouter 
$altoRouter = new AltoRouter();
// dump($altoRouter);

// ================
// CONFIGURATION DE ALTOROUTER
// ================

// Configurer la partie commune des URL à ignorer
// Demande à AltoRouter d'ignorer cette partie des URL
$altoRouter->setBasePath('/S05/parcours-S05/parcours-S05/public');

$altoRouter->map(
	'GET', // Requete de type GET
	'/', // URL : / -> la page d'accueil du site
	// @see $match['target']
	[ // tableau avec le controller et la méthode à executer pour cette route : '/'
		'controller' => 'MainController',
		'method' => 'home',
	],
	'home' // nom de la route
);





// ================
// EXÉCUTION D'UNE ROUTE (DISPATCHER AVEC ALTOROUTER)
// ================

// Test est ce que la route demandée (l'URL saisie par l'utilisateur), 
// correspond à une des routes déclarée dans altoRouter
// $match = false si la route demandée n'est pas déclarée dans altorouter
// sinon $match contient un tableau
$match = $altoRouter->match();
// echo 'Variable $match : ';
// var_dump($match);

// Traiter le cas où $match == false
// Le cas où l'URL demandée ne match aucune route enregistrée dans AltoRouter (fonction map)
if( false == $match ) {
	$controller = new ErrorController();
	$controller->error404();
	exit();
}

// Récupérer le sous tableau associé à la clé 'target' dans $match
$target = $match['target'];
// echo 'Variable $target : ';
// var_dump($target);

// Récupérer le nom du controller associé à la clé 'controller' dans $target
$controllerName = $target['controller']; // String
// echo 'Variable $controllerName : ';
// dump($controllerName);

// Récupérer le nom de la méthode associée à la clé 'method' dans $target
$methodName = $target['method'];
// echo 'Variable $methodName : ';
// var_dump($methodName);

// Nouvelle instance du controller pour la route demandée
$controller = new $controllerName();
// var_dump($controller);

// echo '$params dans index.php :';
// dump($paramsAltoRouter);
// Paramètres de l'URL (partie dynamique, exemple : idCategory)
$paramsAltoRouter = $match['params'];

// Appel la fonction du controller pour la route demandée
$controller->$methodName($paramsAltoRouter);
