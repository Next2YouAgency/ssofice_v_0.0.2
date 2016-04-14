<div class="modal fade" id="solicitarCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Solicitar um Cadastro</h4>
		</div>
		<div class="modal-body">
		<form action="cadastro/cadastro_novo_usuario.php" method="get" class="form-horizontal">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Tipo*</label>
				<div class="col-sm-10">
					<select name="tipo_pessoa" id="tipo_pessoa" onchange="verificarTipoPessoa();" class="form-control">
						<option value="cpf">Pessoa Física</option>
						<option value="cnpj">Pessoa Jurídica</option>
					</select>
				</div>
			</div>
			<div id="inserir_pagina">
				<?php
				if(!isset($_GET['tipo_pessoa'])){
					include_once 'tipos/pagina_cadastro_cpf.php';
				}
				?>
			</div>
		</div>
		<div class="modal-footer">
			<input type="submit" value="Cadastrar" class="btn btn-success" id="sendForm">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</form>
		</div>
		</div>
	</div>
</div>