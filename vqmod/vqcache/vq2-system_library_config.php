<?php
final class Config {
	private $data = array();

  	public function get($key) {
    	return (isset($this->data[$key]) ? $this->data[$key] : null);
  	}	
	
	public function set($key, $value) {
    	$this->data[$key] = $value;
  	}

	public function has($key) {
    	return isset($this->data[$key]);
  	}

  	public function load($filename) {
		$file = DIR_CONFIG . $filename . '.php';
		
    	if (file_exists($file)) { 
	  		$cfg = array();
	  
	  		require(VQMod::modCheck($file));
	  
	  		$this->data = array_merge($this->data, $cfg);
		} else {
			trigger_error('Error: Could not load config ' . $filename . '!');
			exit();
		}
  	}
}
?>