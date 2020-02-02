<h1>Calculatrice Post</h1>

<form method="post" action="calculatrice1.php">
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