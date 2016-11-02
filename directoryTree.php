<?php
namespace Util\Dir;
class DirectoryTree {

	private $array;
	public function __construct($array){
		$this->array = $array;
	}
	private function recursiveArray(){
		$iterator = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($this->array));
		$parent = '';
		$arrayTree = array();
		foreach ($iterator as $key=>$value){
			for ($i = 0; $i < $iterator->getDepth();$i++){
					$iteratorKey = $iterator->getSubIterator($i)->key();
						$parent.= $iteratorKey.DIRECTORY_SEPARATOR;
						
			}
			if (empty($parent)){
				$arrayTree[] = $iterator->getSubIterator($i)->current();
			}else{
				$arrayTree[] = $parent;
				$arrayTree[] = $parent.$iterator->getSubIterator($i)->current();
			}
			//$arrayTree[$parent]= $iterator->getSubIterator($i)->current();
			$parent = '';
		}
		return $arrayTree;
	}
	public function createDirectoryTree(){
		$arrayTree = $this->recursiveArray();
		if (is_array($arrayTree)){
			foreach ($arrayTree as $key=>$value){
				if(!is_dir($value)){
					mkdir($value,0777,true);
				}
			}
			return true;
		}
		throw new Exception("Incorrect array format");
	}
}