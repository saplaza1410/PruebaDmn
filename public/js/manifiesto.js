$(function() {
		$.fn.dataTable.ext.errMode = 'throw';
			var table = $('#dataTable').DataTable({
	        "processing": true,
	        "serverSide": true,
	        "ajax": "lista-manifiesto/"+0,
	        "columns":[
	          {data:'fecha_nomina',name:'fecha_nomina'},
	          {data:'repartidor_nombre', name:'repartidor_nombre'},
	          {data:"camion_nombre",name:'camion_nombre'},
	          {data:'finca_nombre',name:'finca_nombre'},
	          {data:'cantidad_lotes',name:'cantidad_lotes'},
	          {data:'cantidad_lotes_entregados',name:'cantidad_lotes_entregados'},
	          {data:'cantidad_lotes_devuelto',name:'cantidad_lotes_devuelto'},
	          {data:'created_at',name:'created_at'}
	        ],
	          "language": {
	              "url": "DataTables/Spanish.json"
          },
          
        });

		$( "#buscar" ).on( "click", function() {
			var new_url = 'lista-manifiesto/'+$("#repartidor").val();
		    table.ajax.url(new_url).load()
		  $.ajax({
		    type: "GET",
		    url: "nomina-manifiesto/"+$("#repartidor").val(),
		    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		    error: function(jqXhr, json, errorThrown){// this are default for ajax errors 
		        
		        var errors = jqXhr.responseJSON;
		        var errorsHtml = '';
		    },
		    success: function(result) {
		      var data = JSON.parse(result);
				console.log(data)
				$("#total_base").val(data[0].total_manifiesto);
				$("#total_lotes_entre").val(data[0].total_cantidad_lotes_entregados);
				$("#total_lotes_devuel").val(data[0].total_cantidad_lotes_devuelto);
				
				var total_pagar = (parseInt(data[0].total_manifiesto) + parseInt(data[0].total_cantidad_lotes_entregados)) - parseInt(data[0].total_cantidad_lotes_devuelto);
				
				if (total_pagar > 0) {
					$("#total_pagar").val(total_pagar);
				}else{
					$("#total_pagar").val(data[0].total_manifiesto);
				}
				
		      
		    }
		  });
		});
});