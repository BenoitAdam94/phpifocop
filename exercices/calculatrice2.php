<h1>Calculatrice Get</h1>

<form method="get" action="calculatrice2.php">
  <input id="case1" name="case1" type="number">
  <select id="operation" name="operation">
    <option>+</option>
    <option>-</option>
    <option>*</option>
    <option>/</option>
  </select>
  <input id="case2" name="case2" type="number">
  <input id="calculer" type="submit" value="Calculer">  
</form>

<?php



if(
            isset($_GET['case1']) &&
            isset($_GET['case2'])) {

            $case1 = $_GET['case1'];
            $case2 = $_GET['case2'];
            $operation = $_GET['operation'];

              
            
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