<?php

    include_once('ExamenVirtual.php');

    $obj = new ExamenVirtual();
    
    $dni_postulante = "77383437";
    $nombre_postulante = "";

    $res = $obj->historial_postulante_examen($dni_postulante, $nombre_postulante, '0020');

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



    <title>HIDTORIAL POSTULANTE</title>
</head>
<body>

<div class="container py-2">
    <input type="text" class="txt_dni" placeholder="DNI POSTULANTE">
    <input type="password" class="txt_pass" placeholder="CONTRASENA">
    <button type="button" class="btn btn-outline-secondary" onclick="obtener_historial()">BUSCAR</button>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">DNI</th>
            <th scope="col">VENTANAS INADECUADOS</th>
            <th scope="col">PROCESOS INADECUADOS</th>
            <th scope="col">VENTANAS ABIERTAS</th>
            <th scope="col">DISPOSITIVOS</th>
            <th scope="col">FECHA</th>
            <th scope="col">ACCIÓN</th>
        </tr>
    </thead>
    <tbody class="result_html small">
        <?php
            // $num_es = 0;
            // foreach ($res['data'] as $element) {
            //     # code...
            //     $num_es++;
            //     echo "
            //         <tr id=\"bg1".$element['dni']."\">
            //             <th scope='row'>{$num_es}</th>
            //             <td>".$element['dni']."</td>
            //             <td>".$element['v_abiertas']."</td>                        
            //             <td>".$element['pin_enproceso']."</td>                        
            //             <td>".$element['tp_enproceso']."</td>                        
            //             <td>".$element['tp_instalados']."</td>                        
            //             <td>".$element['fecha_registro']."</td>                        
            //             <td><button type='button' class='btn btn-outline-info'>...</button></td>
            //         </tr>
            //     ";
            // }
        ?>
    </tbody>
</table>




<!-- SCRIPTS PARA REALIZAR BUSQUEDA -->
<script src="js/scripts_share.js"></script>
<script>


    // VARIABLES GLOBALES
    const URL_AJAX = 'ajax_s.php';

    function obtener_historial(){
        let dni = document.querySelector(".txt_dni").value;
        let pass = document.querySelector(".txt_pass").value;

        if(dni.length == 8 && pass.length != 0){
        
            let peticion = 'historial-post';
            fetchKev('post',{peticion, dni, pass},function(x){
                console.log(x);

                let cont_hmtl=``;
                let reg_html = document.querySelector(".result_html");
                let num_list = 0;

                if(x.eval){
                    x.data.forEach(element => {
                        num_list++;
                        cont_hmtl +=`
                            <tr id=${element.dni}>
                                <th scope='row'>${num_list}</th>
                                <td>${element.dni}</td>
                                <td>${element.v_abiertas}</td>                        
                                <td>${element.pin_enproceso}</td>                        
                                <td>${element.tp_enproceso}</td>                        
                                <td>${element.tp_instalados}</td>                        
                                <td>${element.fecha_registro}</td>                        
                                <td><button type='button' class='btn btn-outline-info'>...</button></td>
                            </tr>
                        `;
                    });
                }

                reg_html.innerHTML = cont_hmtl;
            }, URL_AJAX)
        }
        
    }



</script>


</body>
</html>