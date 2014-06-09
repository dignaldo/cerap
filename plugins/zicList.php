<?php
function readFileIntoBuffer( $filename ) 
{	@$fp = fopen( $filename, "r"); 
	if ( $fp ) 
	{	$val = fread( $fp, filesize( $filename )); 
		fclose( $fp ); 
		return $val; 
	} 
	return false; 
} 
$liste=readFileIntoBuffer('zicList.xml'); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, "); 
echo "$liste"; 
?>