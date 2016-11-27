
	$(document).ready(function(){
		$( "#accordion" ).accordion({active: 0});		
			$( "#accordion" ).click(function(){
				$( this ).accordion( "option", "collapsible", true );
				if($( this ).accordion("option", "active")){
					$( this ).accordion( "option", "collapsible", true );
				}else{
					$( this ).accordion("option", "active");
				}
			});
	})
