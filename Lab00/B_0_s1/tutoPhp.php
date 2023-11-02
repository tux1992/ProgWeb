<?php

    /*esto es un comentario 
    que termina aqui*/

    //Esto es otro comentario de sólo una linea

    //constante
    const PI=2.1416;

    //Variables
    $a=2;
    $b=2;
    echo "Hola Mundo\n<p/>";

    if(isset($c))
    {
        echo $c;
    }
    else
    {
        echo "\nLa variable c no existe.\n";
    }

    $c=$a.$b;
    $d=$a.$b;
    echo $d,"\n";
    echo "$c,\n";
    echo '$c';
    echo "\n",PI*3,"\n";

    //Funciones

    function concatenar($a)
    {
        $a="bienvenida/o";
        echo $a,"\n";
        echo "\nFIN\n</p>\n";
    }
    
    concatenar("  oo ");
    print_r("\n concatenar </p>\n");

    $lista=array(1,2,3,4,5);

    for ($i=0;$i<sizeof($lista);$i++)
    {
        echo $lista[$i]."\n";
    }

    $lista=array();
    $lista[]=1;
    print_r($lista);
    print_r("\n Listas r\n </p>");
    //diccionarios

    $grants=array('read'=>'1','write'=>'2');
    echo $grants['read'],"\n";

    print_r ($grants);  //muestra listas

    var_dump ($grants);  //muestra tipos complejos

    foreach($grants as $val => $n)
    {
        echo $val,"-",$n,"\n";
    }

    print_r("\n Diccionarios </p>\n");
            
    if ($a=='hola')
    {
        echo "1";
    }
    else
    {
        echo "2";
    }

    $a="3";

    switch ($a)
    {
        case "1":
            echo "1";break;
        case "2":
            echo "2";break;
        default:
            echo "3";break;
    }	
?>
