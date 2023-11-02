<?php
    echo "<title>miPhp</title>";
    //Encabezado tipo1.
    echo "<h1>Pas 4~Exercici miPhp.php</h1>";
    //Creacion array dias de la semana
    $dias = array
    (
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado',
        'Domingo'
    );

    //Creacion diccionario citas. Para cada fecha yy-mm-dd guarda lista con nombre y edad del paciente. Crear 3 instancias.
    $citas = array
    (
        '23-09-19' => array('paciente' => 'Pablo', 'edad' => 25),
        '23-09-18' => array('paciente'  => 'Rosa', 'edad' => 75),
        '23-09-20' => array('paciente'  => 'Iker', 'edad' => 15)
    );

    //Diferencias de mostrar el diccionario con var_dump, print i print_r.
    echo "MOSTRADO CON VAR_DUMP:</br>";
    var_dump($citas);
    echo "</br>";
    echo "</br>MOSTRADO CON PRINT:</br>";
    print($citas);
    echo "</br>";
    echo "</br>MOSTRADO CON PRINT_R:</br>";
    print_r($citas);
    echo "</br>";
 
    //Mostrar diccionario con un buen formato.
    //Encabezado tipo2.
    echo "<h2>Citas:</h2>";
    //tabla
    echo "<table border='1'>";
        //Celdas de cabecera de la tabla sombreadas en gris y con el texto centrado.
        echo  "<tr><th style='background-color: lightgray; text-align:center;'>Fecha</th>";
        echo "<th style='background-color: lightgray; text-align:center;'>Nombre del Paciente</th>";
        echo "<th style='background-color: lightgray; text-align:center;'>Edad</th></tr>";
        
        //Por cada cita, se añadiran los datos a la tabla.
        foreach ($citas as $fecha => $cita) 
        {
            $nombrePaciente = $cita['paciente'];
            $edadPaciente = $cita['edad'];
            echo("<tr>");
                //Datos para cada celda de la fila correspondiente a una cita. La cita en azul. Todos los datos centrados en su celda.
                echo "<td style='text-align:center; color: blue;'> $fecha </td>";        
                echo "<td style='text-align:center;'> $nombrePaciente </td>";
                echo "<td style='text-align:center;'> $edadPaciente </td>";
            echo "</tr>";
        }
    
    echo "</table>";

    //Encabezado tipo2.
    echo "<h2>Dias:</h2>";
    //Listado de dias de la semana. Por cada elemento en el array se añade un item al listado.
    echo "<ul>";
        foreach ($dias as $dia)
        {
            echo "<li>$dia</li>";
        }
    echo "</ul>";
?>
