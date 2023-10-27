$(".tablaPartidas").DataTable({
	
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
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

/*EDITAR PARTIDAS*/

$(".tablaPartidas").on("click", ".btnEditarPartida", function(){
	var id = $(this).attr("idPartida");

	console.log(id);
	var datos = new FormData();
	
	datos.append("id", id);
	
	$.ajax({
		url:"ajax/partidas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

            $('input[name="partida_idE"]').val(respuesta["id"]);
            $('input[name="nombreE"]').val(respuesta["nombre"]);
			$('input[name="fechaE"]').val(respuesta["fech_nac"]);
			$('input[name="gradoE"]').val(respuesta["grado_id"]);
            $('input[name="seccionE"]').val(respuesta["secciones_id"]);
            $('input[name="madreE"]').val(respuesta["nombre_madre"]);
            $('input[name="padreE"]').val(respuesta["nombre_padre"]);

		},
		error: function(){
			console.log('error');
		}
	})
})












/**ELIMINAR roles */

/*$(document).on("click", ".eliminarRol", function(){

	var idRolEl = $(this).attr("idRolesE");
	
	
	swal({
		title: '¿Está seguro de eliminar este rol?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar rol!'
	}).then(function(result){


		if (result.value) {

			var datos = new FormData();
			datos.append("idRolE", idRolEl);
			
			

			$.ajax({

				url: "ajax/roles.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success:function (respuesta) {

					console.log(respuesta);

					if (respuesta == "ok") {
						swal({
							type: "success",
							title: "¡CORRECTO!",
							text: "El rol ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {

							if (result.value){

								window.location = "roles";
								
                     }
                })

             }

          }

        })

      }

    })

})*/