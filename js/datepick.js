	$(document).ready(function(){
		$.datepicker.setDefaults( $.datepicker.regional[ "RU" ] );
		$('input[name=date_start]').datepicker({
			  appendText: "(yyyy-mm-dd)",
			  dateFormat: "yy-mm-dd",
			  yearRange: "2015:2016",
			  monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
			"Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
			monthNamesShort: [ "Янв.", "Февр.", "Мар.", "Апр.", "Май", "Июнь", "Июль", "Авг.", "Сент.", "Окт.", "Нояб.", "Дек" ],
			dayNames: [ "Воскресение", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
			dayNamesShort: [ "Воскр.", "Пон.", "Вт.", "Сред.", "Чет.", "Пят.", "Субб." ], 
			dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
			defaultDate: 1,
			minDate: new Date(2016, 7 - 1, 1),
			showOtherMonths: true,
			  firstDay: 1
			});
		$('input[name=date_end]').datepicker({
			  appendText: "(yyyy-mm-dd)",
			  dateFormat: "yy-mm-dd",
			  yearRange: "2015:2016",
			  monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
			"Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
			  monthNamesShort: [ "Янв.", "Февр.", "Мар.", "Апр.", "Май", "Июнь", "Июль", "Авг.", "Сент.", "Окт.", "Нояб.", "Дек" ],
			dayNames: [ "Воскресение", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
			dayNamesShort: [ "Воскр.", "Пон.", "Вт.", "Сред.", "Чет.", "Пят.", "Субб." ], 
			dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
			defaultDate: 1,
			minDate: new Date(2016, 7 - 1, 1),
			showOtherMonths: true,
			  firstDay: 1
			});
			
			$("input[name='auction_date']").datepicker({
			  dateFormat: "yy-mm-dd",
			  yearRange: "2015:2016",
			  monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
			"Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
			  monthNamesShort: [ "Янв.", "Февр.", "Мар.", "Апр.", "Май", "Июнь", "Июль", "Авг.", "Сент.", "Окт.", "Нояб.", "Дек" ],
			dayNames: [ "Воскресение", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
			dayNamesShort: [ "Воскр.", "Пон.", "Вт.", "Сред.", "Чет.", "Пят.", "Субб." ], 
			dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
			defaultDate: 1,
			minDate: new Date(2016, 7 - 1, 1),
			showOtherMonths: true,
			  firstDay: 1
			});
			
			$('input[name=date_start]').datepicker( "getDate" );
			$('input[name=date_end]').datepicker( "getDate" );
			$("input[name='auction_date']").datepicker( "getDate" );
	})