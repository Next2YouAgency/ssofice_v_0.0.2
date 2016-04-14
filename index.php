<?php 
	require_once 'APP/appCnf/config.php';
	ob_start();
	session_start();
	
	if(!empty($_SESSION['authUser'])){
		header('Location: APP/index.php');
	}
?>
<!doctype html>
<html>
	<head>
		<meta name="charset" content="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SS Office</title>
		<!--CORE DO JQUERY-->
		<script type="text/javascript" src="APP/js/jquery.min.js"></script>
		<!--CORE JS DO BOOTSTRAP-->
		<script type="text/javascript" src="APP/js/bootstrap.min.js"></script>
		
		<!--CORE CSS DO BOOTSTRAP-->
		<link rel="stylesheet" href="APP/css/bootstrap.min.css">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style media="all">
			.rounded{
				background-color:#fcfcfc;
				color:#999;
				border-radius:10px;
				padding-top:10px;
			}
			.btn{
				border:2px inset #337ab7;
			}
			.debug{position:fixed;left:0;top:0;padding:15px;background:rgba(255,255,255,.75)}
		</style>
		<!--AJAX de verificação do tipo de pessoa-->
		<script type="text/javascript" src="js/verificar_pessoa.js"></script>
		
		<!--AJAX de trocas de informações-->
		<script type="text/javascript" src="js/switches/switch_pessoal.js"></script>
		<script type="text/javascript" src="js/switches/switch_pessoal_parts.js"></script>
		<script type="text/javascript" src="js/modalsInter.js"></script>
		<?php
			include_once 'parts/classesBS.php';
		?>
	</head>
	<body class="bg-primary">
	<section class="content-fluid">
		<article class="<?php echo $xs[11],' ',$sm[11],' ',$md[11],' ',$lg[11]?> text-center">
			<img src="img/logotipo.png">
		</article>
		<article class="rounded <?php echo $xs[9],' ',$sm[9],' ',$md[9],' ',$lg[9],' ',$push_xs[0],' ',$push_sm[0],' ',$push_md[0],' ',$push_lg[0]?>">
		
		<?php
		
			if(isset($_POST['formSubmit'])){
				$user['reg_pessoa']		=	mysql_real_escape_string($_POST['reg_pessoa']);
				$user['senhaUsuario']	=	mysql_real_escape_string($_POST['senhaUsuario']);
				$user['lembrar']		=	mysql_real_escape_string($_POST['lembrar']);
				
				if(!$user['reg_pessoa']){
					
					$cookiesalva	=	base64_encode($user['reg_pessoa']).'&'.base64_encode($user['senhaUsuario']);
					setcookie('authUser',$cookiesalva,time()+60*60*24*30,'/');
					?>
					<!-- Modal -->
					<div class="modal fade in" id="modalAlertaErroSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block;margin-top:15%">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">											
									<h4 class="modal-title text-danger" id="myModalLabel">Erro ao fazer Login</h4>
								</div>
								<div class="modal-body">
									O login não pode ser efetuado, por favor, digite o CPF/CNPJ novamente!
									<a href="index.php">Tentar Novamente</a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<?php
					
				}else{
					$authReg	=	md5($user['reg_pessoa']);
					$authPas	=	md5($user['senhaUsuario']);
					
					$readAuthUs	=	read('usuarios_ativados',"WHERE cod_reg_usuario = '$authReg'");
					
					if($readAuthUs){
						foreach($readAuthUs as $authUser);
						
						if($authUser['cod_reg_usuario'] == $authReg && $authUser['senha_acesso_cliente'] == $authPas){
							
							if($user['lembrar']){
								$cookiesalva	=	base64_encode($user['reg_pessoa']).'&'.base64_encode($user['senhaUsuario']);
								setcookie('authUser',$cookiesalva,time()+60*60*24*30,'/');
							}else{
								setcookie('authUser','',time()-3600,'/');
							}
							//INICIO DA SESSÃO DO USUÁRIO
							$_SESSION['authUser']	=	$authUser;
							header('Location: ' . $_SERVER['PHP_SELF']);
							
						}else{
							$cookiesalva	=	base64_encode($user['reg_pessoa']).'&'.base64_encode($user['senhaUsuario']);
							setcookie('authUser',$cookiesalva,time()+60*60*24*30,'/');
							?>
							<!-- Modal -->
							<div class="modal fade in" id="modalAlertaErroSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block;margin-top:15%">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">											
											<h4 class="modal-title text-danger" id="myModalLabel">Erro ao fazer Login</h4>
										</div>
										<div class="modal-body">
											O login não pode ser efetuado, a senha não confere com o cadastro,
											<a href="index.php">Tentar Novamente</a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						
					}else{
						$cookiesalva	=	base64_encode($user['reg_pessoa']).'&'.base64_encode($user['senhaUsuario']);
						setcookie('authUser',$cookiesalva,time()+60*60*24*30,'/');
						?>
						<!-- Modal -->
						<div class="modal fade in" id="modalAlertaErroSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block;margin-top:15%">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">											
										<h4 class="modal-title text-danger" id="myModalLabel">Erro ao fazer Login</h4>
									</div>
									<div class="modal-body">
										O login não pode ser efetuado, Não Existe cadastro neste CPF/CNPJ,
										<a href="index.php">Tentar Novamente</a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				}
			}elseif(!empty($_COOKIE['authUser'])){
				//Cookie
				$cookie					=	$_COOKIE['authUser'];
				$cookie					=	explode('&',$cookie);
				$user['reg_pessoa']		=	base64_decode($cookie[0]);
				$user['senhaUsuario']	=	base64_decode($cookie[1]);
				$user['lembrar']		=	1;
			}
		
			if(isset($_GET['ativar']) && $_GET['ativar']== 'y'){
				include_once 'parts/cadastro/concluirCadastroCliente.php';
			}else			
			if(isset($_GET['remember'])){
				$recover['emailUsuario']	=	mysql_real_escape_string($_POST['emailUsuario']);
				$recover['reg_usuario']	=	mysql_real_escape_string($_POST['reg_usuario']);
				include_once 'parts/recover_pass.php';
			}else{
				include_once 'parts/login_usuario.php';
			}
			

		?>
		<div class="clearfix"></div>
		</article>
		<div class="clearfix"></div>
	
	</section>
	</body>
	<?php ob_end_flush();?>
</html>