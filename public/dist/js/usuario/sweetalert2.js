//Swall Alert 2

const swal = $(".swal").data("swal");

if (swal) {
  Swal.fire({
    text: swal,
    title: "Registro Correcto",
    icon: "success"
  })
}

$(document).on("click", ".eliminar", function (e) {
  e.preventDefault();
  const href = $(this).attr('href');
  
  Swal.fire({
    title: "Esta usted seguro?",
    text: "No se podrá recuperar luego!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, quiero eliminarlo!",
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
      Swal.fire("Eliminado!", "El usurio ha sido eliminado.", "success");
    }
  })
})
