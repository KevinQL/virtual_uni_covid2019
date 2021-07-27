<?php


    include_once('zet/ctrl/ExamenVirtual.php');


    $data = json_decode($_POST['data']);
    $user = $data->user;
    $clavel = $data->clave;


    $obj = new ExamenVirtual();
    
    //insertando cambiode ventana
    $res = $obj->obtener_telefono($user, $clavel);
    
    // echo json_encode("response 222 ->" . $data->user);
    echo json_encode($res);
?>