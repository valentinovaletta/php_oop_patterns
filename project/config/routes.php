<?php
	use \Core\Route;
	
	return [
		new Route('/hello/:var1/', 'hello', 'index'), // роут для приветственной страницы, можно удалить
		new Route('/telegram/:var1/', 'telegram', 'index'), // роут для telegram bot
	];
	
