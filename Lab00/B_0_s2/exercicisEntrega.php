<?php
function importar_dades0($nomFitxer)
{
    $fichero = fopen($nomFitxer, 'r');
    $diccionario = array();
    
    $keys = fgetcsv($fichero);        
    
    while($fila = fgetcsv($fichero))
    {
        if(!isset($diccionario[$fila[0]]))
        {
            $diccionario[$fila[0]]  = array();
        }
        
        $product = array();
        for($i = 1; $i < count($fila); $i++)
        {
            $product[$keys[$i]] = $fila[$i];
        }
                    
        array_push($diccionario[$fila[0]], $product);
    }
    return $diccionario;
}

$dic= array();
$nomFitxer = 'fitxerProves.csv';
$dic = importar_dades0($nomFitxer);
//print_r($dic["prod_2"][1]);

function compra_clients($diccionario, $idCliente)
{
    $lista = "";
    foreach($diccionario as $product_name => $product_list)
    {
        foreach($product_list as $product_line)
        {
            if($product_line["Cust_ID"] == $idCliente)
            {
                if($lista != "")
                {
                    $lista = $lista.", ".$product_name;
                }
                else
                {
                    $lista = $lista.$product_name;
                }
                break;
            }
        }
    }
    if($lista != "")
    {
        $lista = $lista.".";
    }
    return $lista;        
}

$listaClient = compra_clients($dic, "Cust_2");
print_r($listaClient);

function guarda_dades($diccionario, $filename)
{
    file_put_contents($filename, json_encode($diccionario));
}

guarda_dades($dic, "fitxer_compres.json");

function afegeix_compra($diccionario, $compra)
{
    if(!isset($diccionario[$compra[0]]))
    {
        $diccionario[$compra[0]]  = array();
    }
    $keys = array_keys($compra);
    $dadesCompra = array();
    for($i = 1; $i<count($compra); $i++)
    {
        $dadesCompra[$keys[$i]] = $compra[$keys[$i]];
    }
    array_push($diccionario[$compra[0]], $dadesCompra);
     
    return $diccionario;
}

$product = array("product"=>'prod_5', "country"=>'USA', "date"=>'2008-12-12', "quantity"=>"7", "amount"=>"16", "card"=>'N', "Cust_ID"=>'Cust_36');
//$product2 = ['prod_4', 'USA', '2008-12-12', "7", "16", 'N', 'Cust_36'];

$dic = afegeix_compra($dic, $product);
//$dic = afegeix_compra($dic, $product2);
guarda_dades($dic, "fitxer_compres.json");

echo("<br>");
function borrar_compra($diccionario, $compra)
{
    if(isset($diccionario[$compra[0]]))
    {
        foreach($diccionario[$compra[0]] as $num => $linea_compra)
        {
            print_r($linea_compra);
            echo("<br>");
            $encontrado = true;
            $keys = array_keys($linea_compra);
            for($i=0; $i < count($linea_compra); $i++)
            {
                if($linea_compra[$keys[$i]] != $compra[$i+1])
                {   
                    $encontrado = false;
                    break;
                }
            }
            

            echo $encontrado ? 'true' : 'false';

            echo("<br>");
            if($encontrado)
            {
                echo($num);
                break;
            }
        }
        print_r($diccionario[$compra[0]][$num]);
        unset($diccionario[$compra[0]][$num]);
    }

    return $diccionario;
}

$product = ['prod_4', 'unknown', '2008-12-12', "1", "3", '', 'Cust_8'];
$dic = borrar_compra($dic, $product);
guarda_dades($dic, "fitxer_compres2.json");

function importar_dades($nomFitxer)
{
    $fichero = fopen($nomFitxer, 'r');
    $diccionario = array();
    
    $keys = fgetcsv($fichero);        
    
    while($fila = fgetcsv($fichero))
    {
        if(!isset($diccionario[$fila[0]]))
        {
            $diccionario[$fila[0]]  = array();
        }
        
        $product = array();
        for($i = 1; $i < count($fila); $i++)
        {
            if($i==3 || $i == 4)
            {
                $product[$keys[$i]] = intval($fila[$i]);
            }
            else
            {
                $product[$keys[$i]] = $fila[$i];
            }
        }
                    
        array_push($diccionario[$fila[0]], $product);
    }
    return $diccionario;
}

$dic = importar_dades($nomFitxer);
guarda_dades($dic, "fitxer_compres3.json");

function carregar_dades($nomFitxer)
{
    $json = file_get_contents($nomFitxer);
    $json_data = json_Decode($json, true);

    return $json_data;
}

echo("<br>");
$dic = carregar_dades("fitxer_compres3.json");
print_r($dic);

    echo("Fin");
?>
