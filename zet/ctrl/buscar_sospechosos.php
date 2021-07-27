<?php

    include_once('ExamenVirtual.php');

    $obj = new ExamenVirtual();
    
    $res = $obj->buscar_sospechosos();

    //var_dump($res['data']);
    //var_dump($obj->Devuelve_procesoActual());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSCAR PERSONA</title>
</head>
<body>
    
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">DNI</th>
            <th scope="col">FECHA REGISTRO</th>
            <th scope="col">OPCIONES</th>
        </tr>
    </thead>
    <tbody class=" small">
        <?php
            $num_es = 0;
            foreach ($res['data'] as $element) {
                # code...
                $num_es++;
                echo "
                    <tr id=\"bg1".$element['dni']."\">
                        <th scope='row'>{$num_es}</th>
                        <td>
                        <a href='https://examen.admisionunajma.pe/zetadmision/zet/ctrl/buscar_persona.php?sp=&dni_pte=".$element['dni']."&nom_pte=' target='_blank'>".$element['dni']."</a>
                        </td>
                        <td>".$element['fecha_registro']."</td>                        
                        <td><button type='button' class='btn btn-outline-info'>...</button></td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

</body>
</html>