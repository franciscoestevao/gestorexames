{include file='header.tpl'}

  <h1>Remover Utilizador</h1>

  <p>Tem a certeza que quer remover o seguinte utilizador? 
    [<a class="navtext" href="apagar_action.php?username={$user.username}">Sim</a>]
    [<a class="navtext" href="ver.php?username={$user.username}">Não</a>]
  </p>

<center>
	
  <table>
    <tr>
      <td style="width:1px" class="left"><b>Username:</b></td>
      <td class="left">{$user.username}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Nome:</b></td>
      <td class="left">{$user.nome}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Instituição:</b></td>
      <td class="left">{$user.instituicao}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Email:</b></td>
      <td class="left">{$user.email}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Permissões:</b></td>
      <td class="left">{Utilizadores::getPerm($user.tipo)}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Morada:</b></td>
      <td class="left">{$user.morada}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Telemóvel:</b></td>
      <td class="left">{$user.telemovel}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Título:</b></td>
      <td class="left">{$user.titulo}</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Gabinete:</b></td>
      <td class="left">{$user.gabinete}</td>
    </tr>
  </table>

</center>

{* The footer file with the address and stuff *}
{include file='footer.tpl'}
