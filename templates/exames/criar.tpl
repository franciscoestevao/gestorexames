
{include file='header.tpl'}
  

<table class="perguntas">
			<tr>
				<td class="left"><h1>Criar Novo Exame</h1></td>
			</tr>
</table>
	
	<form action="criar_action.php" method="post">
		<label for="disciplina">Disciplina:</label>
		<input type="text" name="disciplina" id="disciplina" required="required" />
		<br />
		<p class="right"><input type="submit" value="Inserir" /></p>
	</form>



{include file='footer.tpl'}
