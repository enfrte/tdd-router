<?php 

// query string ?asdf=foo&bar=234

class Router {

	private $uri_exploded;
	private $obj;

	public function __construct($uri)
	{
		$uri = strtok($uri, '?'); // Discard query string
		$uri = rtrim($uri,"/"); 
		$this->uri_exploded =  explode('/', $uri);
		$this->obj = new stdClass();
	}


	public function getRoute()
	{
		$this->obj->class = $this->getClass();
		$this->obj->method = $this->getMethod();
		$this->obj->arguments = $this->getArguments();
		return $this->obj;
	}


	public function getClass()
	{
		if (!empty($this->uri_exploded[0])) {
			return $this->uri_exploded[0];
		}

		return null;
	}


	public function getMethod()
	{
		if (empty($this->uri_exploded[0])) { // No class 
			return null;
		}
		elseif (empty($this->uri_exploded[1])) { // There is a class but no method
			return 'index'; // default
		}

		return $this->uri_exploded[1]; // There is a value
	}

	
	public function getArguments()
	{
		$uri = $this->uri_exploded;
		$uri_spread = [...$uri];

		if (count($uri_spread) > 2) {
			$arguments = array_slice($uri_spread, 2); 
			return $arguments;
		}

		return null;
	}

}