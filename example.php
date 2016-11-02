<?php
include ("directoryTree.php");
use Util\Dir;

$dir = array(
	'nivel',
	'nivel2'=>array(
		'subnivel1',
		'subnivel2'=>array(
			'subnivel3',
			'subnivel4'=>array(
				'subsubnivel4'
			)
		)
	)
);
$directoryTree = new Util\Dir\DirectoryTree($dir);
$directoryTree->createDirectoryTree();