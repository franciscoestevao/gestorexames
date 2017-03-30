
{include file='header.tpl'}
  

		<table>
			<tr>
				<td class="left"><h1>Criar Nova Pergunta</h1></td>
				
			</tr>
		</table>
	
	<form action="criar_action.php" method="post">
		
		<input type="hidden" name="gid" id="gid" value="{$gid}"/>
		{if $gid == 0}
		<label for="tema">Tema:</label>
		<input type="text" name="tema" id="tema" required="required" />
		<br />
		<br />
		{/if}
		<label for="text">Texto:</label>
                <textarea rows="7" cols="70" name="text" id="text" required="required" ></textarea>
		<br />
                <br />
		<label for="type">Tipo:</label>
                <select name="type" id="type">
                    <option value="Descricao" selected>Descrição</option>
                    <option value="Aberta">Aberta</option>
                    <option value="Multipla">Múltipla</option>
		</select>
		<br />
                <br />
		<p class="right"><input type="submit" value="Inserir" /></p>
	</form>



{include file='footer.tpl'}
