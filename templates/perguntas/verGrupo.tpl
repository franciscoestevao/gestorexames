{include file='../header.tpl'}

	{$id = $grupo.0.gid}
<center>
  <table>
    <tr>
      <td style="width:1px" class="left"><b>Criador:</b></td>
      <td class="left">{$grupo.0.criador}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Tema:</b></td>
      <td class="left">{$grupo.0.tema}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Data de criacão:</b></td>
      <td class="left">{date('d/m/y H:i:s',strtotime($grupo.0.gdata))}</td>
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
	{$ptype = Perguntas::getQtype($pergunta.pid)}
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
			<a href="../perguntas/verQuestao.php?id={$pergunta.pid}&type={Perguntas::getQtype($pergunta.pid)}">VER</a>
		</b></td>
	</tr>
{/foreach}
</table>
 
 <div class="right"><b>
	<a href="../perguntas/action_copiar.php?pid=0&gid={$id}&type={$type}">COPIAR</a><br>
	<a href="../perguntas/apagar.php?id={$id}&type={$type}">APAGAR</a><br>
	<a href="../perguntas/editar.php?id={$id}&type={$type}">EDITAR</a><br>
</b></div>

</center>

{include file='../footer.tpl'}
