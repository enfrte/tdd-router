<?php 

// php vendor/bin/phpunit tests/RouterAssertionsTest.php

use \PHPUnit\Framework\TestCase;
require 'Router.php';

class RouterAssertionsTest extends TestCase {

	// Get just the class
	public function testGetClass()
	{
		$request_uri = [
			'aClass/aMethod/argOne/argTwo',
			'aClass/aMethod/argOne/argTwo/',
			'aClass/aMethod/argOne/argTwo?foo=123',
		];

		foreach ($request_uri as $uri) {
			$router = new Router($uri);
			$class = $router->getClass();
			$this->assertSame($class, 'aClass');
		}
	}


	// Get just the method
	public function testGetMethod()
	{
		$request_uri = [
			'aClass/aMethod/argOne/argTwo',
			'aClass/aMethod/argOne/argTwo/',
			'aClass/aMethod/argOne/argTwo?foo=123',
		];

		foreach ($request_uri as $uri) {
			$router = new Router($request_uri[0]);
			$method = $router->getMethod();
			$this->assertSame($method, 'aMethod');
		}
	}


	// Search with multiple arguments
	public function testGetAllArguments()
	{
		$request_uri = [
			'aClass/aMethod/argOne/argTwo',
			'aClass/aMethod/argOne/argTwo/',
			'aClass/aMethod/argOne/argTwo?foo=123',
		];
		foreach ($request_uri as $uri) {
			$router = new Router($uri);
			$arguments = $router->getArguments();
			$this->assertSame($arguments, ['argOne', 'argTwo']);
		}
	}


	// Search with no arguments
	public function testNoArguments()
	{
		$request_uri = [
			'aClass/aMethod',
			'aClass/aMethod/',
			'aClass/aMethod?foo=123',
		];

		foreach ($request_uri as $uri) {
			$router = new Router($uri);
			$r = $router->getRoute();
			
			$this->assertSame($r->class, 'aClass');
			$this->assertSame($r->method, 'aMethod');
			$this->assertTrue(empty($r->arguments), true);
		}
	} 


	// Search with no method - method will be replaced by index
	public function testNoMethod()
	{
		$request_uri = [
			'aClass',
			'aClass/',
			'aClass?foo=123',
		];

		foreach ($request_uri as $uri) {
			$router = new Router($uri);
			$r = $router->getRoute();

			$this->assertSame($r->class, 'aClass');
			$this->assertSame($r->method, 'index');
			$this->assertTrue(empty($r->arguments), true);
		}
	}


	// Search with no route
	public function testNoRoute()
	{
		$request_uri = [
			'',
		];
		$router = new Router($request_uri[0]);
		$r = $router->getRoute();

		$this->assertTrue(empty($r->class), true);
		$this->assertTrue(empty($r->method), true);
		$this->assertTrue(empty($r->arguments), true);
	}

}
