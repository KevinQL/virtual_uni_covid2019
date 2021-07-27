<?php

    include_once('ExamenVirtual.php');

    $dni_supervisor = $_GET['sp'];
    $dni_postulante = $_GET['dni_pte'];
    $nombre_postulante = $_GET['nom_pte'];

    $obj = new ExamenVirtual();
    
    $res = $obj->buscar_usuario_examen($dni_supervisor, $dni_postulante, $nombre_postulante, '0020');

    //var_dump($res['data']);
    //var_dump($obj->Devuelve_procesoActual());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- google fonts    -->

    <!-- font awesome -->
        <script src="https://kit.fontawesome.com/1c90e8b317.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@500&display=swap" rel="stylesheet">



    <title>BUSCAR PERSONA</title>
</head>
<body>
    
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">DNI</th>
            <th scope="col">ESTUDIANTE</th>
            <th scope="col">SUPERVISOR</th>
            <th scope="col">NOMBRE SUPERVISOR</th>
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
                    <tr id=\"bg1".$element['numerodocumento']."\">
                        <th scope='row'>{$num_es}</th>
                        <td>".$element['numerodocumento']."</td>
                        <td>".$element['nombrecompleto']."</td>                        
                        <td>
                            <a href='https://examen.admisionunajma.pe/zetadmision/zet/ctrl/index.php?sp=".$element['supervisor']."' target='_blank'>".$element['supervisor']."</a>
                        </td>
                        <td>".$element['noms']."</td> 
                        <td><button type='button' class='btn btn-outline-info'>...</button></td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>


</body>
</html>