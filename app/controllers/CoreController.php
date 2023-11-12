<?php

// namespace parcours\controllers;

// require_once __DIR__ . '/MainController.php';

class CoreController{

    protected function show($viewName, $viewData = [])
	{

		// echo '$viewData (méthode show) : ';
		// dump($viewData);

		// Récupère la constante $BASE_URL définie dans index.php
		global $BASE_URL;

		// Répérer l'instance de AltoRouter définie dans index.php
		global $altoRouter;

		// extract($viewdata);
      
		// require fait "comme si" il copie dans show() le code des template
		// j'ai donc accès DANS LES TEMPLATES aux varaibles de show()
		// donc je peux utiliser $viewData dans la code des template
		
        // require __DIR__ . '/../views/header.tpl.php';

		require __DIR__ . '/../views/' . $viewName . '.tpl.php';

		// require __DIR__ . '/../views/footer.tpl.php';
	}


}

?>