<?php
	#phpinfo(); 
	#echo GL_HTTP_SERVER;
	#echo 'hola';
	session_start();
	session_unset();
	session_destroy();
	if (isset($_GET['mensaje']))
		{
			$mensaje = $_GET['mensaje'];	
			$pasa=1;	
		}
	else
		{
			$mensaje = '';
			$pasa=0;
		}	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>UNIVERSIDAD NACIONAL AUTONOMA DE TAYACAJA</title>
        <link rel="icon" href="../unat.ico">

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout light-login">
    	<div id="navbar" class="navbar navbar-default">
        	<div class="navbar-header pull-left">
             	<a href="index.php" class="navbar-brand">
                <small>
                	   <!--<i class="fa fa-leaf"></i>-->
                       <img src="../imageneszet/unat.png" alt="Logo" width="40"/>
                       Formulario de Pre-Inscripci&oacute;n
                </small>
                </a>
            </div>
        </div>
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
                                    
                                    
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container --> 
	</body>
</html>
