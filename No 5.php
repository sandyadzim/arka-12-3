<?php 	
function cetakAcak($jumlah){
	$karakter ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for($i=0;$i < $jumlah;$i++){
		$acak =substr(str_shuffle($karakter),1,32);
		echo "$acak<br/>";
	}
}
echo cetakAcak(3);
 ?>
 