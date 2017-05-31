<?php

/*
interesting arbitation ids
454
4ff
453
250
*/

function hex2str($hex) {
	$str = '';
	for($i=0;$i<strlen($hex);$i+=2) $str .= chr(hexdec(substr($hex,$i,2)));
	return $str;
}

$filedata_arr = file("test.can");
// print_r($candata_arr);

foreach($filedata_arr as $line => $linedata) {

	if($line < 100000000) {
		// echo($linedata);	

		$linedata_arr = explode(" ",$linedata);

		// print_r($linedata_arr);

		// entry 4 is arb id
		// entries 9 to 16 is the can data

		$arb_id = $linedata_arr[4];

		$candata = '';
		$candata .= $linedata_arr[9];
		$candata .= $linedata_arr[10];
		$candata .= $linedata_arr[11];
		$candata .= $linedata_arr[12];
		$candata .= $linedata_arr[13];
		$candata .= $linedata_arr[14];
		$candata .= $linedata_arr[15];
		$candata .= $linedata_arr[16];

		// echo("$line: ARB $arb_id --> $candata\n");

		$canchar = '';
		$canchar .= chr( hexdec($linedata_arr[9]));
		$canchar .= chr(hexdec($linedata_arr[10]));
		$canchar .= chr(hexdec($linedata_arr[11]));
		$canchar .= chr(hexdec($linedata_arr[12]));
		$canchar .= chr(hexdec($linedata_arr[13]));
		$canchar .= chr(hexdec($linedata_arr[14]));
		$canchar .= chr(hexdec($linedata_arr[15]));
		$canchar .= chr(hexdec($linedata_arr[16]));		

		// echo("$canchar\n");

		// find interesting data in ascii		
		// $pattern = '/[a-z0-9]{2}/i';
		// if( preg_match($pattern, $canchar) ) {
		
		if($arb_id == "4FF") {	
			echo("$line: Posible vin in $arb_id --> $canchar.\n");
			// exit;
		}


	}


}

?>
