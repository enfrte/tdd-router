<?php 

// query string ?asdf=foo&bar=234

class Router {

	private $uri_exploded;

	public function __construct($uri)
	{
		$this->uri_exploded =  explode('/', $uri);;
	}

	public function getRoute()
	{
		
	}

	public function getClass()
	{
		return $this->uri_exploded[0];
	}

	public function getMethod()
	{
		return $this->uri_exploded[1];
	}

	public function getArguments()
	{
		$uri = $this->uri_exploded;
		// maybe check length
		$args = [3, ...$uri];
		return [...$args];
	}

}