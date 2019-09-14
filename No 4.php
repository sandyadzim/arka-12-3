<?php
	function cetak($karakter){
	    for($i = 1; $i <= $karakter; $i++){
	        for($j = 1; $j <= $karakter; $j++ ){
	            if($j == 1){
	                echo '* ';
	            }elseif($j == 5){
	                echo '* ';
	            }elseif($i == 3){
	                echo '* ';
	            }else{
	                echo '= ';
	            }
	        }
	        echo '<br>';
	    }
	}
	cetak(5);
?>
