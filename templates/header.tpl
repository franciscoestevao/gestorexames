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

{*debug*} 

<div class="header">

		<!-- header tag -->
		<header>
{if isset($s_user)}
			<p><a href="../principal/mainpage.php">Gestor de Exames</a></p>
{else}
			<p><a href="../principal/startpage.php">Gestor de Exames</a></p>
{/if}
		</header>

{if isset($s_user)}
		<footer class="nav"> <bar>
			
{if ($s_type >1)}
			<rspace><a href="../exames/meusexames.php">Meus Exames</a></rspace>

			<rspace><a href="../exames/todosexames.php">Todos os Exames</a></rspace>
{/if}

{if {$s_type} == 2}
			<rspace><a href="../perguntas/minhasperguntas.php">Minhas Perguntas</a></rspace>
{/if}

{if {$s_type} > 1}
			<rspace><a href="../perguntas/todasperguntas.php">Todas as Perguntas</a></rspace>
{/if}

{if {$s_type} < 2}
			<rspace><a href="../principal/listar_tudo.php">Listar Utilizadores</a></rspace>
{/if}

			<span style="float:right;">
				<right><a href="../principal/logout_action.php">Logout</a></right>
			</span>
		</bar></footer>

{/if}

</div>

<div class="body">
