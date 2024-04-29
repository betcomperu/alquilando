function mostrarVentanaModal2( nombreinquilino, nombreinmueble, numero_operacion, monto, entidad_bancaria, fecha_pago, id_inmueble, id_usuario, detalle) {
    // Construir el mensaje personalizado
    var mensaje = "👋🏼¡Hola! " + nombreinmueble + "🌟\n No olvides realizar el pago de alquiler 🏠 " + "S/" + monto + " correspondiente al mes. " + nombreinquilino + ". ⏱️💶\n" + "Agradezco mucho tu puntalidad!.🫂\n Saludos cordiales!🤝🏻";

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
        preConfirm: () => {
            // Copiar el contenido al portapapeles
            navigator.clipboard.writeText(mensaje)
                .then(() => Swal.fire('¡Contenido copiado al portapapeles!', '', 'success'))
                .catch(err => console.error('Error al copiar el contenido:', err));
        }
    });
}

function mostrarVentanaModal( nombreinquilino, nombreinmueble, numero_operacion, monto, entidad_bancaria, fecha_pago, id_inmueble, id_usuario, detalle) {
    // Construir el mensaje personalizado
    var mensaje = "👋🏼¡Hola! "; 

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
        preConfirm: () => {
            // Copiar el contenido al portapapeles
            navigator.clipboard.writeText(mensaje)
                .then(() => Swal.fire('¡Contenido copiado al portapapeles!', '', 'success'))
                .catch(err => console.error('Error al copiar el contenido:', err));
        }
    });
}
