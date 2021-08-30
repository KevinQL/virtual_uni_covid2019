<?php

    include_once('ExamenVirtual.php');

    $dni_supervisor = $_GET['sp'];

    $obj = new ExamenVirtual();
    
    $res = $obj->traer_estudiantes($dni_supervisor, '0020');

    //var_dump($res['data']);
    //var_dump($obj->Devuelve_procesoActual());

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <title>SUPERVISIÓN - UNAJMA</title>

    <style>
        body{
            font-family: 'Gothic A1', sans-serif;
        }
        .contenido{
            height:77vh;
        }
    
    </style>
</head>
<body>

    <header class="bg-secondary py-2">
    </header>

    

    <div class="container">
        <!-- <h3></h3>
        <div class="">
                
        </div> -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">CONTROL PROGRAMAS</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" onclick="Obtener_postulantes_reg1();">CONTROL EXAMEN</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">APOYO</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- CONTROL PROGRAMAS -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
    <div class="row">
        <div class="col-md-7">
            <div class="text-right">
                Postulante seleccionado: <small id="nombre_post1" class="badge badge-danger">... </small>
                <small class="badge badge-light">LISTA DE ESTUDIANTES</small>
            </div>
            <div class="overflow-auto contenido">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">DNI</th>
                            <th scope="col">ESTUDIANTE</th>
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
                                        <td><button type='button' class='btn btn-outline-info' onclick='ImprimirProgramas_postulante(\"".$element['numerodocumento']."\");'>Detalles</button></td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-5">
            <div class="text-right">
                REVIZAR: <small id="verPostulante" class="badge badge-danger">...</small>
                <small class="badge badge-light"> PROGRAMAS INSTALADOS</small> 
            </div>
            <div class="row">
                <div class="col-4 text-sm">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><small><span class="badge badge-pill badge-warning font-weight-bold">1.</span> PROG. ABIERTOS EN LA PC</small></a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><small><span class="badge badge-pill badge-warning font-weight-bold">2.</span> PROG. INADECUADOS ABIERTOS</small></a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><small><span class="badge badge-pill badge-warning font-weight-bold">3.</span> PROCES. INADECUADOS EN SEGUNDO PLANO</small></a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><small><span class="badge badge-pill badge-warning font-weight-bold">4.</span> DISPOSITIVOS</small></a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!--  -->
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div id="programas_btn1" class="text-center text-uppercase bg-secondary text-white text-monospace rounded">
                                ...
                            </div>
                        </div>
                        <!--  -->
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div id="programas_btn2" class="text-center text-uppercase bg-secondary text-white text-monospace rounded">
                                ...
                            </div>
                        </div>
                        <!--  -->
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div id="programas_btn3" class="text-center text-uppercase bg-secondary text-white text-monospace rounded">
                                ...
                            </div>
                        </div>
                        <!--  -->
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <div id="programas_btn4" class="text-center text-uppercase bg-secondary text-white text-monospace rounded">
                                ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>              


            </div>
            <!-- CONTROL EXAMEN -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
<nav class="container bg-light py-3">
    <div class="row">
        <div class="col-md-2">
            <input type="button" value="Recargar Lista" onclick="Obtener_postulantes_reg1();" class="btn btn-outline-dark" id="btn_cargar"> 
        </div>
        <div class="col-md-10 text-center lead">
            <h3>SUPERVISION UNAJMA EXAMEN VIRTUAL</h3>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="text-right">
                Postulante seleccionado: <small id="nombre_post2" class="badge badge-danger">... </small>
                <small class="badge badge-light">LISTA DE ESTUDIANTES</small>
            </div>
            <div class="overflow-auto contenido">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">DNI</th>
                            <th scope="col">ESTUDIANTE</th>
                            <th scope="col"># VECES</th>
                            <th scope="col">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="result_reg1 small">
                        <?php
                            $num_es = 0;
                            foreach ($res['data'] as $element) {
                                # code...
                                $num_es++;
                                echo "
                                    <tr>
                                        <th scope='row'>{$num_es}</th>
                                        <td>".$element['numerodocumento']."</td>
                                        <td>".$element['nombrecompleto']."</td>
                                        <td>
                                            <button type='button' class='btn btn-primary'>
                                                Cambios <span class='badge badge-danger'>0</span>
                                                <span class='sr-only'>veces cambios ventana</span>
                                            </button>
                                        </td>
                                        <td><button type='button' class='btn btn-outline-info' onclick='alert(\"Click en recargar Lista.\");'>Detalles</button></td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="text-right">
                <small class="badge badge-light">DETALLES DE ESTUDIANTES</small>
            </div>
            <div class="overflow-auto contenido">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">TIPO</th>
                        </tr>
                    </thead>
                    <tbody class="result_reg2 small">
                        <tr>
                            <th scope='row'>1</th>
                            <td>ejemplo 12/13/20 3:00:00</td>
                            <td>
                                <span class="badge badge-info">1</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


            </div>
            <!-- APOYO -->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                REINICIA TODO. <br>
                Atte. LOS DE SISTEMAS.
            </div>
        </div>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>





    <script>
        // VARIABLES GLOBALES
        const URL_AJAX = 'ajax_s.php';
        let data_postulante = []
        let dni_postulantes = [];
        let datos_POST = '<?php echo json_encode($res['data']); ?>';
        const datos_origen_post = JSON.parse(datos_POST);

        let manejador = false;

        //ver datos ingreso
        console.log(datos_origen_post);
        
        array_data_postulante();
        console.log(dni_postulantes);
        console.log(data_postulante);
        

        //FUNCIONES ------------------------------
            function Obtener_postulantes_reg2(dni_pd){

                let txt_nomPost = document.querySelector("#nombre_post2");
                let dnix = `${dni_pd}-K`;
                txt_nomPost.innerHTML = data_postulante[dnix].nombrecompleto;
                sweetModalMin("Cargando . . .",'top',1200,'question');

                // console.log(dni_pd);
                let peticion = 'LPD';
                fetchKev('post',{peticion, dni_pd},function(x){
                    console.log(x);
                    let cont_hmtl=``;
                    let reg2_html = document.querySelector(".result_reg2");
                    let num_list = 0;
                    x.forEach(element => {
                        num_list++;
                        cont_hmtl +=`
                            <tr>
                                <th scope='row'>${num_list}</th>
                                <td>${element.fecha_hora}</td>
                                <td>
                                    <span class="badge badge-info">${element.tipo}</span>
                                </td>
                            </tr>
                        `;
                    });

                    reg2_html.innerHTML = cont_hmtl;
                }, URL_AJAX)
            }


            function Obtener_postulantes_reg1(){
                //variable global
                manejador = true;


                let peticion = 'LP';
                fetchKev('post',{peticion, dni_postulantes},function(x){
                    console.log(x) 
                    
                    let dni
                    let reg1_html = document.querySelector(".result_reg1");
                    let pl_html = ``;
                    let num_es=0;
                    x.forEach(reg_post => {
                        num_es++;
                        dnix = `${reg_post.dni}-K`;
                        // console.log(data_postulante[dnix]);
                        pl_html +=`
                            <tr>
                                <th scope='row'>${num_es}</th>
                                <td>${data_postulante[dnix].numerodocumento} </td>
                                <td>${data_postulante[dnix].nombrecompleto}</td>
                                <td>
                                    <button type='button' class='btn btn-primary'>
                                        Cambios <span class='badge badge-danger'>${reg_post.veces_c}</span>
                                        <span class='sr-only'>veces cambios ventana</span>
                                    </button>
                                </td>
                                <td><button type='button' class='btn btn-outline-info' onclick='Obtener_postulantes_reg2(\"${data_postulante[dnix].numerodocumento}\");'>Detalles</button></td>
                            </tr>
                        `; 
                        
                    });
                    if(num_es != 0){
                        sweetModalMin("Postulantes cargados!",'top',2000,'success');
                        reg1_html.innerHTML = pl_html;
                    }else{
                        sweetModalMin("Ningun postulante salió del examen",'top',2000,'info');
                    }

                }, URL_AJAX)
            }

            //datos estructurados
            function array_data_postulante(){
                let dni;
                datos_origen_post.forEach(element => {
                    dni_postulantes.push(element.numerodocumento); //array DNI postulantes
                    dni = String(element.numerodocumento)+'-K';
                    data_postulante[dni] = { 
                        nombrecompleto: element.nombrecompleto,
                        numerodocumento: element.numerodocumento,
                        proceso: element.proceso 
                    }
                });
                return null;
            }


            //mostrar programas del postulante
            function ImprimirProgramas_postulante(dni){
                //alert("tu dni es " + $dni);
                document.querySelector('#bg1'+dni).style.background = 'rgba(35,43,71,.2)';
                let btn1 = document.querySelector("#programas_btn1");
                let btn2 = document.querySelector("#programas_btn2");
                let btn3 = document.querySelector("#programas_btn3");
                let btn4 = document.querySelector("#programas_btn4");
                let verPostulante = document.querySelector("#verPostulante");
                let txt_nomPost = document.querySelector("#nombre_post1");
                let msj_sweet = "";
                let peticion = 'CP';

                let dnix = `${dni}-K`;
                txt_nomPost.innerHTML = data_postulante[dnix].nombrecompleto;
                sweetModalMin("Cargando . . .",'top',800,'question');

                fetchKev('POST',{peticion, dni}, function(rs){
                    let x = rs[0];
                    //console.log(x);
                    //console.log(x.length);
                    //console.log(listProgramToArray(x.v_abiertas))
                    let numOBS = "..."; 
                    let prog_i_aviertos = ["RECORTES", "FACEBOOK", "WHATSAPP", "PÁGINAS MÁS", "CALCULATOR", "WINWORD", "SUPERVISIONUNAJMA4", "BLOC DE NOTAS", "PDF", "ANYDESK", "TEAMVIEWER"];
                    let listaVentanas = "";
                    if(rs.length != 0){
                        setTimeout(() => {
                            msj_sweet = "Listo " + dni;
                            sweetModalMin(msj_sweet,'top',1500,'success')
                            btn1.innerHTML = x.tp_enproceso; // Todas las ventanas abiertas
                            btn2.innerHTML = x.v_abiertas; // ventanas de programas remotos invalidas abiertas
                            btn3.innerHTML = x.pin_enproceso; // procesos ejecutandose en segundo plano de Programas invalidos
                            btn4.innerHTML = x.tp_instalados; // Lista Todos los Dsipositivos.

                            //FUNCIONES DE APOYO.
                            numOBS= "..."; //Reiniciando contador apoyo cada vez que se selecciona un postuilante.
                            listaVentanas = "";
                            prog_i_aviertos.forEach(elem => {
                                if(x.tp_enproceso.toUpperCase().indexOf(elem) >= 0){
                                    numOBS = "... 1";
                                    listaVentanas += elem +"<br>";
                                }
                            })
                            if(x.v_abiertas.length >= 7){
                                numOBS += " 2";
                            }
                            if(x.pin_enproceso.length >= 7){
                                numOBS += " 3";
                            }
                            if(x.tp_instalados.indexOf("VERIFICAR") >= 0){
                                numOBS += " 4";
                            }
                            verPostulante.innerHTML = numOBS;

                            //En el caso de que no detecte ventanas sospechas, se imprime mensaje por defecto.
                            if(listaVentanas.length == 0){
                                listaVentanas = "No encontré ventanas sospechosas!";
                            }
                            //ventanas sospechasas, mensaje modal
                            Swal.fire({
                                icon: 'info',
                                title: 'REVISANDO EN (1)',
                                html: 'POSTULANTE: '+  data_postulante[dnix].nombrecompleto + '<br><br>' + listaVentanas
                            })

                        }, 700);
                    }else{
                        setTimeout(() => {
                            msj_sweet = "Sin registros " + dni;
                            sweetModalMin(msj_sweet,'top',1500,'info')
                            btn1.innerHTML = "...";
                            btn2.innerHTML = "...";
                            btn3.innerHTML = "...";
                            btn4.innerHTML = "...";
                            verPostulante.innerHTML = "...";
                        }, 700);
                    }
                }, URL_AJAX);

            }

            //Convierte el resultado cadena de los porcesos, programas postulante, en un array. 
            function listProgramToArray(programListDB){
                
                return programListDB.split('<br>');
            }



        // EL DOCENTE REALIZA EL CAMBIO PARA VISUALIZARCAMBIOS!!
        //---------------------------------------------------------------------------
        let manejador_setInterval = false;
        // nivel 1
        // function handleVisibilityChange() {
        //     setTimeout(() => {
        //         console.log("ver ", manejador_setInterval);
        //         if(!manejador_setInterval){
        //             console.log('Handle');
        //             Obtener_postulantes_reg1();
        //         } 
        //     }, 1000);
        // }
        // document.addEventListener("visibilitychange", handleVisibilityChange, false);
        // nivel 2
        setInterval( checkPostulanteNav, 700);
        function checkPostulanteNav() {
            if(manejador){
                if ( document.hasFocus() ) {
                    if(manejador_setInterval){
                        console.log('SetInterval');
                        Obtener_postulantes_reg1();
                        manejador_setInterval = false;
                    }
                } else {
                    // console.log('SE SALIÓ DEL EXÁMEN')
                    manejador_setInterval = true;
                }
            }
            
        }


        //FETCH MODIFICADOS
        //-----------------------------
        /**
        * 
        * @param {String} meth Que puede ser 'POST' o 'GET'
        * @param {Object} jsonData Datos que se enviarán al servidor para que sena procesados
        * @param {Function} fnRquest Aquí se tratarán los datos devueltos del servidor
        */
        function fetchKev(meth, jsonData, fnRquest, urlProcess){
            let formData = new FormData();

            formData.append("data", JSON.stringify(jsonData));

            fetch(urlProcess,{
                method: meth,
                body: formData
            }).then( data => data.json())
            .then(data => {
                fnRquest(data);
            })
        }


        /**
         * 
         * 
         * script share------------------------------------------------------------
         * script share------------------------------------------------------------
         * script share------------------------------------------------------------
         */
        function sweetModalCargando(){
            Swal.fire({
                icon: 'question',
                title: `
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span> 
                `,
                text: 'Espere por favor!',
                confirmButtonText: 'Cargando...',
                showCloseButton: false,
                showCancelButton: false,
                showClass: {
                popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }


        /**
         * 
         * @param {*} mensaje 
         * @param {*} position 
         * @param {*} icon 
         * @param {*} timer 
         */
        function sweetModal(mensaje,position,icon,timer){
            Swal.fire({
                position,
                icon,
                title: `<small class='text-modal'>${mensaje}</small>`,
                showConfirmButton: false,
                backdrop: `
                    rgba(0,0,0,.4)
                `,
                timer
            })
        }



        /**
         * 
         * @param {*} mensaje 
         * @param {*} position 
         * @param {*} timer 
         * @param {*} icon 
         */
        function sweetModalMin(mensaje,position,timer,icon){
            const Toast = Swal.mixin({
                toast: true,
                position,
                showConfirmButton: false,
                timer,
                timerProgressBar: true,
                onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon,
                title: `<span class='my-3'>${mensaje}</span>`
            })
        }




    </script>

</body>
</html>