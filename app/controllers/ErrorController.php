<?php



class ErrorController extends CoreController
{

	// Constructeur vide
	public function __construct()
	{
		// Do noting
	}

	public function error404()
	{
		$this->show('404');
	}
}

?>