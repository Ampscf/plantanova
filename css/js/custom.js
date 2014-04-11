
	//Maneja el cambio de tabs para mostrar datos actualizados de ordenes
	$('.nav-tabs li a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	    var tipo = $(this).attr("href");
		$.ajax({
			url: base_url + 'order/orders_status',
			data: {'tipo':tipo},
			type: "POST",
			success: function(data){
				$(".tab-content").html(data);
			},
			failure:function(data){
				
			}
		});
		e.preventDefault();
	 });
	
	
	//Inicializa el datatable para ordenado y busqueda
	// $("#orders-table").dataTable({
		
	// });
		
	
	//Obtiene los subtipos de sustrato para cargar dinamicamente el control select de semillas
	function get_subtype(value)
	{
		if($("#sustratum [value='-1']").length)
		{
			$("#sustratum [value='-1']").remove();
		}
		$.ajax({
			url: base_url + 'order/get_subtypes',
			data: {'sustratum':value},
			type: "POST",
			success: function(data){
				$("#subtype").html(data);
			},
			failure:function(data){
				
			}
		});
	}
	
	
	//Obtiene las ciudades por estado dinamicamente para el control select de registro cliente
	function get_towns($id_state)
	{
		if($("#state [value='-1']").length)
		{
			$("#state [value='-1']").remove();
		}
		
		$.ajax({
			url: base_url + 'order/get_towns',
			data: {'id_state':$id_state},
			type: "POST",
			success: function(data){
				$("#town").html(data);
			},
			failure:function(data){
				
			}
		});
	}


	function register_client(coment,typee,layoute)
	{
		var n = noty({
			text: coment,
			layout: layoute,
			type:typee
		});
	}
