{include file='../header.tpl'}

<table>
	<tr>
		<td style="width:1px" class="left"><b>Tema:</b></td>
		<td class="left">{$pergunta.0.tema}</td>
	</tr>
	<tr>
		<td style="width:1px" class="left"><b>Criador:</b></td>
		<td class="left">{$pergunta.0.criador}</td>
	</tr>
	<tr>
		<td style="width:1px" class="left"><b>Revisao:</b></td>
		<td class="left">{if $pergunta.0.revisao}Sim{else}Não{/if}</td>
	</tr>
	<tr>
		<td style="width:150px" class="left"><b>Data de criação:</b></td>
		<td class="left">{date('d/m/y H:i:s',strtotime($pergunta.0.datacria))}</td>
	</tr>
	<tr>
		<td style="width:1px" class="left top"><b>Texto:</b></td>
		<td class="left">{$pergunta.0.texto}</td>
	</tr>

	{if !empty($pergunta.0.resposta)}
	<tr>
		<td style="width:1px" class="left top"><b>Resposta:</b></td>
		<td class="left">{$pergunta.0.resposta}</td>
	</tr>
	<tr>
		<td style="width:1px" class="left top"><b>Comentario:</b></td>
		<td class="left">{$pergunta.0.comentario}</td>
	</tr>
	{/if}

	{if !empty($pergunta.0.opcao)}
	<tr>
		<td style="width:1px" class="left"><b>Seleção multipla:</b></td>
		<td class="left">{if $pergunta.0.selecaomultipla}Sim{else}Não{/if}</td>
	</tr>
</table>  

<table>
	<tr>
		<th style="width:1px" class="left">Cotação</th>
		<th class="left">Texto</th>
	</tr>  

		{foreach from=$pergunta item=opcao name=listo}
	<tr{if ($smarty.foreach.listo.index % 2) == 1} class="alt"{/if}>
		<td class="left">{$opcao.cotacao}</td>
		<td class="left">{Perguntas::myTruncate($opcao.opcao,100)}</td>
	</tr>
		{/foreach}

</table>
	{else}
</table>
	{/if}
	
{$id = $pergunta.0.pid}
<div class="right"><b>
	
	{if Perguntas::getGtype($id) == "Grupo"}
		<a href="../perguntas/verQuestao.php?id={$pergunta.0.gid}&type=Grupo">VER GRUPO{else}
		<a href="../perguntas/editar.php?id={$pergunta.0.gid}&type=Grupo">CRIAR GRUPO{/if}</a><br>
	<a href="../perguntas/action_copiar.php?pid={$id}&gid=0&type={$type}">COPIAR</a><br>
	<a href="../perguntas/apagar.php?id={$id}&type={$type}">APAGAR</a><br>
	<a href="../perguntas/editar.php?id={$id}&type={$type}">EDITAR</a><br>
</b></div>

{include file='../footer.tpl'}
