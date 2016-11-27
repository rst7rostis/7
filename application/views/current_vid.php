<div id='current_trades'>
	<div class='current_trades_data'>		
			<table>
			<tr><td colspan='2'>Видео на дисках:</td></tr>
<?
foreach($this->data_inf as $val): 
?>			
			
			<tr><td width='50px'><span class='ui-icon ui-icon-clipboard'></span><?=$val->id ?></td><td width='350px'><?
				echo "<a href='/page/viewinf?id={$val->id}'>$val->title</a>";
			?></td><td width='150px'><span class='ui-icon ui-icon-person'></span><?=$val->rate?></td></tr>
		
<? 
endforeach;
?>			
			</table>
			</div>
			</div>