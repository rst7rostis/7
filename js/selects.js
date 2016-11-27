	$(document).ready(function(){
		
		$( "select[name='month']" ).selectmenu().selectmenu( "menuWidget" ).addClass( "overflow" );
		$( "select[name='suply']" ).selectmenu().selectmenu( "menuWidget" ).addClass( "overflow" );
		$( "select[name='manager']" ).selectmenu().selectmenu( "menuWidget" ).addClass( "overflow" );
		$( "select[name='organization']" ).selectmenu().selectmenu( "menuWidget" ).addClass( "overflow" );
		$( "input[type='submit']" ).button();
		$( ".button" ).button();
		$( "ul" ).menu();
		$(document).tooltip();
		$( ".dialog" ).dialog();
		$("input[name='auction_date']").hide();
		$("select[name='atime']").hide();
		$("select[name='amins']").hide();
		$(".hide_show_button").hide();
		
		$('.show_panel').click(function(){
			$('#tender_add').show();
			$('#create_report').show();
			$('.ten_search').show();
			$(this).hide();
			$('.hide_show_button').show();
		});		
		$('.hide_show_button').click(function(){
			$('#tender_add').hide();
			$('#create_report').hide();
			$('.ten_search').hide();
			$('.show_panel').show();
			$(this).hide();
		});
		
		$(function(){
		$('.current_trades_data').slimScroll({
        height: '400px',
		width: '600px'
		});
		});
	});
//})