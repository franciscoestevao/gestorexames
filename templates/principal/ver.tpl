
{include file='../header.tpl'}
  
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
      <td style="width:1px" class="right"><b><a href="../principal/editar.php?username={$user.username}">EDITAR</a></b></td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Gabinete:</b></td>
      <td class="left">{$user.gabinete}</td>
      <td style="width:1px" class="right"><b><a href="../principal/apagar.php?username={$user.username}">APAGAR</a></b></td>
    </tr>
  </table>

</center>

{include file='../footer.tpl'}
