<?php
//Creacio array
$list = array
(
    array('a1', 'a2', 'a3', 'a4'),
    array('123', '456', '789', '343'),
    array('aaa', 'bbb', 'ccc', 'dddd'),
);

//Obrim fitxer per a escriure sobre ell
$fp = fopen('file.csv', 'w');

//Per a cada array del diccinoari
foreach ($list as $fields) 
{
    //Escribim els camps del array en ixa linia del fitxer.
    fputcsv($fp, $fields);
}
//Una vegada hem escrit el fitxer sencer el tanquem.
fclose($fp);


//Obrim el fitxer csv en modo lectura.
$file = fopen('file.csv', 'r');
//Obrim el fitxer txt en modo escritura.
$filetxt = fopen('file.txt', 'w');

//Creem un array buit.
$datos = array();

//Mentres se puga llegir una linia
while ($row = fgetcsv($file)) 
{
    //Guardem el contingut sencer, separat per guionet a la variable fila.
    $fila = "$row[0]-$row[1]-$row[2]-$row[3]\n";
    //Creem un diccionari buit per fila, amb la clau del primer element de la fila.
    $datos[$row[0]] =[];
    
    //Per cada element de la fila (menos el primer) afegim al array amb clau actual.
    for ($i=1;$i<count($row);$i++) 
        $datos[$row[0]][] = $row[$i];
    
    //Una vegada hem llegit la fila sencera la afegim al fitxer txt i pasem a la següent línia
    fwrite($filetxt, $fila);
}
fclose($filetxt);
var_dump($datos);
$file = 'file.json';
file_put_contents($file, json_encode($datos));
?>
