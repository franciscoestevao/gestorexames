{include file='../header.tpl'}

<!-- <pre>{$exame|@print_r}</pre>  -->
<table>
 <tr>
    <td class="left"><h1>Ver Exame</h1></td>
   </tr>
   </table>
    <h2>Disciplina : {$exame.0.disciplina}</h2>

    <h3> Perguntas </h3>
    
    {$lastp = 0}
    {$lastg = 0}
    <table>

        {foreach from=$exame item=pergunta name=listp}
        
            {$type = Perguntas::getGtype($pergunta.gid)}
            {if $type == "Grupo"}
                {$id = $pergunta.gid}
            {else}
                {$id = $pergunta.pid}
            {/if}

            {if $lastg != $pergunta.gid}
                {$lastg = $pergunta.gid}

                {if $lastp != $pergunta.pid}
                    {$lastp = $pergunta.pid}
                   
                    <tr style="border-top: solid 2px #C0C0C0 ">
                        <td> {$pergunta.texto} </td>
                        <td></td>
                        <td class="right"><b><a href="../perguntas/verQuestao.php?id={$id}&type={$type}">VER</a></b></td>
                    </tr>
                {/if}
                {if !empty($pergunta.resposta)}
                    <tr>
                        <td> R:___________________________ </td>
                        <td></td>
                    </tr>
                {/if}
                {if !empty($pergunta.opcao)}
                    <tr>
                        <td><rspace> </rspace>&square; {$pergunta.opcao} </td>
                        <td></td>
                    </tr>
                {/if}
            {/if}

        {/foreach}
</table>

<div class="right">



<b><a href="../exames/editar.php?id={$eid}">EDITAR</a></b>
<br>
<b><a href="../exames/apagar.php?id={$eid}">APAGAR</a></b>
</div>
<br>
{* The footer file with the address and stuff *}
{include file='footer.tpl'}
