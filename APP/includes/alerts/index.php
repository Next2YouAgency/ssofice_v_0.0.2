<script>
$(function() {
	$( "#tabsAlertas" ).tabs();
});
</script>
<div class="col-md-11">
	<div id="tabsAlertas">
		<ul>
			<li><a href="#tabs-1">Compromissos</a></li>
			<li><a href="#tabs-2">Publica&ccedil;&otilde;es</a></li>
			<li><a href="#tabs-3">Processos</a></li>
		</ul>
		<div id="tabs-1">
			<?php include_once 'parts/compromissos.php'?>
		</div>
		<div id="tabs-2">
			<?php include_once 'parts/publica.php'?>
		</div>
		<div id="tabs-3">
			<?php include_once 'parts/processos.php'?>
		</div>
	</div>
</div>