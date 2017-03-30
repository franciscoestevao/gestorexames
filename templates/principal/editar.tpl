{include file='header.tpl'}

		<h1>Editar Utilizador</h1>

		<form action="../principal/editar_action.php" method="post">
			<label>Username:</label>
			<input type="text" size="80"value="{$user.username}" disabled/>
			<input type="hidden" name="username" value="{$user.username}"/>
			<br />
			<br />
			
			<label for="nome">Nome:</label>
			<input type="text" size="80" name="nome" id="nome" value="{$user.nome}"/>
			<br />
			<br />
			
			<label for="email">Email:</label>
			<input type="text" size="80" name="email" id="email" value="{$user.email}"  />
			<br />
			<br />
			
			<label for="telemovel">Telefone:</label>
			<input type="text" size="80" name="telemovel" id="telemovel" value="{$user.telemovel}" />
			<br />
			<br />
			
			<label for="instituicao">Instituição:</label>
			<input type="text" size="80" name="instituicao" id="instituicao" value="{$user.instituicao}" />
			<br />
			<br />
			
			<label for="morada">Morada:</label>
			<input type="text" size="80" name="morada" id="morada" value="{$user.morada}" />
			<br />
			<br />
			
			<label for="titulo">Titulo:</label>
			<input type="text" size="80" name="titulo" id="titulo" value="{$user.titulo}" />
			<br />
			<br />
			
			<label for="gabinete">Gabinete:</label>
			<input type="text" size="80" name="gabinete" id="gabinete" value="{$user.gabinete}" />
			<br />
			<br />
			
			<label for="password">Password:</label>
			<input type="password" size="80" name="password" id="password" value="{$user.password}" />
			<br />
			<br />			
			
			<label for="password2">Repetir:</label>
			<input type="password" size="80" name="password2" id="password2" value="{$user.password}" />
			<br />
			<br />			
			
			<label for="tipo">Permissões:</label>
			<select name="tipo" id="tipo">
				<option value="1"{if $user.tipo==1} selected{/if}>Administrador</option>
				<option value="2"{if $user.tipo==2} selected{/if}>Docente</option>
				<option value="3"{if $user.tipo==3} selected{/if}>Monitor</option>
			</select>
			<br />
			<br />
					
			<p class="right"><input type="submit" value="Editar" /></p>
		</form>

{include file='footer.tpl'}
