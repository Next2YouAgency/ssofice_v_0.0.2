<article class="principal-login content-fluid" id="concluirCadastro">
<?php
	require_once 'APP/appCnf/config.php';
	
	if(isset($_GET['registro_pessoa'])){
		
	
	$registro_cliente	=	$_GET['registro_pessoa'];
	
	$queryConsutarClientesCadastrados	=	"SELECT * FROM pessoas_cadastradas WHERE cod_reg_cliente = '$registro_cliente'";
	$exeQrConsutarClientesCadastrados	=	mysql_query($queryConsutarClientesCadastrados) or die('Erro ao consultar o Cliente, Detalhes do erro:<br><strong>'.mysql_error().'</strong>');
	
	$linhas	=	mysql_num_rows($exeQrConsutarClientesCadastrados);
	
	if($linhas > 0){
		
		while($resultado	=	mysql_fetch_assoc($exeQrConsutarClientesCadastrados)){
			$tipo_pessoa		=	$resultado['tipo_pessoa'];
			$tratamento_pessoa	=	$resultado['tratamento_pessoa'];
			$nome_pessoa		=	$resultado['nome_pessoa'];
			$genero_pessoa		=	$resultado['genero_pessoa'];
			$email_principal	=	$resultado['email_principal'];
			$reg_pessoa			=	$resultado['reg_pessoa'];
			$cod_reg_cliente	=	$resultado['cod_reg_cliente'];
			
			include_once 'interface_concluir_cadastro.php';
		}
		
	}else{
		echo'
		Erro ao ler a tabela de clientes
		';
	}
	
	}
?>
</article>