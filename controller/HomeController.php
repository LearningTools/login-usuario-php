<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

class HomeController
{
	/**
	 * PAGE: index
	 * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
	 */
	public function index()
	{
		// load view
		require APP . 'view/home/index.php';
	}

	public function log_out()
	{
		session_start();
		session_destroy();
		$casa = URL;
		header("location: $casa");
	}

}
