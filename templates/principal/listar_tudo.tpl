
{include file='../header.tpl'}
		<table>
			<tr>
				<td class="left"><h1>Lista de Utilizadores</h1></td>
				<td class="right"><a href="../principal/criar.php"><b>ADICIONAR</b></a></td>
			</tr>
		</table>

		<table>
			<tr>
				<th class="left">Username</th>
				<th class="left">Nome</th>
				<th class="center">Permissões</th>
				<th class="right">Opções</th>
			</tr>
			
{foreach from=$users item=user name=listu}
			<tr{if ($smarty.foreach.listu.index % 2) == 1} class="alt"{/if}>
				<td style="width:1px" class="left">{$user.username}</td>
				<td class="left">{$user.nome}</td>
				<td style="width:1px" class="center">{Utilizadores::getPerm({$user.tipo})}</td>
				<td style="width:190px" class="right"> <b>
{if ($user.username != $s_user)}
					<a href="../principal/apagar.php?username={$user.username}">APAGAR</a> | 
{/if}
					<a href="../principal/editar.php?username={$user.username}">EDITAR</a> | 
					<a href="../principal/ver.php?username={$user.username}">VER</a></b>
				</td>
			</tr>
{/foreach}
		</table>

{include file='../footer.tpl'}
