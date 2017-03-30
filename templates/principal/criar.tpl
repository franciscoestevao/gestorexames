{* The header file with the main logo and stuff *}
{include file='header.tpl'}

  <h1>Criar Utilizador</h1>

  <form action="criar_action.php" method="post">
    <label for="username">Login:</label>
    <input type="text" size="80" name="username" id="username" required="required" />
    <br />
    <label for="password">Password:</label>
    <input type="password" size="80" name="password" id="password" required="required" />
    <br />
    <label for="password2">Repetir:</label>
    <input type="password" size="80" name="password2" id="password2" required="required" />
    <br />

    <p class="right"><input type="submit" value="Inserir" /></p>
  </form>

{* The footer file with the address and stuff *}
{include file='footer.tpl'}
