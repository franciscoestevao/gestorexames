{* The header file with the main logo and stuff *}

{include file='header.tpl'}

<table class="perguntas">
			<tr>
				<td class="left"><h1>Lista de todas as Perguntas</h1></td>
				 
				 {if ($s_type < 3)}
				<td class="right"><a href="../perguntas/criar.php?id=0"><b>CRIAR PERGUNTA</b></a></td>
				 {/if}
			</tr>
		</table>
<table>

    <tr>
	  <th class="left">Criador</th>	
      <th class="left">Excerto</th>
      <th class="left">Data de Criação</th>
      <th class="left">Original</th>
      <th class="left">Tipo</th>
      <th class="right">Opções</th>


    </tr>
{foreach from=$perguntas item=pergunta name=listp}

{$type = Perguntas::getGtype($pergunta.gid)}
{if $type == "Grupo"}
	{$id = $pergunta.gid}
{else}
	{$id = $pergunta.pid}
{/if}

    <tr{if ($smarty.foreach.listp.index % 2) == 1} class="alt"{/if}>
	  <td class="left">{Perguntas::myTruncate(strtok(br2nl($pergunta.criador), "\n"),30)}</td>
      <td class="left">{Perguntas::myTruncate(strtok(br2nl($pergunta.texto), "\n"),30)}</td>
      <td class="left">{date('d/m/y H:i:s',strtotime($pergunta.datacria))}</td>
			{if $pergunta.baseada && $type != Grupo}
				<td><b><a href="get.php?id={$pergunta.baseada}&type={$type}">Ver</a></b></td>
			{else if $pergunta.baseado}
				<td><b><a href="get.php?id={$pergunta.baseado}&type={$type}">Ver</a></b></td>
			{else}
				<td></td>
			{/if}
		<td class="left">{$type}</td>
		<td class="right"><b>
		{if ($s_type < 3)}
			{if $type != "Grupo"}
				<a href="../perguntas/action_copiar.php?pid={$id}&gid=0&type={$type}">COPIAR</a> |
			{else}
				<a href="../perguntas/action_copiar.php?pid=0&gid={$id}&type={$type}">COPIAR</a> |
			{/if}
			<a href="../perguntas/apagar.php?id={$id}&type={$type}">APAGAR</a> |
			<a href="../perguntas/editar.php?id={$id}&type={$type}">EDITAR</a> |
			{/if}
			<a href="../perguntas/verQuestao.php?id={$id}&type={$type}">VER</a>
		</b></td>
	</tr>
{/foreach}
</table>



{* The footer file with the address and stuff *}
{include file='footer.tpl'}
