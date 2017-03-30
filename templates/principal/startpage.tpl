
{include file='../header.tpl'}
 
    <!-- login form -->
<center>

	
	<div id="login">
		<div class="title">Login</div>
		<form action="../principal/login_action.php" method="post">
			<label for="uuser">Username:</label>
			<input type="text" size="15" name="uuser" id="uuser"/>
			<label for="upass">Password:</label>
			<input type="password" size="15" name="upass" id="upass"/>
			<input type="submit" value="Login" />
		</form>	
	</div>
</center>

{include file='../footer.tpl'}
