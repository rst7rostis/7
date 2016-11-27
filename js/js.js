$(document).ready(function(){

	manager = [
	$('div').find( ":contains('Воробьев')" ), 
	$('div').find( ":contains('Гусанов')" ), 
	$('div').find( ":contains('Бяшаров')" ), 
	$('div').find( ":contains('Ёу')" ), 
	$('div').find( ":contains('Блохин')" ), 
	$('div').find( ":contains('Ковалевский')" ), 
	$('div').find( ":contains('Седенкова')" ), 
	$('div').find( ":contains('Язвенко')" ), 
	$('div').find( ":contains('Ясинский')" )
	];	

	btn = $('input[name="managfind"]');
	inpval = $('input[name="txtmanag"]').val();
	
	btn.click(function(){
			console.log(inpval);
	})
	
})





