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