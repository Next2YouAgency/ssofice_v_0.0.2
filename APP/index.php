<?php
	require_once 'appCnf/config.php';
	ob_start();
	session_start();
	if(isset($_SESSION['authUser'])){
	include_once 'appCnf/config.php';
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Hugo Christian">
		<meta name="url" content="<?php echo URL;?>">
		<meta name="language" content="pt-br">
		<meta name="robots" content="NOFOLLOW, NOINDEX">
		<title>SS Office</title>
		<!--CORE CSS BOOSTRAP-->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Suporte do Bootstrap e elementos HTML5 para Navegador IE8 ou inferior -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!--Core jQuery-->
		<script src="js/jquery.min.js"></script>
		<!--Core JS do Bootstrap-->
		<script src="js/bootstrap.min.js"></script>
		<!--RECURSOS EM AJAX-->
		<script src="js/ajax_load/processos/ajax_load_processos.js"></script>
		<script src="js/ajax_load/pessoas/ajax_load_pessoas.js"></script>
		<script src="js/ajax_load/adv/ajax_load_advogados.js"></script>
		<script src="includes/users/js/switch_pessoal.js"></script>
		<script src="includes/users/js/switch_pessoal_parts.js"></script>
		<!--CORE JQUERY USER INTERFACE-->
		<script src="../js/jquery-ui/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css">
		<link rel="stylesheet" href="../js/jquery-ui/jquery-ui.theme.min.css">
		<link rel="stylesheet" href="css/style.css">
		<?php include_once '../parts/classesBS.php';?>
	</head>
	<body>
		
		
		<header class="container-fluid" id="topo">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 push-left">
				<img id="logotipo" src="img/menu/despesas.png" class="img-responsive">
			</div>
			<div id="form-buscar" class="col-xs-5 col-sm-5 col-md-5 col-lg-5 push-left">
				<?php include_once('parts/form-busca.php')?>
			</div>
			<div id="dados-usuarios" class="col-xs-3 col-sm-4 col-sm-push-2 col-md-4 col-md-push-2 col-lg-4 col-lg-push-2 push-right text-right">
				<?php include_once('includes/users/dados-usuarios.php')?>
			</div>
		</header>
		
		<section class="container-fluid" id="content">
		<!--Menu-->
		<?php
			include_once 'parts/menu-lateral.php';
			$url	=	$_GET['url'];
		?>
			<!--Conteúdo da página com SWITCH-->
			<article class="">
			<?php
				switch($url){
					//Alteração do Usuário
					case 'user':include_once 'includes/users/opc_meunu.php';
					break;
					
					case 'home':include_once 'includes/home.php';
					break;
					
					case 'processos':include_once 'includes/2-processos/index.php';
					break;
					
					case 'agenda':include_once 'includes/3-agenda/index.php';
					break;
					
					case 'andamentos':include_once 'includes/4-andamentos/index.php';
					break;
					
					case 'documentos':include_once 'includes/5-documentos/index.php';
					break;
					
					case 'despesas':include_once 'includes/6-despesas/index.php';
					break;
					
					case 'alocacao-de-horarios':include_once 'includes/7-alocacaoHoras/index.php';
					break;
					
					case 'honorarios':include_once 'includes/8-honorarios/index.php';
					break;
					
					case 'pessoas':include_once 'includes/9-pessoas/index.php';
					break;
					
					case 'relatorios':include_once 'includes/10-relatorios/index.php';
					break;
					
					case 'cartas-de-apresentacao':include_once 'includes/11-cartasApresentacao/index.php';
					break;
					
					case 'diligencias':include_once 'includes/12-diligencias/index.php';
					break;
					
					case 'documentos':include_once 'logOff.php';
					break;
					
				}
			?>
			</article>
		</section>
	</body>
	<?php
	}else{
		header('Location: ../');
	}
	ob_end_flush();?>
</html>










