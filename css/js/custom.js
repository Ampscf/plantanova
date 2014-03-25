
	//Maneja el cambio de tabs para mostrar datos actualizados
	$('.nav-tabs li a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	    var tipo = $(this).attr("href");
		$.ajax({
			url: base_url + 'order_controller/estado_pedidos',
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