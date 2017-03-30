{include file='../header.tpl'}
		<table>
			<tr>
				<td class="left"><h1>Lista de Todos os Exames</h1></td>
				<td class="right"><a href="../exames/criar.php"><b>CRIAR EXAME</b></a></td>
			</tr>
		</table>

		<table>
			<tr>
				<th class="left">Criador</th>
				<th class="left">Disciplina</th>
				<th class="center">Data do exame</th>
				<th class="center">Data de exportação</th>
				<th class="center">Data de criação</th>
				<th class="right">Opções</th>
			</tr>
			
{foreach from=$exames item=exame name=liste}
			<tr{if ($smarty.foreach.liste.index % 2) == 1} class="alt"{/if}>
				<td style="width:1px" class="left">{$exame.criador}</td>
				<td style="width:1px" class="left">{$exame.disciplina}</td>
				{if $exame.datauso}
				<td class="center">{date('d/m/y H:i:s',strtotime($exame.datauso))}</td>
				{else} <td />{/if}
				{if $exame.dataexport}
				<td class="center">{date('d/m/y H:i:s',strtotime($exame.dataexport))}</td>
				{else} <td />{/if}
				<td class="center">{date('d/m/y H:i:s',strtotime($exame.datacria))}</td>
				<td style="width:190px" class="right"> <b>
{if ($exame.editavel == true)}
					<a href="../exames/apagar.php?id={$exame.id}">APAGAR</a> | 
					<a href="../exames/editar.php?id={$exame.id}">EDITAR</a> | 
{/if}	
					<a href="../exames/ver.php?id={$exame.id}">VER</a></b>
					 </b></td>
			</tr> 
{/foreach}
		</table>

{include file='../footer.tpl'}
