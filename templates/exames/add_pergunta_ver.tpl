
<!DOCTYPE html>
<html lang="pt">

	<head>
		<meta charset="utf-8" />
		<title>Gestor de Exames</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/print.css" media="print" />
		<link rel="stylesheet" type="text/css" href="../css/perguntas.css" />
	</head>

	<body>

{debug} 

<div class="header">

		<!-- header tag -->
		<header>
			<p>Gestor de Exames</p>
		</header>
		
		
<!--
		
{if isset($s_user)}
		<footer class="nav"> <bar>
			
			<rspace><a href="add_pergunta.php">Minhas Perguntas</a></rspace>

		</bar></footer>

{/if}
-->
		
		
		

</div>

<div class="body">

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
		<td class="left">{Perguntas::myTruncate($opcao.texto,100)}</td>
	</tr>
		{/foreach}

</table>
	{else}
</table>
	{/if}
	
{$id = $pergunta.0.pid}



</div>
  <!-- footer tag -->
		<footer class="footer">
			<div>
				<p class="right">SIBD1513 (c) 2015</p>
			</div>
		</footer>

	</body>
</html>

