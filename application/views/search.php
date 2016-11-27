<? 
$this->load->view('header'); 
$this->load->view('menu'); 
$cnt=0;
foreach($this->e as $val):
?>

<table width='700px'>
<? echo '<tr><td>ID</td><td>' .$val->id .'</td></tr>'; ?>
<? echo '<tr><td>Информация: </td><td>' .$val->comment .'</td></tr>'; ?>
<? echo '<tr><td>Название: </td><td>' .$val->title .'</td></tr>'; ?>
<? echo '<tr><td>Размер: </td><td>' .$val->type .'</td></tr>'; ?>

</table>
<a href='/page/viewinf?id=<?=$val->id ?>' class='button'>просмотр</a>
<a href='/page/change_info?id=<?=$val->id ?>' class='button'>изменить</a>

<?  
$cnt++;
endforeach; 

if($cnt==0){
	echo 'Ничего не найдено!';
}else{
echo "<p>Количество тендеров: $cnt</p>";
}
?>