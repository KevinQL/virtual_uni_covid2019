<?php 
	require_once("zet_seg.php");
	include_once(GL_DIR_FS_APP.'funciones/admi_fun_admision.php');
	#mostrarfoto_voucher($usuario);
	#echo $proceso;
	#echo $proceso;
	#echo '<br>';
	#echo $persona;
	#echo '<br>';
	#echo $usuario;
	$codigo = $proceso.$usuario;
	$sub = mostrarfoto_voucher_existe($codigo);
	$sub=1; //ccambiado a OCA
	#$sub = 0;
	#echo $sub;
	#echo $codigo;
?>
<style>
.invalid-feedback{display:none;width:100%;margin-top:.25rem;font-size:120%;color:#dc3545}.invalid-tooltip{position:absolute;top:100%;z-index:5;display:none;max-width:100%;padding:.25rem .5rem;margin-top:.1rem;font-size:11px;line-height:1.5;color:#fff;background-color:rgba(220,53,69,.9);border-radius:.25rem}.is-invalid~.invalid-feedback,.is-invalid~.invalid-tooltip,.was-validated :invalid~.invalid-feedback,.was-validated :invalid~.invalid-tooltip{display:block}
</style>
<form  name="form" method="post" id="frmcronmod" action="admi_foto_grabar.php?d=<?php echo $_GET['d']?>&nav=<?php echo $_GET['nav']?>" enctype="multipart/form-data" >
<?php
	#if ($sub==0)
	#	{
			
		#}
	#else
	#	{
	if ($sub==1)
		{
			echo '<table width="100%">';
					echo '<tr>';
						echo '<td width="20%">';
							echo '&nbsp;';
						echo '</td>';
						echo '<td align="center">';
							echo '<div class="alert alert-info">';
							echo '<span class="semi-bold" style="font-size:16px;">USTED SUBI&Oacute; LAS SIGUIENTES IMAGENES</span>';
							echo '</div>';
						echo '</td>';
						echo '<td width="20%">';
							echo '&nbsp;';
						echo '</td>';							
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
							echo '<strong>';
							echo 'Foto voucher:';
							echo '</strong>';
						echo '</td>';
						echo '<td align="center">';
							#echo $usuario;
							mostrarfoto_voucher($codigo);
						echo '</td>';
						echo '<td>';
							echo '&nbsp;';
						echo '</td>';							
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
							echo '<strong>';
							echo 'Foto firma Postulante:';
							echo '</strong>';
						echo '</td>';
						echo '<td align="center">';
							#echo $usuario;
							mostrarfoto_ing_firma($usuario);
						echo '</td>';
						echo '<td>';
							echo '&nbsp;';
						echo '</td>';							
					echo '</tr>';					
				echo '</table>';
		}
	#	}
	
			echo '<table width="100%">';
					echo '<tr>';
						echo '<td width="20%">';
							echo '&nbsp;';
						echo '</td>';
						echo '<td align="center">';
							echo '<div class="alert alert-info">';
							echo '<span style="font-size:16px;font-weight:bold;">SUBIR LOS SIGUIENTES DOCUMENTOS (.jpg) </span>';
							echo '</div>';
						echo '</td>';
						echo '<td width="20%">';
							echo '&nbsp;';
						echo '</td>';							
					echo '</tr>';					
				echo '</table>';	
				echo '<table width="100%">';	
						echo '<tr style="display:;">';
							echo '<td width="15%" colspan="3" align="center">';
								echo '<strong>';
								echo '1.- SUBIR FOTO DE LA FIRMA DEL APODERADO';
								echo '</strong>';
							echo '</td>';
						echo '</tr>';

						echo '<tr style="display:;">';
							echo '<td width="15%">';
								echo '<strong>';
								echo '1. Foto Firma del Apoderado:';
								echo '</strong>';        
							echo '</td>';
							echo '<td>';     
									echo '<input type="file" id="imgInp" name="imgInp" accept="image/*" class="form-control validar" autocomplete="off" autocapitalize="words"  value=""  placeholder="Seleccione foto voucher" aria-describedby="imgInp-message" style=" border-radius: 0;
				-webkit-box-shadow: none!important;
				box-shadow: none!important;
				color: #ffffff;
				background-color: #337ab7;
				border: 1px solid #ffffff;">';
									echo '<img id="blah" src="https://i.ibb.co/wNJyBpV/firma-ejmplo-apoderado.jpg" alt="Tu imagen" width="150" height="150px" />';
							echo '</td>';  
						echo '</tr>'; 

						echo '<tr>';
							echo '<td width="15%" colspan="2" align="center">';
								echo '<strong>';
								echo '2.- SUBIR FOTO DE LA FIRMA DEL POSTULANTE';
								echo '</strong>';
							echo '</td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td width="15%">';
								echo '<strong>';
								echo '2. Foto firma del postulante:';
								echo '</strong>';        
							echo '</td>';
							echo '<td>';     
									echo '<input type="file" id="imgEst" name="imgEst" accept="image/*" class="form-control validar" autocomplete="off" autocapitalize="words"  value=""  placeholder="Seleccione foto voucher" aria-describedby="imgInp-message" style=" border-radius: 0;
				-webkit-box-shadow: none!important;
				box-shadow: none!important;
				color: #ffffff;
				background-color: #337ab7;
				border: 1px solid #ffffff;">';
									echo '<img id="blah1" src="https://i.ibb.co/R6ZQGyL/firma-ejemplo-postulante.jpg" alt="Tu imagen" width="150" height="150px" />';
							echo '</td>';  
						echo '<tr>'; 
					  
						
						echo '<tr>';
    						echo '<td colspan="2" align="center">';
        					echo '<br>';
							echo '<input name="dni" type="hidden" value="'.$usuario.'">';
							echo '<input name="per" type="hidden" value="'.$persona.'">';
							echo '<input name="proceso" type="hidden" value="'.$proceso.'">';
           					echo '<button type="button" class="submit" style="background-color: #337ab7; 
							  border: none;
							  color: white;
							  padding: 15px 32px;
							  text-align: center;
							  text-decoration: none;
							  display: inline-block;
							  font-size: 16px;">';
							echo '<span class="bigger-110">Subir fotos <i class="fa fa-forward"></i></span>';
							echo '</button>';
            				echo '<br>';
        					echo '</td>';    
    					echo '</tr>';
				echo '</table>';
	?>
    
</form>
<script>
$('button.submit').off('click').on('click',function () {
                $('b.error').remove();
                var estado=true;
                $( ".validar" ).each(function( index ) {
                    var attr=$(this).attr('aria-describedby');
                    var valor=$(this).val()
                    //alert(valor)

                    if($(this).data('type')!=undefined) {
                        alert($(this).data('type')+'<=>'+this.id+'<=>'+valor)
                        if (valor == '' || valor=='NULL') {
                            if($(this).data('type')=='number'){alert('NO');console.log(this)}
                            estado=false;
                            $(this).addClass('is-invalid');
                            $(this).after("<b id='" + attr + "' class='error invalid-feedback'>Requerido</b>");
                        }else{
                            $(this).removeClass('is-invalid');
                        }
                        // alert($(this).data('type'))
                        switch ($(this).data('type')) {
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
                                if(!/Invalid|NaN/.test(new Date(valor).toString())){
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
                                alert((/^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(valor)))
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
