<?php
/* FOR DEBUG PURPOSES... comment out when ready */
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
ini_set("log_errors", 1);
ini_set("ignore_repeated_errors", 0);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
/* END DEBUG SHIT */



include_once(dirname(__FILE__) . "/class/DA2062.php");



/*
 * TODO
 * Add action checker (2062, control log, etc)
 * Add validation for data... make sure its there ** im just doing this fast for ethan
 *   --> right now this just goes straing into 2062s
 */

// IF ACTION IS 2062 THEN {


$data = $_REQUEST["data"];
$allData = explode("\n", $data);
$headerData = explode("\t", $allData[0]);


// soldier data is all shit after header data in index 0, so splice
$soldierData = [];
foreach(array_splice($allData, 1) as $idx => $sdata) {
	$soldierData[] = explode("\t", $sdata);
}

$da2062 = new DA2062($headerData, $soldierData);


// END IF ACTION IS 2062 }

// ELSE DO THIS SHIT {

// END ELSE DO MORE SHIT }


include_once(dirname(__FILE__) . "/templates/printhead.php");
// IF IS 2062 {

include_once(dirname(__FILE__) . "/templates/2062/2062_template.php");

// END 2062 } ELSE DO THIS SHIT INCLUDE OTHER TEMPLATES {

// END OTHER SHIT }

include_once(dirname(__FILE__) . "/templates/printfoot.php");



?>
