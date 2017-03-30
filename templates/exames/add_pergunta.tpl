
<!DOCTYPE html>
<html lang="pt">

	<head>
		<meta charset="utf-8" />
		<title>Gestor de Exames</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/print.css" media="print" />
		<link rel="stylesheet" type="text/css" href="../css/perguntas.css" />
	</head>

<style>
	html{
		overflow: -moz-scrollbars-vertical;
	}
</style>


	<body>

{debug} 

<div class="header">

		<!-- header tag -->
		<header>
			<p>Gestor de Exames</p>
		</header>

</div>

<div class="body">

  
<table class="perguntas">
			<tr>
				<td class="left"><h1>Lista de todas as Perguntas</h1></td>
			</tr>
		</table>
<table>

    <tr>
	  <th class="left">Seleccionar</th>
      <th class="left">Excerto</th>
      <th class="left">Data de Criação</th>
      <th class="left">Original</th>
      <th class="left">Tipo</th>
      <th class="right">Opções</th>
    </tr>
{foreach from=$perguntas item=pergunta name=listp}

{$type = Perguntas::getGtype($pergunta.gid)}
	{$gid = $pergunta.gid}
	{$pid = $pergunta.pid}

    <tr{if ($smarty.foreach.listp.index % 2) == 1} class="alt"{/if}>
	  <td class="left">
		<form action="../exames/add_pergunta_action.php" method="post">
			<input type="hidden" name="id" value="{$eid}">
			<input type="checkbox" name="check_list[]" value="{$gid}">
		
	  </td>
      <td class="left">{Perguntas::myTruncate(strtok(br2nl($pergunta.texto), "\n"),30)}</td>
      <td class="left">{date('d/m/y H:i:s',strtotime($pergunta.datacria))}</td>
			{if $pergunta.baseada}
				<td><b><a href="get.php?id={$pergunta.baseada}&type={$type}">Ver</a></b></td>
			{else}
				<td></td>
			{/if}
		<td class="left">{$type}</td>
		<td class="right"><b>
			<a href="add_pergunta_ver.php?id={$pid}&type={$type}">VER</a>
		</b></td>
	</tr>
{/foreach}

	<tr>
<!--		<script language="Javascript">

			function redirect(){
				window.confirm("As perguntas foram adicionadas com sucesso!");
				window.opener.location.href="ver.php?id={$eid}";
				self.close();
			}

		</script>
	
	-->	
		
			<td class="left">
				<input type="submit" value="Confirmar" <!-- OnClick="redirect()-->">
			</td>
		</form>
	</tr>

</table>


</div>
  <!-- footer tag -->
		<footer class="footer">
			<div>
				<p class="right">SIBD1513 (c) 2015</p>
			</div>
		</footer>

	</body>
</html>

