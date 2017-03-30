{* The header file with the main logo and stuff *}
{include file='header.tpl'}

<form action="../perguntas/editar_action.php?type={$type}" method="post">
	<table class="perguntas">
			<tr>
				<td class="left"><h1>Editar Grupo</h1></td>
				<td></td>
			</tr>
			<tr>
				<td>
					<label for="tema">Tema:</label>
					<input type="text" size="80" name="tema" id="tema" value="{$grupo.0.tema}"/>
					<input type="hidden" size="80" name="gid" id="gid" value="{$grupo.0.gid}"/>
				</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td class="right"><a href="../perguntas/criar.php?id={$grupo.0.gid}"><b>CRIAR PERGUNTA</b></a></td>
			</tr>
		</table>


	<table>
		<tr>
		  <th class="left">Excerto</th>
		  <th class="left">Data de Criação</th>
		  <th class="left">Original</th>
		  <th class="left">Tipo</th>
		  <th class="left">Revisão</th>
		  <th class="right">Opções</th>
		</tr>
		{foreach from=$grupo item=pergunta name=listp}
			{$pid = $pergunta.pid}
			{$ptype = Perguntas::getQtype($pid)}
			<tr{if ($smarty.foreach.listp.index % 2) == 1} class="alt"{/if}>
				<td class="left">{Perguntas::myTruncate(strtok(br2nl($pergunta.texto), "\n"),30)}</td>
				<td class="left">{date('d/m/y H:i:s',strtotime($pergunta.pdata))}</td>
					{if $pergunta.baseada}
						<td><b><a href="get.php?id={$pergunta.baseada}&type={$ptype}">Ver</a></b></td>
					{else}
						<td></td>
					{/if}
				<td class="left">{$ptype}</td>
				<td class="left">{if $pergunta.revisao}x{/if}</td>
				<td class="right"><b>
					<a href="../perguntas/action_copiar.php?pid={$pid}&gid={$grupo.0.gid}&type={$ptype}">COPIAR</a> |
					<a href="../perguntas/apagar.php?id={$pid}&type={$ptype}">APAGAR</a> |
					<a href="../perguntas/editar.php?id={$pid}&type={$ptype}">EDITAR</a> |
					<a href="../perguntas/verQuestao.php?id={$pid}&type={$ptype}">VER</a>
				</b></td>
			</tr>
		{/foreach}
	</table>

	<div class="right"><input type="submit" value="Terminar" /></div>
</form>
{* The footer file with the address and stuff *}
{include file='footer.tpl'}
