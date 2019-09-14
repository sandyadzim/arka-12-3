<?php
            function userValidasi($username){
                $smalVal = preg_match('/[a-z]/', $username);
                $bigVal = preg_match('/[A-Z]/', $username);
                $angka = preg_match('/[0-9]/', $username);
                $awalan = preg_match('/^[a-zA-Z]/', $username);
                $special = preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":!<>?~\\\\]/', $username);

                if (!$awalan || !$smalVal || !$bigVal || !$angka || $special || strlen($username) <= 4 || strlen($username) >= 10) {
                    echo "Username Invalid";
                }else{
                    echo "Username Valid";
                }
            }

            $username = "Ayu99v";
            userValidasi($username);
            echo "<br>";

            function passValidasi($password){
                $minVal = strlen($password) >= 8;
                $kapVal = preg_match('/[A-Z]/', $password);
                $lowVal = preg_match('/[a-z]/', $password);
                $numberr = preg_match('/[0-9]/', $password);
                $specVal = preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":!<>?~\\\\]/', $password);
                $specval1 = preg_match('/[@]/', $password);
                
                if ($minVal && $kapVal && $lowVal && $numberr && $specVal && $specval1) {
                    echo "Password Valid";
                }else{
                    echo "Password Invalid";
                }
            }
        
            $password = "C0d3YourFuture!#";
            passValidasi($password);
            echo "<br/>";
?>