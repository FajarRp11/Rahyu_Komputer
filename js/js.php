<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
<script src="vendor/select2/dist/js/select2.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });

    $(document).ready(function () {


        $('.select2-single').select2();

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder').select2({
            placeholder: "Select a Province",
            allowClear: true
        });

        // Select2 Multiple
        $('.select2-multiple').select2();
    })
</script>