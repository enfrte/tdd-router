<?php 

// php vendor/bin/phpunit tests/RouterAssertionsTest.php

class RouterAssertionsTest extends \PHPUnit\Framework\TestCase {

	// Get just the class
	public function testGetClass()
	{
		$uris = [
			'https://www.foo.com/aClass/aMethod/argOne/argTwo',
		];
		$router = new Router($uris[0]);
		$r = $router->getClass();

		$this->assertTrue($r->class, 'aClass');
		/*
		if ($r->class === 'aClass') { 
			return true;
		}
		else {
			return false;
		}
		*/
	}
/*
	// Get just the method
	public function testGetMethod()
	{
		$uris = [
			'https://www.foo.com/aClass/aMethod/argOne/argTwo',
		];
		$router = new Router($uris[0]);
		$r = $router->getMethod();

		if ($r->method === 'aMethod') { 
			return true;
		}
		else {
			return false;
		}
	}

	// Search with multiple args
	public function testGetAllArgs()
	{
		$uris = [
			'https://www.foo.com/aClass/aMethod/argOne/argTwo',
		];
		$router = new Router($uris[0]);
		$r = $router->getArguments();

		if ($r->args === ['argOne', 'argTwo']) { 
			return true;
		}
		else {
			return false;
		}	
	}

	// Search with no args
	public function testNoArgs()
	{
		$uris = [
			'https://www.foo.com/aClass/aMethod/',
		];
		$router = new Router($uris[0]);
		$r = $router->getRoute();

		if ($r->class === 'aClass' && $r->method === 'aMethod' && empty($r->args)) { 
			return true;
		}
		else {
			return false;
		}
	} 

	// Search with no method - method will be replaced by index
	public function testNoMethod()
	{
		$uris = [
			'https://www.foo.com/aClass/',
		];
		$router = new Router($uris[0]);
		$r = $router->getRoute();

		if ($r->class === 'aClass' && $r->method === 'index' && empty($r->args)) { 
			return true;
		}
		else {
			return false;
		}
	}

	// Search with no route
	public function testNoRoute()
	{
		$uris = [
			'https://www.foo.com/',
		];
		$router = new Router($uris[0]);
		$r = $router->getRoute();

		if (empty($r->class) && empty($r->method) && empty($r->args)) { 
			return true;
		}
		else {
			return false;
		}	
	}
*/
}
