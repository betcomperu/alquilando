function mostrarVentanaModal(nombreInquilino, nombreInmueble, numero_operacion, monto, entidad_bancaria, fecha_pago, detalle, estadoPago) {
    var mensaje;

    if (estadoPago === 'pagado') {
        mensaje = "🌟¡Hola! " + nombreInquilino +", ¡Tu pago ha sido verificado!"+
            "🌟\n 🗓️ Con el numero de operación: " + numero_operacion +" | "+ entidad_bancaria +
            " \n ⏱️ y con fecha de abono: " + fecha_pago + "\n  👉🏼 " + detalle + ". 💶\n" +
            "✨ ¡Agradezco mucho tu puntualidad!.🫂\n Saludos cordiales 🤝🏻";
    } else {
        mensaje = "👋🏼¡Hola! " + nombreInquilino +
            "🌟\n 🗓️ No olvides realizar el pago de alquiler 🏠 de: " + nombreInmueble +
            "\n ⏱️ con fecha de vencimiento: " + fecha_pago +"\n 👉🏼"+ detalle + "Cuyo monto es: S/" + monto + ". 💶\n" +
            "✨ ¡Agradezco mucho tu puntualidad!.🫂\n Saludos cordiales 🤝🏻";
    }

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
    });

    var clipboard = new ClipboardJS('#copiarContenido', {
        text: function() {
            return mensaje;
        }
    });

    clipboard.on('success', function(e) {
        Swal.fire('¡Contenido copiado al portapapeles!', '', 'success');
        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        Swal.fire('Error al copiar el contenido al portapapeles', '', 'error');
    });
}
