{include file='header.tpl'}


<table class="perguntas">
			<tr>
				<td class="left"><h1>Remover Exame</h1></td>
			</tr>
</table>

  <p>Tem a certeza que quer apagar o exame? 
    [<a class="navtext" href="apagar_action.php?id={$exame}">Sim</a>]
    [<a class="navtext" href="ver.php?id={$exame}">Não</a>]
  </p>

{* The footer file with the address and stuff *}
{include file='footer.tpl'}
