<?php

	function hitung($string){
		$result = substr_count($string, "na");
		return $result;
	}
	// echo hitung("banananana");
	// echo "<br/>";
	// echo hitung("nana");
	// echo "<br/>";
	echo "Ditemukan ";
	echo hitung("banananana")+hitung("nana");
?>