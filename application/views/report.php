<? $this->load->view('header'); ?>
<div class='wrapper'>
<? $this->load->view('menu'); ?>
<!-- <h1>Отчет ООО "Спецобъединение Юго-Запад"</h1> -->
<div id="accordion">
  <h3>Отчет ООО "Спецобъединение Юго-Запад"</h3>
  <div class='group1'>
<?
foreach($this->res as $v):
	if($v->ip==1 or $v->ip==2){
		continue;
		
	}else{
		
		if($v->status=='1'){
		echo "<div class='fail'>";
		echo "Тендер проигран или отклонен!<br>";
		echo "<div class='nstitle'>".$v->title ."</div><br>";
		echo "<span class='ui-icon ui-icon-comment'></span>".$v->comment."<br>";
		echo "<div class='manager'><span class='ui-icon ui-icon-person'></span>".$v->manager ."</div>";
		echo "НМЦ ".$v->summ ."<br>";
		if($v->summ2==0){
			echo "Предложение <b>не было подано</b><br>";
			}else{
		echo "Предложение ".$v->summ2. "<br>";
				}
		if($v->summ==0 or $v->summ2==0){
			
		}else{
			echo "<span class='ui-icon ui-icon-arrowstop-1-s'></span>Снижение ". abs((($v->summ2/$v->summ)*100)-100) . "%<br>";
		}
		if(!$v->winner){
			echo "<span class='ui-icon ui-icon-gear'></span><span class='in_progress'>Процедура в процессе</span><br>";
		}else{
			echo "Победитель: <b>". $v->winner ."</b><br>";
		}
		echo "<div class='change_inf'><a href=/page/change_info?id=$v->id>изменить</a></div></div>";
}else{
		echo "<div class='luck'>";
		echo "<div class='nstitle'>".$v->title ."</div><br>";
		echo "<span class='ui-icon ui-icon-comment'></span>".$v->comment."<br>";
		echo "<div class='manager'><span class='ui-icon ui-icon-person'></span>".$v->manager ."</div>";
		echo "НМЦ ".$v->summ ."<br>";
		if($v->summ2==0){
			echo "Предложение <b>не было подано</b><br>";
			}else{
		echo "Предложение ".$v->summ2. "<br>";
				}
		if($v->summ==0 or $v->summ2==0){
		}else{
			echo "<span class='ui-icon ui-icon-arrowstop-1-s'></span>Снижение ". abs((($v->summ2/$v->summ)*100)-100) ."%<br>";
		}
		echo "Выигрыш с суммой ". $v->sum2win ."<br>";
		if(!$v->winner){
			echo "<span class='ui-icon ui-icon-gear'></span><span class='in_progress'>Процедура в процессе</span><br>";
		}else{
			echo "Победитель: <b>". $v->winner ."</b><br>";
		}
		echo "<div class='change_inf'><a href=/page/change_info?id=$v->id>изменить</a></div></div>";
	}

}
endforeach;

?></div>
<h3>Отчет ООО "Юго-Запад"</h3>
<div class='group2'>
<?
foreach($this->res as $v):

	if($v->ip==1 or $v->ip==0){
		continue;
		
	}else{
		//if(!$v->title or !$v->manager or !$v->comment){ echo "Нет данных"; }else{}
		if($v->status=='1'){
		echo "<div class='fail'>";
		echo "Тендер проигран или отклонен!<br>";
		echo "<div class='nstitle'>".$v->title ."</div><br>";
		echo "<span class='ui-icon ui-icon-comment'></span>".$v->comment."<br>";
		echo "<div class='manager'><span class='ui-icon ui-icon-person'></span>".$v->manager ."</div>";
		echo "НМЦ ".$v->summ ."<br>";
		if($v->summ2==0){
			echo "Предложение <b>не было подано</b><br>";
			}else{
		echo "Предложение ".$v->summ2. "<br>";
				}
		if($v->summ==0 or $v->summ2==0){
		}else{
			echo "<span class='ui-icon ui-icon-arrowstop-1-s'></span>Снижение ". abs((($v->summ2/$v->summ)*100)-100) ."%<br>";
		}
		if(!$v->winner){
			echo "<span class='ui-icon ui-icon-gear'></span><span class='in_progress'>Процедура в процессе</span><br>";
		}else{
			echo "Победитель: <b>". $v->winner ."</b><br>";
		}
		echo "<div class='change_inf'><a href=/page/change_info?id=$v->id>изменить</a></div></div>";
}else{
		echo "<div class='luck'>";
		echo "<div class='nstitle'>".$v->title ."</div><br>";
		echo "<span class='ui-icon ui-icon-comment'></span>".$v->comment."<br>";
		echo "<div class='manager'><span class='ui-icon ui-icon-person'></span>".$v->manager ."</div>";
		echo "НМЦ ".$v->summ ."<br>";
		if($v->summ2==0){
			echo "Предложение <b>не было подано</b><br>";
			}else{
		echo "Предложение ".$v->summ2. "<br>";
				}
		if($v->summ==0 or $v->summ2){
		}else{
			echo "<span class='ui-icon ui-icon-arrowstop-1-s'></span>Снижение ". abs((($v->summ2/$v->summ)*100)-100) ."%<br>";
		}
		echo "Выигрыш с суммой ". $v->sum2win ."<br>";
		if(!$v->winner){
			echo "<span class='ui-icon ui-icon-gear'></span><span class='in_progress'>Процедура в процессе</span><br>";
		}else{
			echo "Победитель: <b>". $v->winner ."</b><br>";
		}
		echo "<div class='change_inf'><a href=/page/change_info?id=$v->id>изменить</a></div></div>";
		
	}

	}
endforeach;

?>
</div>

<h3>Отчет ИП</h3>
<div class='group3'>
<?
foreach($this->res as $v):
if($v->ip==0 or $v->ip==2){
		continue;
	}else{
		
		//month auction start
		
		if($v->status=='1'){
		echo "<div class='fail'>";
		echo "Тендер проигран или отклонен!<br>";
		echo "<div class='nstitle'>".$v->title ."</div><br>";
		echo "<span class='ui-icon ui-icon-comment'></span>".$v->comment."<br>";
		echo "<div class='manager'><span class='ui-icon ui-icon-person'></span>".$v->manager."</div>";
		echo "НМЦ ".$v->summ ."<br>";
		if($v->summ2==0){
			echo "Предложение <b>не было подано</b><br>";
			}else{
				echo "Предложение ".$v->summ2. "<br>";
				}
		if(!$v->winner){
			echo "<span class='ui-icon ui-icon-gear'></span><span class='in_progress'>Процедура в процессе</span><br>";
		}else{
			echo "Победитель: <b>". $v->winner ."</b><br>";
		}
		if($v->summ==0 or $v->summ2==0)
		{	$v->summ=1;
			$v->summ2=1;
		if($v->summ==0 or $v->summ2==0){
			
		}else{
			echo "<span class='ui-icon ui-icon-arrowstop-1-s'></span>Снижение ". abs((($v->summ2/$v->summ)*100)-100) ."%<br>";
		}
		}
	
		echo "<div class='change_inf'><a href=/page/change_info?id=$v->id>изменить</a></div></div>";
}else{
		echo "<div class='luck'>";
		echo "<div class='nstitle'>".$v->title ."</div><br>";
		echo "<span class='ui-icon ui-icon-comment'></span>".$v->comment."<br>";
		echo "<div class='manager'><span class='ui-icon ui-icon-person'></span>".$v->manager ."</div>";
		echo "НМЦ ".$v->summ ."<br>";
		if($v->summ2==0){
		echo "Предложение <b>не было подано</b><br>";
			}else{
		echo "Предложение ".$v->summ2. "<br>";
				}
		//echo "Снижение ". $v->summ2/$v->summ."%<br>";
		echo "Выигрыш с суммой ". $v->sum2win ."<br>";
		if(!$v->winner){
			echo "<span class='ui-icon ui-icon-gear'></span><span class='in_progress'>Процедура в процессе</span><br>";
		}else{
			echo "Победитель: <b>". $v->winner ."</b><br>";
		}

	if($v->summ==0 or $v->summ2==0)
	{	
		
	}else{
		echo "<span class='ui-icon ui-icon-arrowstop-1-s'></span>Снижение ". @abs((($v->summ2/$v->summ)*100)-100) ."%<br>";
	}
		echo "<div class='change_inf'><a href=/page/change_info?id=$v->id>изменить</a></div></div>";
	}
		//end

	}

endforeach;/**/
?>
</div>
</div> <!--accordion ends -->




<div class='commonstat'>
<?
foreach($this->res as $v):
	@$sumNmc+= $v->summ;
	@$sumProp+=$v->summ2;
endforeach;
	echo "Сумма НМЦ ". $sumNmc."<br>";
	echo "Сумма Участий ". $sumProp."<br>";
	
foreach($this->tender_cnt as $ten_cnt):
	
	foreach($ten_cnt as $cnt):
	echo 'Тендеров за месяц: '. $cnt .'<br>';
	endforeach;
endforeach;
?>


<a href='/page/download_report?date1=<?=$this->report_date[0]?>&date2=<?=$this->report_date[1]?>' class='ui-icon-document-b button'>создать отчет</a>
</div>	
</div> <!-- wrapper end-->