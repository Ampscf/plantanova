
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

$("#check").click(function() {  
					    
					        if (document.getElementById("check").checked) {
					           document.getElementById("divinjerto").style.display = "block";
					        }
					        else {
					            document.getElementById("divinjerto").style.display = "none";
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

	//Funciones para cambiar las ventanas de los pedidos y marcar la ventana activa
	$("#nuevo").click(function(event) {
			$('#nuevo').addClass('active');
			$('#embarcado').removeClass('active');
			$('#proceso').removeClass('active');
            $("#area").load(site_url + 'breakdown/pedido_nuevo');
    });

	$("#proceso").click(function(event) {
			$('#nuevo').removeClass('active');
			$('#embarcado').removeClass('active');
			$('#proceso').addClass('active');
            $("#area").load(site_url + 'breakdown/pedido_proceso');
    });

	$("#embarcado").click(function(event) {
			$('#nuevo').removeClass('active');
			$('#embarcado').addClass('active');
			$('#proceso').removeClass('active');
            $("#area").load(site_url + 'breakdown/pedido_embarcado');
    });
		
	
	//Obtiene los subtipos de sustrato para cargar dinamicamente el control select de semillas
	function get_subtype($id_sustratum)
	{
		if($("#sustratum [value='-1']").length)
		{
			$("#sustratum [value='-1']").remove();
		}
		$.ajax({
			url: site_url + 'order/get_subtype',
			data: {'sustratum':$id_sustratum},
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

	function get_type($value,$id_order)
	{
		$.ajax({
			url: site_url + 'seeds/get_type',
			data: {'value':$value,
					'id_order':$id_order},
			type: "POST",
			success: function(data){
				$("#seed_name").html(data);
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
    
	function register_seeds()
	{
		form = $("#register_seeds");
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
					notas("Orden Registrada!.","success");
					window.location ="../seeds/index";
					
				}
			},
			failure:function(data){
				notas("Error en el registro","error");
			}
		});
	}

	function updateseeds()
	{
		form = $("#update_seeds");
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
					notas("Cuenta editada!.","success");
					window.location ="../index";
				}
			},
			failure:function(data){
				notas("Error en el registro","error");

			}
		});
	}

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

	function insert_breakdown(){
		 
		var sustratum=document.getElementById("sustratum").value;
		var subtype=document.getElementById("subtype").value;
		var variety=document.getElementById("variety").value;
		var rootstock=document.getElementById("rootstock").value;
		var volume=document.getElementById("volume").value;

		 $.ajax({
			url: site_url + 'order/insert_breakdown',
			data: {'id_sustratum':+sustratum},
			type: "POST",
			success: function(data){
				alert(data);
			},
			failure:function(data){
				alert("fallo");
			}
			});
	}


	

	