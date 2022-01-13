<?php

function item_bul($id){
    $oku = file_get_contents("WMitems.txt");
    $kes = explode('"'.$id.'"', $oku);
    if ($kes)
    {
        $kes2 = explode(",", $kes[1]);
        $kes3 = explode('"', $kes2[1]);
        return $kes3[1];
    }
    return "Bilinmiyor";
}

function getCode($length = 3){
	$code = '';
	$accept = array_merge(range(0,9),range('A','Z'));
	for($i = 0; $i < $length; $i++){
		$code .= $accept[rand(0, (count($accept)-1))];
	}
	
	return $code;
}
