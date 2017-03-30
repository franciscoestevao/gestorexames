
{include file='../header.tpl'}
  
  <head>
		<title>Gestor de Exames</title>
		<meta charset="UTF-8">
	</head>
  
<center>
	
	<p class="login">
		
			<h2>Bem-vindo{if !empty($s_name)}, <u>{$s_name}{/if}</u>!</h2> 
			<h5>(As suas permissões são de <b>{if $s_type == 0} Super Admin){/if}
										{if $s_type == 1} Administrador){/if}
										{if $s_type == 2} Docente){/if}
										{if $s_type == 3} Monitor){/if}</b></h5>
	</p>
	
</center>

{include file='../footer.tpl'}
