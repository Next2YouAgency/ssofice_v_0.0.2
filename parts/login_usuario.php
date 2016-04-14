<article class="principal-login <?php echo $xs[7],' ',$sm[5],' ',$md[5],' ',$lg[9],' ',$push_xs[1],' ',$push_sm[2],' ',$push_md[2],' ',$push_lg[0]?>" id="loginUsuario">
	<form id="login_usuario" action="#" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="reg_pessoa" class="<?php echo $xs[12],' ',$sm[12],' ',$md[1],' ',$lg[1];?> control-label">CPF/CNPJ</label>
			<div class="<?php echo $xs[12],' ',$sm[12],' ',$md[9],' ',$lg[9];?> ">
				<input type="number" class="form-control" id="reg_pessoa" name="reg_pessoa" placeholder="Digite CPF ou CNPJ" value="<?php if($user['lembrar'])echo $user['reg_pessoa'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="senhaUsuario" class="<?php echo $xs[12],' ',$sm[12],' ',$md[1],' ',$lg[1];?> control-label">Senha</label>
			<div class="<?php echo $xs[12],' ',$sm[12],' ',$md[9],' ',$lg[9];?>">
			<input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Senha" value="<?php if($user['lembrar'])echo $user['senhaUsuario'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<div class="<?php echo $xs[10],' ',$sm[10],' ',$md[10],' ',$lg[10],' ',$push_xs[0],' ',$push_sm[0],' ',$push_md[0],' ',$push_lg[0];?>">
				<div class="<?php echo $xs[4],' ',$sm[3],' ',$md[3],' ',$lg[3],' ',$pull_xs[0],' ',$push_md[2],' ',$push_lg[2];?>">
					<button type="submit" class="btn btn-primary" name="formSubmit">Login</button>
				</div>
				<div class="<?php echo $xs[5],' ',$sm[3],' ',$md[3],' ',$lg[3],' ',$push_xs[0],' ',$push_sm[2],' ',$push_md[2],' ',$push_lg[2];?>">
					<label>
						Lembrar?<input type="checkbox" class="pull-left" id="lembrar" name="lembrar" value="1" <?php if($user['lembrar'])echo "checked='checked'";?>> 
					</label>
					<label>
						<a href="index.php?remember=true">Esqueci minha senha</a>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group <?php echo $xs[7],' ',$sm[7],' ',$md[7],' ',$lg[7],' ',$push_sm[4],' ',$push_md[4],' ',$push_lg[4];?>">
			<span class="btn btn-primary pull-left" data-toggle="modal" data-target="#solicitarCadastro">Ainda não tem cadastro?</span>
			<!-- Modal Cadastro de Usuários por tipos -->
			<?php include_once 'modal_cadastro.php';?>
			
		</div>
	</form>
</article>