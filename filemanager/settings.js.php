<?php
require_once( '../../php/util.php' );
eval( getPluginConf( 'filemanager' ) );


// unzip should be the latest key index
foreach(array_merge($fm['archive']['types'], array('unzip')) as $kid => $external) {
	if((findEXE($external) === false) && isset($fm['archive']['types'][$kid])) { 
		unset($fm['archive']['types'][$kid]); 
		echo 'log("FILE MANAGER: ',$external,' "+theUILang.fErrMsg[24]);',"\n";
	}

}

echo 'theWebUI.fManager.homedir = "', rtrim($topDirectory, '/'), '";',"\n";
echo 'theWebUI.fManager.mkdefmask = "', $fm['mkdperm'], '";',"\n";
echo 'theWebUI.fManager.archives = '.safe_json_encode($fm['archive']).';',"\n";

?>