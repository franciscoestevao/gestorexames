{include file='header.tpl'}

<table class="perguntas">
			<tr>
				<td class="left"><h1>Editar Pergunta</h1></td>
			</tr>
</table>


<form action="../perguntas/editar_action.php?type={$type}" method="post">
	<input type="hidden" name="gid" value="{$pergunta.0.gid}"/>
	<input type="hidden" name="pid" value="{$pergunta.0.pid}"/>

{if Perguntas::getGtype($pergunta.0.gid) != "Grupo"}
	<label for="tema">Tema:</label>
	<input type="text" size="80" name="tema" id="tema" value="{$pergunta.0.tema}"/>
	<br />
	<br />
{else}
	<input type="hidden" size="80" name="tema" id="tema" value="{$pergunta.0.tema}"/>
{/if}

	<label for="text">Texto:</label>
	<textarea rows="7" cols="90" name="text" >{br2nl($pergunta.0.texto)}</textarea>
	<br />
	<br />

	{if $type == "Aberta"}
		<label for="resposta">Resposta:</label>
		<textarea rows="7" cols="90" name="resposta" >{br2nl($pergunta.0.resposta)}</textarea>
		<br />
		<br />

		<label for="comentario">Comentário:</label>
		<textarea rows="7" cols="90" name="comentario">{br2nl($pergunta.0.comentario)}</textarea>
		<br />
		<br />
	{/if}
	
	<input type="checkbox"  name="revisao" id="revisao" value="TRUE" {if $pergunta.0.revisao}checked="checked"{/if}> Revisão
	<br />
	<br />

	{if $type == "Multipla"}
		<input type="checkbox" name="multipla" value="TRUE" {if $pergunta.0.selecaomultipla}checked="checked"{/if}> Seleção multipla
		<br />
		<br />

		<table>
			<tr>
				<th style="width:1px" class="left">Reutilizavel</th>
				<th style="width:1px" class="left">Cotação</th>
				<th class="left">Texto</th>
				<th class="left">Opções</th>
			</tr>  

			{foreach from=$pergunta item=opcao name=listo}    
				<input type="hidden" name="oid[{$smarty.foreach.listo.index}]" id="oid[{$smarty.foreach.listo.index}]" value="{$opcao.oid}"/>

				<tr{if ($smarty.foreach.listo.index % 2) == 1} class="alt"{/if}>
					<td class="center">
						<input type="hidden" name="reutilizavel[{$smarty.foreach.listo.index}]" id="reutilizavel[{$smarty.foreach.listo.index}]" value="FALSE"/>
						<input type="checkbox" name="reutilizavel[{$smarty.foreach.listo.index}]" id="reutilizavel[{$smarty.foreach.listo.index}]" value="TRUE" {if $opcao.reutilizavel}checked="checked"{/if} />
					</td>
					<td class="left"><input type="number" style="width:50px" name="cotacao[{$smarty.foreach.listo.index}]" id="cotacao[{$smarty.foreach.listo.index}]" value="{$opcao.cotacao}"/></td>
					<td class="left"><input type="text" size="70" name="texto[{$smarty.foreach.listo.index}]" id="texto[{$smarty.foreach.listo.index}]" value="{$opcao.opcao}"/></td>
					<td class="right"><b>
						{if count($pergunta)!=1}
							<a href="../perguntas/apagar_opcao_action.php?pid={$pergunta.0.pid}&oid={$opcao.oid}">Apagar</a> |
						{/if}
						<a href="../perguntas/copiar_opcao_action.php?pid={$pergunta.0.pid}&oid={$opcao.oid}">Duplicar</a>
					</b></td>
				</tr>
			{/foreach}
		
			<tr>
				<td class="left" style="position:absolute; left:0; bottom:150px"><br><br><b>Adicionar: </b>

					<select name="new" id="new">
					<option value="-1">Nenhum</option>
					<option value="0">Nova</option>
					{if isset($reutilizaveis)}
						<option value="-1">---------- Opções Reutilizaveis: </option>
						{foreach from=$reutilizaveis item=opcao}
							<option value={$opcao.oid}>{$opcao.texto}</option>
						{/foreach}
					{/if}
					</select>

				</td>
			</tr>
	{else}
		<table>
	{/if}
			<tr>
				<td class="left"><input style="position:absolute; left:1; bottom:100px" type="submit" value="Guardar Alterações" />
					{if $type == "Multipla"}
					<td class="right"><b>
						<a href="../perguntas/minhasperguntas.php" style="position:absolute; right:5px">Terminar</a>
					</b></td>
					{/if}
				</td>
			</tr>
		</table>
	</form>

{include file='footer.tpl'}

