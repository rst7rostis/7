<? $this->load->view('header'); ?>
<div class='main_panel'>
<div class='hide_show_button'><span class='ui-icon ui-icon-copy'></span>скрыть инстременты</div>
<table id='tender_add'>	
		<form action='catalog/settodb' method='post'>
		<tr>
			<td><input type='text' name='title' placeholder='название' required class='ui-widget' title='название'></td>
		</tr>
		<tr>
			<td><textarea name='comments' placeholder='описание' required class='ui-widget' title='Описание'></textarea></td>
		</tr>
		<tr>
			<td><textarea name='actor' placeholder='актеры' required class='ui-widget' title='актеры'></textarea></td>
		</tr>			
		<tr>
			<td>
			<select name='type' title='Тип контента'>
			<?
			$video = array('Порно', 
						   'Эротика', 
						   'Фильм',
						   'Клип'
						   );
						   foreach($video as $k):       
						   
						   ?>
							<option><? echo $k; ?></option>
			<? endforeach; ?>
						</select></td>
			<td>Тип контента</td>
		</tr>
		<tr>
			<td><input type='text' name='link' placeholder='ссылка' required class='ui-widget' title='ссылка'></td>
		</tr>
		<tr>
			<td><input type='text' name='vidsize' placeholder='размер' required class='ui-widget' title='размер'></td>
		</tr>
		<tr>
			<td><input type='text' name='vidtime' placeholder='время' required class='ui-widget' title='время'></td>
		</tr>		

		<tr>
			<td><input type='checkbox' name='status' title='удален'>статус (удален)</td>
		</tr>
		<tr>
			<td><input type='submit' value='добавить'></td>
		</tr>

			</form>
			</table>

<? $this->load->view('info_search'); ?>



<div class='show_panel button'>Показать инструменты</div>
</div>