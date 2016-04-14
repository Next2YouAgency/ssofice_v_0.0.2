﻿<script src="js/switches/switch_pessoal.js"></script>
<script src="js/switches/switch_pessoal_parts.js"></script>
<form id="cadastro_pessoa_fisica" action="confirmar_cadastro_usuario.php" method="post" class="form-horizontal">
	<legend>
		<span class="col-sm-10">
			Documentos do Cadastro
		</span>
		<div class="clearfix"></div>
	</legend>
	<div class="form-group pull-left">
		<label for="tipo_cliente" class="col-sm-8 control-label">Documento: </label>
		<div class="col-sm-4">
			<p class="form-control-static" id="tipo_cliente"><?php echo strtoupper($resultado['tipo_pessoa']);?></p>
			<input type="hidden" value="<?php echo $resultado['tipo_pessoa'];?>" name="tipo_pessoa">
		</div>
	</div>
	
	<div class="form-group pull-left">
		<label for="tipo_cliente" class="col-sm-4 col-sm-push-2 control-label">Numeração: </label>
		<div class="col-sm-8 col-sm-push-4">
			<p class="form-control-static" id="tipo_cliente" name="tipo_pessoa"><?php echo strtoupper($resultado['reg_pessoa_cadastrada']);?></p>
			<input type="hidden" value="<?php echo $resultado['reg_pessoa_cadastrada'];?>" name="reg_pessoa">
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="form-group">
		<label for="rg_pessoa" class="col-sm-2 control-label">RG:</label>
		<div class="col-sm-10">
			<input type="text" id="rg_pessoa" name="rg_pessoa" placeholder="Somente os Números, Ex: 123456789" class="form-control" required title="Informe o Número do RG">
		</div>
	</div>
	
	<div class="form-group">
		<label for="senha_acesso" class="col-sm-2 control-label">Senha:</label>
		<div class="col-sm-10 ">
			<input type="password" id="senha_acesso" name="senha_acesso" value="<?php echo $senha_acesso;?>" placeholder="Crie sua senha" class="form-control" required>
		</div>
	</div>
	
	<legend>
		<span class="col-sm-10">
			Informações Pessoais
		</span>
		<div class="clearfix"></div>
		</legend>
	<div class="form-group pull-left">
		<label for="tratamento_pessoa" class="col-sm-4 control-label">Tratamento: </label>
		<div class="col-sm-8 col-sm-push-2">
			<select id="tratamento_pessoa" name="tratamento_pessoa" class="form-control">
				<option value="<?php echo $tratamento_pessoa?>"><?php echo $tratamento_pessoa?></option>
				<option value="Escolher Outro">Outro</option>
				<option value="Escolher Outro">Outro</option>
				<option value="Escolher Outro">Outro</option>
				<option value="Escolher Outro">Outro</option>
			</select>
		</div>
	</div>
	
	<div class="form-group pull-left">
		<label for="genero_pessoa" class="col-sm-2 col-sm-push-3 control-label">Gênero:</label>
		<div class="col-sm-10 col-sm-push-4">
			<select type="text" id="genero_pessoa" name="genero_pessoa" class="form-control">
				<option value="<?php echo $genero_pessoa;?>"><?php echo $genero_pessoa;?></option>
				<option>Outro</option>
			</select>
		</div>
	</div>
	<div class="clearfix"></div>
	
	<div class="form-group">
		<label for="tratamento_pessoa" class="col-sm-2 control-label">Nome:</label>
		<div class="col-sm-10">
			<input type="text" id="nome_pessoa" name="nome_pessoa" value="<?php echo $nome_pessoa;?>" class="form-control" required>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<div class="form-group">
		<label for="id_oab" class="col-sm-2 control-label">OAB:</label>
		<div class="col-sm-10 ">
			<input type="number" id="id_oab" name="id_oab" placeholder="Digite o Número de cadastro" class="form-control" required>
		</div>
	</div>
	<div id="dados_contato_comercial">
	<legend>
		<span class="col-sm-10">
			Dados para contato Comercial
		</span>
		<span class="add-contato-pessoal col-sm-2">
			<img src="img/add-email.png" alt="Adicionar novo endereço de Email" title="Adicionar novo endereço de Email" class="img-responsive" id="dados_contato_pessoal_abrir">
		</span>
		<div class="clearfix"></div>
	</legend>
	<?php include_once 'parts/cadastro/dados_contato_comercial.php';?>
	</div>
	
	<div id="dados_contato_pessoal">
		<legend>
			<span class="col-sm-10">
				Dados para contato Pessoal
			</span>
			<div class="clearfix"></div>
		</legend>
	<?php include_once 'parts/cadastro/dados_contato_pessoal.php';?>
	</div>
	<input type="hidden" value="<?php echo $_GET['registro_pessoa']?>" name="cod_reg_cliente">
	<div class="form-group">
		<div class="col-sm-3 col-sm-push-3">
			<input type="submit" class="btn btn-info" name="btn_submit" data-toggle="modal" data-target="#modalAlertaConcluir">
		</div>
		<div class="col-sm-3 col-sm-push-3">
			<input type="reset" class="btn btn-danger" value="Cancelar">
		</div>
	</div>
</form>