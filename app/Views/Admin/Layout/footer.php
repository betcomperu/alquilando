<footer class="main-footer">
  <strong>Copyright &copy; 2014-2022 <a href="https://todalapc.com">TODALAPC</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>


<!-- page script -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    src = "https://code.jquery.com/jquery-3.7.0.js"
</script>
<script>
    src = "https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"
</script>
<script>
    src = "https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"
</script>
<script>
    src = "https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"
</script>


<!-- my Sweet Alert 2 -->
<script src="/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="/dist/js/usuario/sweetalert2.js"></script>

<script>
    
    var table = $('#tabla1').DataTable({

        
        "dom": 'Bfrtip',
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": [
            'pageLength',
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        
        
        "lengthMenu": [
            [10, 25, 50, -1],
            ['10 Resultados', '25 Resultados', '50 Resultados', 'Motrar Todos']
        ],
        "buttons": {
            "pageLength": {
                _: "Mostrar %d Registros"
            }
        },
        "language": {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Documentos",
            "infoEmpty": "Mostrando 0 to 0 of 0 Documentos",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Documentos",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        
        
    });
</script>

</body>

</html>