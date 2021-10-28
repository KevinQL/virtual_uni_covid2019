<?php
    /**
     * the code let to controller the access post-inscription for INSCRIPCION CEPRE
     * then put true for all when the inscription is availabel (true:true)
     * else put true : false;
     */
    $pase = (isset($_GET['mate2021']) || isset($_GET['other']) )? true : false;

    if($pase){
?>


<?php
	include('../funciones/admi_con.php');
	include('../funciones/admi_fun.php');
	$departamento = '03';
	$provincia = '02';
	$distrito = '01';

    $vsqlescuela = "select estructura, descripcion from mae_estructura where activo=1 order by descripcion";
	$vsqlmodalidadadmision = "select modalidadadmision, descripcion from adm_modalidadadmision where activo=1 order by descripcion";
	$vsqlsexo = "select sexo, descripcion from adm_sexo order by descripcion";
	$vsqltipocolegio = "select tipocolegio, descripcion from adm_tipocolegio order by descripcion";
	$vsqldepartamento="SELECT departamento,descripcion FROM mae_ubigeo WHERE provincia='00' AND distrito='00' order by 2";
	$vsqlprovincia="SELECT provincia,descripcion FROM mae_ubigeo WHERE departamento='$departamento' AND provincia<>'00' AND distrito='00' order by 2";
	$vsqldistrito="SELECT distrito,descripcion FROM mae_ubigeo WHERE departamento='$departamento' AND provincia='$provincia' AND distrito<>'00' order by 2";


	$pasa = 'Si';
	$estructura = '01';
	$tipocolegio = '01';
	$modalidad = '01';
	$sexo = 'M';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="gb18030">
    
    <title>UNIVERSIDAD NACIONAL JOSE MARIA ARGUEDAS</title>
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous">
    </script>

    <!-- CDN'S PARA ALERTASUNAJMA -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/1c90e8b317.js" crossorigin="anonymous"></script>

    <!-- hcatpcha API -->
    <script src="https://hcaptcha.com/1/api.js" async defer></script>

</head>

<body background="../images/fondo.jpg">

                    <table width="100%">
                    <tr>
                    <td align="center">
                    <img src="../images/logo.png" alt="Logo" width="100"/>
                    <strong>UNIVERSIDAD NACIONAL JOSÉ MARÍA ARGUEDAS</strong>
                    </td>
                    </tr>
                    </table>

<br>
<br>
   
<form action="pregrabar_mate.php" method="post" id="grado" name="frmFotoGrado" enctype="multipart/form-data" onsubmit="return true;" >
   <center><h3>INSCRIPCIÓN EXAMEN <u><strong>ORDINARIO</strong></u> ADMISIÓN UNAJMA</h3><h4 style="font-size:22px;">2021 - II</h4> </center> 
<table width="760" border="0" align="center" cellpadding="3" cellspacing="0" class="table-borderless">

	<tr>
    	<td width="32%">
        	<strong>
            DNI
            </strong>        
        </td>
        <td>
        	<input type="text" name="txtDni"  data-type="number" id="txtDni" class="form-control validar" autocomplete="off" autocapitalize="words" value="" maxlength="8"  placeholder="Ingresar dni" aria-describedby="txtnombre-message">
        </td>    
    </tr>

	<tr>
    	<td>
        	<strong>
            Apellido Paterno:
            </strong>        
        </td>
        <td>
        	<!--  data-type="texto"  -->
        	<input type="text" name="txtApellidoPaterno" id="txtApellidoPaterno"  class="form-control validar" autocomplete="off" autocapitalize="words"  value="" maxlength="30"  placeholder="Ingresar apellido paterno" aria-describedby="txtnombre-message">
        </td>    
    </tr>  
	<tr>
    	<td>
        	<strong>
            Apellido Materno:
            </strong>        
        </td>
        <td>
        	<!--  data-type="texto"  -->
        	<input type="text" name="txtApellidoMaterno" id="txtApellidoMaterno"  class="form-control validar" autocomplete="off" autocapitalize="words"  value="" maxlength="30"  placeholder="Ingresar apellido materno" aria-describedby="txtnombre-message">
        </td>    
    </tr> 
    <tr>
    	<td>
        	<strong>
            Nombres:
            </strong>        
        </td>
        <td>
        	<!--  data-type="texto"  -->
        	<input type="text" name="txtNombres" id="txtNombres" class="form-control validar" autocomplete="off" autocapitalize="words"  value="" maxlength="30"  placeholder="Ingresar nombres" aria-describedby="txtnombre-message">
        </td>    
    </tr>

    <!-- <tr>
    	<td>
        	<strong>
            Modalidad admisi&oacute;n:
            </strong>        
        </td>
        <td>
        	<?php MostrarComboZet("cboModalidad",$vsqlmodalidadadmision,$modalidad,$pasa); ?>
        </td>    
    </tr>   -->

    <tr>
    	<td>
        	<strong>
            Grado estudiante
            </strong> 
        </td>
        <td>
        	<?php MostrarComboZet("cboEstructura",$vsqlescuela,$estructura,$pasa); ?>
            <!-- <select name="cboEstructura" id="cboEstructura">
                <option value="02">CONTABILIDAD</option>
                <option value="03">EDUCACION PRIMARIA INTERCULTURAL</option>
                <option value="06">INGENIERIA DE SISTEMAS</option>
                <option value="01" selected="">ADMINISTRACION DE EMPRESAS</option>
                <option value="04">INGENIERIA AGROINDUSTRIAL</option>
                <option value="05">INGENIERIA AMBIENTAL</option>
            </select> -->
        </td>    
    </tr> 
    <tr>
    	<td>
        	<strong>
            Sexo:
            </strong>        
        </td>
        <td>
        	<?php MostrarComboZet("cboSexo",$vsqlsexo,$sexo,$pasa); ?>
        </td>    
    </tr>
    <tr>
    	<td>
        	<strong>
            Fecha Nacimiento:
            </strong>        
        </td>
        <td>
        	<input type="hidden" name="txtFechaNacimiento" data-type="date" id="txtFechaNacimiento" class="form-control" autocomplete="off" autocapitalize="words"  value="" maxlength="50"  placeholder="Ingresar fecha"
            aria-describedby="txtnombre-message">
        </td>    
    </tr>

    <tr>
    	<td>
        	<strong>
            Email:
            </strong>        
        </td>
        <td>
        	<input type="email" name="txtEmail" id="txtEmail" data-type="email" class="form-control validar" autocomplete="off" autocapitalize="words"  value="" maxlength="50"  placeholder="Ingresar email"
            onkeyup="agregarCorreoIndicacionesFooter(this);" 
            aria-describedby="txtnombre-message">
        </td>    
    </tr>
    <tr>
    	<td>
        	<strong>
            Celular:
            </strong>        
        </td>
        <td>
        	<input type="text" name="txtCelular" data-type="number" id="txtCelular" class="form-control validar" autocomplete="off" autocapitalize="words"  value="" maxlength="12"  placeholder="Ingresar celular" aria-describedby="txtnombre-message">
        </td>    
    </tr>

	<tr>
		<td align="left">
        	<strong>Departamento:</strong>
        </td>
		<td>
			<?php MostrarCombo2("cboDepartamento",$vsqldepartamento,$departamento)?>
        </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Provincia:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboProvincia",$vsqlprovincia,$provincia); ?>
             </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Distrito:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboDistrito",$vsqldistrito,$distrito); ?>
            </td>
	</tr>  

	<tr>
    	<td>
        	<strong>
            Direcci&oacute;n actual:
            </strong>        
        </td>
        <td>
        	<!--  data-type="texto"  -->
        	<input type="hidden" name="txtDireccion" id="txtDireccion" class="form-control" autocomplete="off" autocapitalize="words"  value="" maxlength="30"  placeholder="Ingresar direccion" aria-describedby="txtnombre-message">
        </td>    
    </tr> 


    <tr>
    	<td>
        	<strong>
            Nombre y apellidos del apoderado:
            </strong>        
        </td>
        <td>
        	<!-- data-type="texto" -->
        	<input type="text" name="txtApoderado" id="txtApoderado" class="form-control validar" autocomplete="off" autocapitalize="words"  value="" maxlength="30"  placeholder="Puedes ser tú mismo, solo en el caso de que seas mayor de edad" aria-describedby="txtnombre-message">
        </td>    
    </tr>  
    <tr>
    	<td>
        	<strong>
            Tipo Colegio:
            </strong>        
        </td>
        <td>
        	<?php MostrarComboZet("cboTipoColegio",$vsqltipocolegio,$tipocolegio,$pasa); ?>
        </td>    
    </tr>

	<tr>
		<td align="left">
        	<strong>Departamento Colegio:</strong>
        </td>
		<td>
			<?php MostrarCombo2("cboDepartamentoColegio",$vsqldepartamento,$departamento)?>
        </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Provincia Colegio:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboProvinciaColegio",$vsqlprovincia,$provincia); ?>
             </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Distrito Colegio:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboDistritoColegio",$vsqldistrito,$distrito); ?>
            </td>
	</tr> 
    <tr>
    	<td>
        	<strong>
            Nombre colegio:
            </strong>        
        </td>
        <td>
        	<input type="text" name="txtColegio" id="txtColegio" class="form-control validar" autocomplete="off" autocapitalize="words"  value="" maxlength="30"  placeholder="Ingresar nombre colegio" aria-describedby="txtnombre-message">
        </td>    
    </tr>  
    <tr>
    	<td>
        	<strong>
            A&ntilde;o que culmino colegio:
            </strong>        
        </td>
        <td>
        	<input type="hidden" name="txtAnioEgreso" id="txtAnioEgreso" data-type="number" class="form-control" autocomplete="off" autocapitalize="words"  value="" maxlength="4"  placeholder="2018" aria-describedby="txtnombre-message">
        </td>    
    </tr>     
	<tr>
		<td align="left">
        	<strong>Departamento Procedencia:</strong>
        </td>
		<td>
			<?php MostrarCombo2("cboDepartamentoProcedencia",$vsqldepartamento,$departamento)?>
        </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Provincia Procedencia:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboProvinciaProcedencia",$vsqlprovincia,$provincia); ?>
             </td>
	</tr>
	<tr>
			<td align="left">
            	<strong>Distrito Procedencia:</strong>
            </td>
			<td>
				<?php MostrarCombo2("cboDistritoProcedencia",$vsqldistrito,$distrito); ?>
            </td>
    </tr>      
    
    <tr>
    	<td>
        	<strong>
            Foto Voucher: 
            </strong>        
            <br>
            <small>(Pago de inscripcion en el banco de la nación)</small>
        </td>
        <td>     
        	<input type='file' accept='image/*' id="imgInp" name="imgInp" class="form-control " autocomplete="off" autocapitalize="words"  value=""  placeholder="Seleccione foto voucher" aria-describedby="imgInp-message" style=" border-radius: 0;
    -webkit-box-shadow: none!important;
    box-shadow: none!important;
    color: #ffffff;
    background-color: #337ab7;
    border: 1px solid #ffffff;
">
			<img id="blah" src="https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg" alt="Tu imagen" width="150" height="150px" />
        </td>    
    </tr>

    <tr>
    	<td>
        	<strong>
            Foto Rostro Postulante:
            </strong>        
        </td>
        <td>     
        	<input type='file' accept='image/*' id="imgEst" name="imgEst" class="form-control " autocomplete="off" autocapitalize="words"  value=""  placeholder="Seleccione foto estudiante" aria-describedby="imgInp-message" style=" border-radius: 0;
    -webkit-box-shadow: none!important;
    box-shadow: none!important;
    color: #ffffff;
    background-color: #337ab7;
    border: 1px solid #ffffff;
">
			<img id="blah1" src="https://i.ibb.co/Tm3hb97/image.png" alt="Tu imagen" width="150px" height="150px" style=""/>
        </td>    
    </tr>
    <tr>
    	<td>
        	<strong>
            Foto Dni o Ficha Reniec:
            </strong>        
        </td>
        <td>     
        	<input type='file' accept='image/*' id="imgDni" name="imgDni" class="form-control " autocomplete="off" autocapitalize="words"  value=""  placeholder="Seleccione foto dni" aria-describedby="imgDni-message" style=" border-radius: 0;
    -webkit-box-shadow: none!important;
    box-shadow: none!important;
    color: #ffffff;
    background-color: #337ab7;
    border: 1px solid #ffffff;
">
			<img id="blah2" src="https://i.ibb.co/ZKVB8xZ/image.png" alt="Tu imagen" width="150px" height="150px" style=""/>
        </td>    
    </tr>

    <tr>
        <br>
        <br>
        <td align="center" colspan="2" class="pt-5">
            <h5>
                COMPRUEBE QUE ES HUMANO <small>(click al cuadro y resuelva el reto)</small>
            </h5>
            <!-- Elemento hCaptcha -->
            <div class="pt-2 text-center">
                <div class="h-captcha" data-sitekey="90541f3b-4b55-40ad-a480-1e07bf94bfdb">
                </div>
            </div>
            <!--  -->
        </td>
    </tr>

    <tr>
        <td align="left" colspan="2">
            <br>
            <strong>Recuerda</strong> completar la segunda etapa de tu inscripción ingresando al <a href="https://examen.admisionunajma.pe/zetadmision/zet/index.php" target="_blank" rel="noopener noreferrer">SISTEMA VIRTUAL DE ADMISIÓN</a>, Pero antes tener en cuenta lo siguiente: 
            <ul>
                <li>
                    Debes esperar en tu correo electrónico <b><span class="correo-postulante text-success bold"></span></b> las indicaciones para la segunda etapa de tu inscripción. 
                </li>
                <li>
                    Si los datos del formulario son correctos, te estaremos enviando además de las indicaciones, tu <b>credencial</b> (usuario y contrasena) para que puedas completar tu inscripción en el sistema virtual de <b>admision</b>. 
                </li>
                <li>
                    NO OLVIDES PRESIONAR EL BOTON  DE <strong>AQUÍ ABAJO</strong> PARA COMPLETAR TU REGISTRO DE PREINSCRIPCIÓN <small>(primera etapa)</small>
                </li>
            </ul>            
        </td>
    </tr>   

	<tr>
    	<td colspan="2" align="center">        	
            <button type="button" class="submit btn-u-registro" style="background-color: #337ab7; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">
					<span class="bigger-110">Registrarse <i class="fa fa-forward"></i></span>
					<!--<i class="ace-icon fa fa-arrow-right icon-on-right"></i>-->
			</button>
            <br>
        </td>    
    </tr>  
</table>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
<script>

    function mensaje_post_submit(txt_titulo, txt_text, txt_icon, txt_btn, txt_footer){
        Swal.fire({
                title: txt_titulo,
                text: txt_text,
                icon: txt_icon,
                confirmButtonText: txt_btn,
                footer: `<a href="#">${txt_footer}</a>`
        })
    }


  setTimeout(() => {

        Swal.fire({
        title: '<strong>RECOMENDACIONES POSTULANTE <u>ORDINARIO</u></strong>',
        icon: 'info',
        html: `
        Estimado postulante al proceso de admisión <b>ORDINARIO 2021-2</b> <br>
        <ul class="text-justify">
            <li>
                Se recomienda usar una <b>pc de escritorio</b> para realizar su inscripción. 
            </li>
            <li>
                Tener en cuanta el video tutorial de inscripción: <a href="https://www.youtube.com/watch?v=N7yxUvfPAL4&feature=youtu.be&ab_channel=Lenynflores" target="_blank">video</a>
            </li>
            <li>
                Recuerde realizar el pago antes de su pre-inscripción. <a href="https://examen.admisionunajma.pe/pagina_ordinario.php" target="_blank">ver costos de inscripción x modalidad</a> 
            </li>
            <li>
                Revise bien <b>su correo electrónico</b>: Si el correo está mal o no existe, nunca le llegará las indicaciones para que pueda continuar con la segunda etapa de su inscripción.</li>
            <li>
                Revise bien <b>su número de celular</b>, para que nos contactemos con usted en el caso de que sea necesario.
            </li>
            <li>
                Seleccione bien su carrera, después no tendrá oportunidad para cambiarlo.
            </li>
            <li>
                Recorte las fotografias (voucher, rostro, dni) a un tamano visible y que enfoque solo el contenido. Puede utilizar diferentes herramientas para editar la foto, o usar el mismo WhatsApp para recortar la imagen. Comprima sus fotos para que pesen <b>menos de 2MB</b> cada uno; WhatsApp también comprime la foto cuando lo envia (es una funcion que actua por defecto).
            </li>
            <li>
                Recuerde que usted es el único responsable para la culminación satisfactoria de su inscripción. Atengase a las consecuencias en el caso de que no llegue a cumplir las indicaciones correspondientes. Puede revizar aquí el reglamento admisión: <a href="https://examen.admisionunajma.pe/pagina_reglamento.php" target="_blank">REGLAMENTO ADMISION 2021-2</a>
            </li>
        </ul>
        <br>
        <br>
        Admision 2021-2
        `,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> OK!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText:
            '<i class="fa fa-thumbs-down"></i> BEE!',
        cancelButtonAriaLabel: 'Thumbs down'
        })
    }, 1500);




    /**
    * Funcion que agrega el correo electrónico en el footer cuando se presiona en el input de correo elextrónico
    *
    */
    function agregarCorreoIndicacionesFooter(element){
        // alert(element)
        let correoPostulante = document.querySelector(".correo-postulante");
        //xtEmail
        correoPostulante.innerText = element.value;
    }






//cod Z -------------------------
    function crearselectubigeo(id,data) {
        $("#" + id).html('');
        $("#" + id).html('<option value=\"\">SELECCIONAR..</option>');
        $.each(data, function(k,v){
            $("#"+id).append("<option value=\""+k+"\">"+v+"</option>");
        })
        $("#"+id).each(function() {
            // Obtencion del elemento seleccionado
            var valorSeleccionado = $(this).val();

            // Aplicacion del orden alfabetico
            $(this).html($("option", $(this)).sort(function(a, b) {
                return a.text == b.text ? 0 : a.text < b.text ? -1 : 1
            }));

            // Reestablecimiento de la opci��n seleccionada previamente
            $(this).val('');
        });
    }
    function cargarubigeo(id,de,pr,di,nombre) {
        param={dep:de,prov:pr,dist:di,nombre:nombre};
        $.ajax({
            url: '../zet/ubigeo.php',
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            data: param, // our data object
            contentType: "application/x-www-form-urlencoded",
            dataType: 'json', // what type of data do we expect back from the server
            encode: true,
            cache: false
        }).done(function (data) {
            crearselectubigeo(id,data)

        });
    }
    $('#cboDepartamento').change(
       function () {
           cargarubigeo('cboProvincia',this.value,'00','00','provincia')
           crearselect('cboDistrito',{})
       }
    )
    $('#cboProvincia').change(
        function () {
            cargarubigeo('cboDistrito',$('#cboDepartamento').val(),this.value,'00','distrito')
        }
    )
 	$('#cboDepartamentoColegio').change(
       function () {
           cargarubigeo('cboProvinciaColegio',this.value,'00','00','provincia')
           crearselect('cboDistritoColegio',{})
       }
    )
    $('#cboProvinciaColegio').change(
        function () {
            cargarubigeo('cboDistritoColegio',$('#cboDepartamentoColegio').val(),this.value,'00','distrito')
        }
    )	
	
	
    $('#cboDepartamentoProcedencia').change(
        function () {
            cargarubigeo('cboProvinciaProcedencia',this.value,'00','00','provincia')
            crearselect('cboDistrito',{})
        }
    )
    $('#cboProvinciaProcedencia').change(
        function () {
            cargarubigeo('cboDistritoProcedencia',$('#cboDepartamentoProcedencia').val(),this.value,'00','distrito')
        }
    )
</script>
<script>
$('button.submit').off('click').on('click',function () {
                $('b.error').remove();
                var estado=true;
                $( ".validar" ).each(function( index ) {
                    var attr=$(this).attr('aria-describedby');
                    var valor=$(this).val()
                    //alert(valor)
                    console.log($(this).data('type'));
                    if($(this).data('type')!=undefined) {
                        //alert($(this).data('type')+'<=>'+this.id+'<=>'+valor)
                        if (valor == '' || valor=='NULL') {
                        //    if($(this).data('type')=='number'){alert('NO');console.log(this)}
                            estado=false;
                            $(this).addClass('is-invalid');
                            $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Requerido</b>");
                        }else{
                            $(this).removeClass('is-invalid');
                        
                            //  alert($(this).data('type'))
                            switch ($(this).data('type')) {
                                case 'texto':
                                    if(!(/^[\u00F1ÑA-Zña-z _]*[\u00F1ÑA-Zña-z][\u00F1ÑA-Zña-z _]*$/.test(valor))){
                                        estado=false;
                                        $(this).addClass('is-invalid');
                                        $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Formato de texto incorrecto</b>");
                                    }
                                    break;
                                case 'email':
                                    // console.log($(this))
                                    // alert((/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(valor)))
                                    if(!(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(valor))){
                                        //  alert('SI')
                                        estado=false;
                                        $(this).addClass('is-invalid');
                                        $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Formato de correo incorrecto</b>");
                                    }
                                    break;
                                case 'url':
                                    if(!(/^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[\/?#]\S*)?$/i.test(valor))){
                                        estado=false;
                                        $(this).addClass('is-invalid');
                                        $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Formato de URL incorrecto</b>");
                                    }
                                    break;
                                case 'date':
                                    /*!/Invalid|NaN/.test(new Date(valor).toString()) || */
                                    console.log(valor);
                                    /*!(/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/i.test(valor)) || */
                                    if(!(/^\d{4}(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1])$/i.test(valor))){
                                        estado=false;
                                        $(this).addClass('is-invalid');
                                        $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Formato de Fecha incorrecto</b>");
                                    }
                                    break
                                case 'dateISO':
                                    if(!(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(valor))){
                                        estado=false;
                                        $(this).addClass('is-invalid');
                                        $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Formato de fecha incorrecto</b>");
                                    }
                                    break;
                                case 'number':
                                // alert((/^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(valor)))
                                    if(!(/^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(valor)) || valor==''){
                                        estado=false;
                                        $(this).addClass('is-invalid');
                                        $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Formato de numerico incorrecto</b>");
                                    }
                                    break;
                                case 'digits':
                                    if(!( /^\d+$/.test(valor))){
                                        estado=false;
                                        $(this).addClass('is-invalid');
                                        $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Formato de numero incorrecto</b>");
                                    }
                                    break;
                            }

                        }
                        if($(this).data('minlength')!==undefined) {
                            var r = t.isArray(e) ? e.length : this.getLength(e, n);
                            return this.optional(n) || r >= i
                        }
                        if($(this).data('maxlength')!==undefined) {
                            var r = t.isArray(e) ? e.length : this.getLength(e, n);
                            return this.optional(n) || r <= i
                        }
                        if($(this).data('rangelength')!==undefined) {
                            var r = t.isArray(e) ? e.length : this.getLength(e, n);
                            return this.optional(n) || r >= i[0] && r <= i[1]
                        }
                        if($(this).data('min')!==undefined) {
                            return this.optional(e) || t >= n
                        }
                        if($(this).data('max')!==undefined) {
                            return this.optional(e) || t <= n
                        }
                        if($(this).data('range')!==undefined) {
                            return this.optional(e) || t >= n[0] && t <= n[1]
                        }
                        if(estado){
                            $(this).addClass('is-valid');
                        }
                    }else{
                        //console.log(valor)
                        if (valor == '' || valor===null) {
                            estado=false;
                            $(this).addClass('is-invalid');
                            $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Requerido</b>");
                        }else{
                            $(this).removeClass('is-invalid');
                        }
                        if(estado){
                            $(this).addClass('is-valid');
                        }
                    }
                });

				if(estado){

					$('form').submit();

                    mensaje_post_submit('Espere un momento por favor!', 
                            'Estamos comprobando sus datos registrados en el formulario',
                            'info',
                            `
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Loading...</span> 
                            <br><br>
                            Si esto tarda, probablemente tenga que corregir algún dato en el formulario
                            `,
                            'Se está registrando su inscripción...');
                    
				}else{
                    mensaje_post_submit('Ops!', 
                            'Por favor corrija los datos ingresados en el formulario.',
                            'warning',
                            `Corregir datos`,
                            'No se está registrando su inscripción...');
                }
})


function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function () {
    // C贸digo a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
  
 function readImage1 (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah1').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgEst").change(function () {
    // C贸digo a ejecutar cuando se detecta un cambio de archivO
    readImage1(this);
  });
  
  function readImage2 (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah2').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgDni").change(function () {
    // C贸digo a ejecutar cuando se detecta un cambio de archivO
    readImage2(this);
  });

</script>





<?php
        
    }else {
        # code...

?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="icon" href="public/img/logo_u.ico">
    <title>ADMISIÓN UNAJMA</title>

    <style>

        .seccion-contenedor{
            height: 100vh;

            display:flex;
            justify-content: center;
            align-items: center;
            flex-wrap:wrap;

        }

        .seccion-contenedor div{
          display: block;
          width: 100%;          
          text-align: center;
        }
    </style>

  </head>
  <body>
    

    <div class="seccion-contenedor">        
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <!-- <h5 class="card-title text-danger">EN ESTOS MOMENTOS NO PODEMOS ATENDERLE</h5> -->
                <h5 class="card-title text-danger">INSCRIPCIONES UNAJMA </br> 2021 </h5>
                <p class="card-text">Las inscripciones para el examen de ORDINARIO - 2021-1 </br> <b>FINALIZARÓN</b> </p>
                <a href="https://examen.admisionunajma.pe/index.php" class="btn btn-warning">Ir a la página principal</a>
            </div>
        </div>
        <div>
          <img src="logo_u.png" alt="">
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>















<?php
        
    }

?>
