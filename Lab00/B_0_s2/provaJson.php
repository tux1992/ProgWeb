<?php
$jsonobj='{"Peter":35,"Ben":37,"Joe":43}';
$arr=json_decode($jsonobj,true);

//Mostrara el array con toda la info en cuanto a tipo de dato, longitud de cadenas y demás.
var_dump($arr);
echo "</br>";
//Mostrara el array tal cuál legible por humanos, simplemente cadena => valor.
print_r($arr);
echo "</br>";
//No muestra más que el tipo, que es array.
echo $arr;
echo "</br>";
//Únicamente muestra el tipo, array. Igual que echo.
print($arr);
echo "</br>";
//Muestra cómo sería el objeto json, ya que en realidad estamos mostrando tal cuál el array, pero codificado como json. Es el proceso inverso de la línea 3.
echo json_encode($arr);
?>
