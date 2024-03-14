//Swall Alert 2

const swal = $(".swal").data("swal");

if (swal) {
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'El registro ha sido grabado',
    showConfirmButton: false,
    timer: 1500
  })
}

//ELIMINACIÓN DE USUARIOS CONDICIONAL AL ADMIN

$(document).on("click", ".eliminar", function (e) {
  e.preventDefault();
  var href = $(this).attr("href"); // Obtener el atributo href del enlace

  var userId = href.split('/').pop(); // Extraer el idusuario de la URL

  // Verificar si el idusuario es igual a "1" (Admin)
  if (userId === "1") {
      Swal.fire("Acción no permitida", "No se puede eliminar al usuario Admin", "error");
      return; // Detener el proceso
  }

  Swal.fire({
      title: "¿Está usted seguro?",
      text: "No se podrá recuperar luego!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, quiero eliminarlo!",
  }).then((result) => {
      if (result.value) {
          setTimeout(function () {
              document.location.href = href;
          }, 2000); // Retraso de 500 milisegundos (0.5 segundos)
          Swal.fire("Eliminado!", "El usuario ha sido eliminado.", "success");
      }
  });
});


//DETERMINAR NO EDITAR ADMIN NI AGREGARLE PAGO

$(document).on("click", ".nopagar", function (e) {
  e.preventDefault();
  var href = $(this).attr("href"); // Obtener el atributo href del enlace

  var userId = href.split('/').pop(); // Extraer el idusuario de la URL

  // Verificar si el idusuario es igual a "1" (Admin)
  if (userId === "1") {
      Swal.fire("Acción no permitida", "No se puede eliminar al usuario Admin", "error");
      return; // Detener el proceso
  }

  Swal.fire({
      title: "¿Está usted seguro?",
      text: "No se podrá recuperar luego!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, quiero eliminarlo!",
  }).then((result) => {
      if (result.value) {
          setTimeout(function () {
              document.location.href = href;
          }, 2000); // Retraso de 500 milisegundos (0.5 segundos)
          Swal.fire("Eliminado!", "El usuario ha sido eliminado.", "success");
      }
  });
});


