<? $this->load->view('header'); 
	$this->load->view('menu'); 
	//var_dump($this->data_to_change);
	
	foreach($this->data_to_change as $data):
?>

<table>	
		<form action='/Catalog/correct_db' method='post'>
		<input type='hidden' name='ids' value="<?=$data->id ?>">
		<input type='hidden' name='date' value="<?=$data->date ?>">
		<tr>
			<td><input type='text' name='title' placeholder='название организатора' value='<?=$data->title ?>'></td>
		</tr>
		<tr>
			<td><textarea name='comments' placeholder='описание' rows='10'><?=$data->comment ?></textarea></td>
		</tr>		
		<tr>
			<td><input type='text' name='type' placeholder='тип' value="<?=$data->type ?>"></td>
		</tr>		
		<tr>
			<td><input type='text' name='link' placeholder='ссылка' value="<?=$data->link ?>"></td>
		</tr>		
		<tr>
			<td><input type='text' name='vidtime' placeholder='продолжительность' value="<?=$data->vidtime ?>"></td>
		</tr>			
		<tr>
			<td><input type='text' name='vidsize' placeholder='размер файла' value="<?=$data->vidsize ?>"></td>
		</tr>	
<tr>
			<td>
			<select name='rate'>
			<?
			$rate=array(
							'0', 
						    '1', 
						    '2', 
						    '3', 
						    '4', 
						    '5'
						   );
						   foreach($rate as $k):
						   if($k==$data->rate){
			?>
				<option selected><?=$data->rate ?></option>
						   <?}else{?>
						   <option><?=$k ?></option>
						   <?} endforeach; ?>
			</select></td>
			<td>рейтинг</td>
		</tr>
		<tr>		
		<tr><td><?  if($data->status==1){
			echo "<input type='checkbox' name='status' checked>статус (проигран/отклонен)";
		} else{
			echo "<input type='checkbox' name='status'>статус (удален)";
		} ?>
		</td>	
		</tr>
		<tr>
			<td><input type='submit' value='изменить'></td>
		</tr>

			</form>
			</table>
			
<? endforeach;?>