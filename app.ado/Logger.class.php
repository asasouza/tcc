<?php
abstract class Logger{
	protected $filename;

	public function __construct($filename){
		$this->filename = $filename;
	}

	abstract function write($message);
}

?>