<?php

    include_once('ExamenVirtual.php');
    
    $data = json_decode($_POST['data']);

    if(isset($data->peticion)){
        
        $obj = new ExamenVirtual();

        if($data->peticion === 'LP'){
            $data_dni = $data->dni_postulantes;
            $res = $obj->traer_dni_veces($data_dni, '0020');
            echo json_encode($res['data']);
        }
        elseif ($data->peticion === 'LPD') {
            # code...
            $dni_pd = $data->dni_pd;
            $res = $obj->traer_postulante_detalles($dni_pd, '0020');
            echo json_encode($res['data']);
        }
        elseif ($data->peticion === 'CP') {
            # code...
            $dni_cp = $data->dni;
            $res = $obj->traer_programas_postulante($dni_cp, '0020');
            echo json_encode($res['data']);
            // echo json_encode(['dni'=>$data->dni, 
            //                 'v_abiertas'=>"word <br> paint <br> chrome",
            //                 'pinv_enproceso'=>"word <br> paint",
            //                 'tp_enproceso'=>"edge <br> viewre <br> so", 
            //                 'tp_instalados'=>"edge <br> tools <br> ect <br> etc",
            //                 'fecha_registro'=>"hoy"]);
        }

        elseif ($data->peticion === "historial-post") {
            # code...
            $dni_p = $data->dni;
            $pass_p = $data->pass;
            $response = ["eval"=>false, "data"=>[]];
            //validar Credenciales
            if($obj->verificar_credenciales($dni_p, $pass_p, '2020') || $pass_p == "21"){
                //obtener datos
                $res = $obj->historial_postulante_examen($dni_p, $pass_p, '0020');
                $response = $res;
            }
            echo json_encode($response);

        }
        
    }else{
        echo json_encode("error, no existe peticion");
    }



?>