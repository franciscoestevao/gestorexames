

{include file='header.tpl'}

		<table>
			<tr>
				<td class="left"><h1>Editar Exame</h1></td>
				
			</tr>
		</table>

		<form action="../exames/editar_action.php" method="post">
			
			
		</form>
	 
	 	 
	<form action="../exames/editar_action.php" method="post">
		<label>Disciplina:</label>
			<input type="text" size="80" value="{$exame.0.disciplina}">
			<input type="hidden" name="disciplina" value="{$exame.0.disciplina}"/>
			<br />
			<br />
		<label>Duração (minutos):</label>
			<input type="number" size="8"value="{$exame.0.duracao}">
			<input type="hidden" name="duracao" value="{$exame.0.duracao}"/>
			<br />
			<br />
		<label>Sala:</label>
			<input type="text" size="8"value="{$exame.0.sala}">
			<input type="hidden" name="sala" value="{$exame.0.sala}"/>
			<br />
			<br />
		<label>Data Uso:</label>
			<input type="date" size="80"value="{$exame.0.datauso}">
			<input type="hidden" name="datauso" value="{$exame.0.datauso}"/>
			<br />
			<br />
<!--
			<input type="hidden" name="editavel" value="{$exame.editavel}"/>
-->
			<input type="hidden" name="eid" value="{$id}">

	 
	 
	 
	<button onclick="myFunction()">Adicionar pergunta</button> 
	
	<table>
		<tr>
		  <th class="left">Ordem</th>
		  <th class="left">Cotação</th>
		  <th class="left">Excerto</th>
		  <th class="left">Data de Criação</th>
		  <th class="left">Original</th>
		  <th class="left">Tipo</th>
		  <th class="right">Opções</th>
		</tr>
		{foreach from=$exame item=pergunta name=listp}
			{$gid = $pergunta.gid}
			{$pid = $pergunta.pid}
			{$gtype = Perguntas::getGtype($gid)}
			
			<input type="hidden" name="gid[{$smarty.foreach.listp.index}]" id="gid[{$smarty.foreach.listp.index}]" value="{$gid}"/>
			
			<tr{if ($smarty.foreach.listp.index % 2) == 1} class="alt"{/if}>
				
				<td class="left"><input type="number" style="width:50px" name="ordem[{$smarty.foreach.listp.index}]" id="ordem[{$smarty.foreach.listp.index}]" value="{$pergunta.ordem}"/></td>



				<td class="left"><input type="number" style="width:50px" name="cotacao[{$smarty.foreach.listp.index}]" id="cotacao[{$smarty.foreach.listp.index}]" value="{$pergunta.cotacao}"/></td>

				<td class="left">{Perguntas::myTruncate(strtok(br2nl($pergunta.texto), "\n"),30)}</td>
				<td class="left">{date('d/m/y H:i:s',strtotime($pergunta.pdata))}</td>
					{if $pergunta.baseada}
						<td><b><a href="get.php?id={$pergunta.baseada}&type={$ptype}">Ver</a></b></td>
					{else}
						<td></td>
					{/if}
				<td class="left">{$gtype}</td>
				<td class="right"><b>
					<a href="../perguntas/action_copiar.php?pid={$pid}&gid={$grupo.0.gid}&type={$ptype}">COPIAR</a> |
					<a href="../perguntas/apagar.php?id={$pid}&type={$ptype}">APAGAR</a> |
					<a href="../perguntas/editar.php?id={$pid}&type={$ptype}">EDITAR</a> |
					<a href="../perguntas/verQuestao.php?id={$pid}&type={$ptype}">VER</a>
				</b></td>
			</tr>
		{/foreach}
	</table>
	 
	 		<p class="left"><input type="submit" value="Editar" /></p>
	</form> 
	<script>
		function myFunction() {
			
			newwindow=window.open("add_pergunta.php?id={$id}", "_blank", "scrollbars=yes, top=500, left=500, width=900, height=600");
			if (window.focus){
				newwindow.focus();
			}
		}
	</script>
	
	 
{include file='footer.tpl'}
