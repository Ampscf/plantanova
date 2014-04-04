
	//Maneja el cambio de tabs para mostrar datos actualizados
	$('.nav-tabs li a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	    var tipo = $(this).attr("href");
		$.ajax({
			url: base_url + 'order_controller/orders_state',
			data: {'tipo':tipo},
			type: "POST",
			success: function(data){
				$(".tab-content").html(data);

				// var n = noty({text: 'Cambio exitoso de pestañá',
				// 	layout:'topCenter',
				// 	type:'Success'});
			},
			failure:function(data){
				
			}
		});
		e.preventDefault();
	 });


	function get_subtype(value)
	{
		if($("#sustratum [value='-1']").length)
		{
			$("#sustratum [value='-1']").remove();
		}
		$.ajax({
			url: base_url + 'order_controller/get_subtypes',
			data: {'sustratum':value},
			type: "POST",
			success: function(data){
				$("#subtype").html(data);
			},
			failure:function(data){
				
			}
		});
	}