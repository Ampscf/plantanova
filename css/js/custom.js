
	$("table").DataTable({
		"sDom": 'T<"clear">lfrtip',
		"oTableTools": {
			"sSwfPath": base_url + "/media/swf/copy_csv_xls_pdf.swf"
		},
	    "oLanguage": {
	        "sProcessing":     "Procesando...",
	        "sLengthMenu":     "Mostrar _MENU_ registros",
	        "sZeroRecords":    "No hay registros",
	        "sEmptyTable":     "No hay registros",
	        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	        "sInfoEmpty":      "Mostrando 0 registros de 0",
	        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	        "sInfoPostFix":    "",
	        "sSearch":         "Buscar:",
	        "sUrl":            "",
	        "sInfoThousands":  ",",
	        "sLoadingRecords": "Cargando...",
	        "oPaginate": {
	            "sFirst":    "Primero",
	            "sLast":     "Último",
	            "sNext":     "Siguiente",
	            "sPrevious": "Anterior"
	        },
	        "oAria": {
	            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	        }
	    }
	});

	//Maneja el cambio de tabs para mostrar datos actualizados de ordenes
	$('.nav-tabs li a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	    var tipo = $(this).attr("href");
		$.ajax({
			url: site_url + 'order/orders_status',
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
		
	
	//Obtiene los subtipos de sustrato para cargar dinamicamente el control select de semillas
	function get_subtype(value)
	{
		if($("#sustratum [value='-1']").length)
		{
			$("#sustratum [value='-1']").remove();
		}
		$.ajax({
			url: site_url + 'order/get_subtypes',
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
			url: site_url + 'admin/get_towns',
			data: {'id_state':$id_state},
			type: "POST",
			success: function(data){
				$("#town").html(data);
			},
			failure:function(data){
				
			}
		});
	}
	
	function takeoff_cat_value()
	{
		if($("#category [value='-1']").length)
		{
			$("#category [value='-1']").remove();
		}
	}
	
	//Obtiene los datos de una empresa
	/*function get_companie_info($id_user)
	{
		if($("#companies [value='-1']").length)
		{
			$("#companies [value='-1']").remove();
		}
		$.ajax({
			url: site_url + 'order/get_companie_info',
			data: "fafavvgf",
			type: "POST",
			sucess: function(data){
				$("#p1").load(data);	
			},
			failure:function(data){
				
			}
		});
	}*/

	

	
		
		//obtiene la posicion de las compañias y manda el valor al controlador para cargarlo despues
		$("#companies").change(function(event) {
			
		 	var posicion=document.getElementById('companies').value;
           
           $.ajax({
			url: site_url + 'order/get_companie_info',
			data: {'id_companie':+posicion},
			type: "POST",
			success: function(data){
				$("#p1").html(data);
			},
			failure:function(data){
				alert("fallo");
			}
			});
        });
    

	function register_client()
	{
		form = $("#registry");
		$.ajax({
			url: form.attr('action'),
			data: form.serialize(),
			type: form.attr('method'),
			success: function(data){
				errno = JSON.parse(data);
				if(errno.msj == "Error")
				{
					$("#content").html(errno.template);
					notas(errno.errores,"error");
				}
				else
				{
					$("#content").html(errno.template);
					notas("Cuenta registrada!.","success");
					window.location ="list_clients";
				}
			},
			failure:function(data){
				notas("Error en el registro","error");
			}
		});
	}

	
	function update_client()
	{
		form = $("#update");
		$.ajax({
			url: form.attr('action'),
			data: form.serialize(),
			type: form.attr('method'),
			success: function(data){
				errno = JSON.parse(data);
				if(errno.msj == "Error")
				{
					$("#content").html(errno.template);
					notas(errno.errores,"error");
				}
				else
				{
					$("#content").html(errno.template);
					notas("Cuenta registrada!.","success");
					window.location ="../list_clients";
				}
			},
			failure:function(data){
				notas("Error en el registro","error");
			}
		});
	}


	function notas(coment,typee)
	{
		var n = noty({
			text: coment,
			layout: "topCenter",
			type: typee,
			timeout: 3500
		});
	}