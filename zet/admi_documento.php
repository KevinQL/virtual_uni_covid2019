<?php 
	include_once(GL_DIR_FS_APP.'funciones/admi_fun_admision.php');
	$codigo = $proceso.$usuario;
	$sub = mostrarfoto_voucher_existe($codigo);
	
	$file = "foto_documento/".$codigo.".pdf";
					#echo $file;
	if (file_exists($file))
		{
		#echo 'hola';
			$muestra = 1;
		
		}
	else
		{
			$muestra = 0;
			#echo '<img src="../imageneszet/actawb.gif" border="0">';	
		}
?>		
<?php
	if ($muestra==1)
		{
			echo '<div class="alert alert-warning">';
				echo '<span class="semi-bold" style="font-size:16px;">Usted subio el PDF</span>';
				echo '<br>';
				echo '<a href="javascript:ventanaSecundaria(\'../zet/admi_mostrar_archivo.php?file='.$file.'\')">';
					echo 'Ver PDF';
					echo '</a>';
			echo '</div>';	
		}
	echo '<div class="alert alert-info">';
			echo '<span class="semi-bold" style="font-size:16px;">Suba los documentos requeridos para su inscripci&oacute;n en formato PDF.</span>';
	echo '</div>';
?>
<table>
    <tr>
        <td>
        	<form action="../zet/admi_documento_grabar.php"  class="form-group col-lg-12" method="post" id="frmFotoPostulante" name="frmFotoPostulante" enctype="multipart/form-data">
                <input type="hidden" name="d" value="<?php echo $_REQUEST['d'] ?>" />
                <input type="hidden" name="nav" value="<?php echo $nav?>" />
                <input name="action" type="hidden" value="upload" />
                <header class="dark col-lg-12 fa-hover">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <i class="fa fa-leaf"></i>
                            Recomendación:
                        </h3>
                        <b>
                            SI TU DOCUMENTO PDF NO SE SUBE CORRECTAMENTE. 
                            <a href="https://www.ilovepdf.com/es/comprimir_pdf" target="_blank" class="text-danger small" style="color:#e74c3c; font-size: 16px;text-decoration: underline;">
                            > Comprima su documento PDF aquí (CLICK AQUÍ) < </a>
                        </b>
                        <br>
                        <br>
                        <h3 class="panel-title"> <i class="fa fa-leaf"></i>
                            Subir PDF:
                        </h3>
                    </div>
                </header>
                <div class="form-group col-lg-12"></div>
                <!--<div class="row-fluid col-lg-12" style="background:none">-->
                    <div class="form-group col-lg-12">                        
                        <!-- <br> -->
                        <input type="hidden" name="codigo" value="<?php echo $codigo?>" />
                        <input type="file" 
                            name="archivo" id="archivo"
                            class="form-control" 
                            accept=".pdf"
                            
                        >
                        <br>
                        <button type="submit" class="btn btn-success"><i class="icon-white icon-upload"></i>Subir Archivo</button>
                    </div>
                <br>
                    <div class="form-group col-lg-12" id="dvArchivo">
                        
                        <div class="row-fluid col-lg-12 animation" style="background:none">
                            <div class=" col-lg-7" id="dvloading font-animation" style="display:none">
                                <i class="fa fa-spinner faa-spin animated"></i>
                                Subiendo archivo <span class="label label-warning" id="dvporcentaje">0%</span>
                            </div>
                            <div id="dvstatus" class="col-lg-5" style="font-size: 20px;"></div>
                        </div>
                        <img src="" id="imgArchivo">
                    </div>
                <!--</div>-->
            </form>
        </td>
    </tr>
</table>
<script src="<?php echo GL_DIR_WS_HTTP_APP?>plugins/uniform/js/jquery.uniform.bundled.js"></script>
<script src="<?php echo GL_DIR_WS_HTTP_APP?>plugins/jquery.form.js"></script>
<script type="text/javascript">
    $('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href','../plugins/uniform/css/aristo.css') );
    function archivo(evt) {

        var files = evt.target.files; // FileList object

        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            reader.onload = (function(theFile) {

                return function(e) {
                    document.getElementById("imgArchivo").src = e.target.result
                };
            })(f);
            console.log(reader.readAsDataURL(f));
        }
    }

    document.getElementById('archivo').addEventListener('change', archivo, false);

    (function() {
        var bar = $('.bar');
        $("input[type='file']").uniform();
        var percent = $('#dvporcentaje');
        var status = $('#dvstatus');
        $('#frmFotoPostulante').ajaxForm({
            beforeSend: function() {
                status.empty();
                if($('#archivo').val()==''){
                    alert('Nesesita seleccionar un archivo');
                    return false;
                }
                //$('#progresssubir').show();
                var percentVal = '0%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal)
                percent.html(percentVal);
                $('#dvloading').show();
                console.log(percentVal, position, total);
            },
            success: function() {
                var percentVal = '100%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
                $('#dvloading').hide();
            }
        });


    })();

    $('#uniform-archivo').css('width','72%');
</script>