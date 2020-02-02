<?php



if(
            isset($_POST['case1']) &&
            isset($_POST['case2'])) {

            $case1 = $_POST['case1'];
            $case2 = $_POST['case2'];
            $operation = $_POST['operation'];

              
            
            switch ($operation) {
              case '+' :
                $resultat = $case1 + $case2;
                break;
              case '-' :
                $resultat = $case1 - $case2;
                break;
              case '*' :
                $resultat = $case1 * $case2;
                break;
              case '/' :
                if ($case2 != 0)
                $resultat = $case1 / $case2;
                else {
                  $resultat = '<img src="dividebyzero.jpg">';
                }
                break;  
              return $resultat;
            }

            echo "$case1 $operation $case2 = $resultat";
            
            }

            ?>