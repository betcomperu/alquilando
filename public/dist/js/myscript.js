
    function mostrarVentanaModal(nombreInquilino, nombreInmueble, numero_operacion, monto, entidad_bancaria, fecha_pago, detalle) {
        // Construir el mensaje personalizado
        var mensaje = "👋🏼¡Hola! " + nombreInquilino +
         "🌟\n No olvides realizar el pago de alquiler 🏠 " +
         "de: "+nombreInmueble + " correspondiente al mes. \n Cuyo monto es:"+
          "S/" + monto + ". ⏱️💶\n" +
           "¡Agradezco mucho tu puntualidad!.🫂\n Saludos cordiales 🤝🏻";

        // Mostrar la ventana modal con SweetAlert2
        Swal.fire({
            title: 'Mensaje',
            html: mensaje,
            showCloseButton: true,
            showConfirmButton: false,
            allowOutsideClick: false,
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#d33',
            focusCancel: true,
            footer: '<button class="btn btn-info" id="copiarContenido">Copiar Contenido</button>'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si se confirma, puedes realizar alguna acción adicional aquí
            }
        });

        // Configurar Clipboard.js para copiar el texto cuando se haga clic en el botón de copiar
        var clipboard = new ClipboardJS('#copiarContenido', {
            text: function() {
                return mensaje;
            }
        });

        // Manejar eventos de éxito y error de Clipboard.js
        clipboard.on('success', function(e) {
            Swal.fire('¡Contenido copiado al portapapeles!', '', 'success');
            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            Swal.fire('Error al copiar el contenido al portapapeles', '', 'error');
        });
    }


