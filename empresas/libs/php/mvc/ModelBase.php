<?php
abstract class ModelBase 
{
	protected $db;
	protected $campo=array();
	

	public function __construct()
	{
		$this->db = SPDO::singleton();
	}
	
	public function extraer_valores($array)
		 {
		  foreach($array as $nombre_campo => $valor)
		  { 
			$this->campo[$nombre_campo]=$valor; 
			
		  }
		  return $this->campo;
		 }
}
?>