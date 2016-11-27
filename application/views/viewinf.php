<? 
$this->load->view('header'); 
$this->load->view('menu'); 
foreach($this->data_inf as $val):

?>
<table width='700px'>

<? echo '<tr><td>ID</td><td>' .$val->id .'</td></tr>'; ?>
<? echo '<tr><td>Информация: </td><td>' .$val->comment .'</td></tr>'; ?>
<? echo '<tr><td>Организатор: </td><td>' .$val->title .'</td></tr>'; ?>
<? echo '<tr><td>Тип: </td><td>' .$val->type .'</td></tr>'; ?>
<? echo '<tr><td>Рейтинг: </td><td>' .$val->rate .'</td></tr>'; ?>
<? echo '<tr><td>Размер файла: </td><td>' .$val->vidsize .'</td></tr>'; ?>
<? echo '<tr><td>Продолжительность: </td><td>' .$val->vidtime .'</td></tr>'; ?>
<?
	endforeach;
?>
</table>
<a href='/page/change_info?id=<? echo $val->id; ?>' class='button'>изменить</a>