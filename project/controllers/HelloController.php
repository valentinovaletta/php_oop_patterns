<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class HelloController extends Controller
	{
		public function index($params) {
			$this->title = 'Фреймворк работает!';
			return $this->render('hello/index', $params);
		}
	}
