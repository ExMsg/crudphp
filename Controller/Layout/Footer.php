<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- Jquery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/sc-2.0.7/sp-2.0.2/datatables.min.js"></script>
<script>
    
    $(document).ready(function(){
        $("#myTable").DataTable();
    });

    function submitData(action) {

        $(document).ready(function(){
            var data = {
                action: action,
                id: $("#IDMahasiswa").val(),
                nim: $("#NimMahasiswa").val(),
                nama: $("#NamaMahasiswa").val(),
                prodi: $("#ProdiMahasiswa").val(),
                jenisKelamin: $("#JenisKelaminMahasiswa").val(),
                notelp: $("#TelpMahasiswa").val()
            };

            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: data,
                success: function(response){
                    alert(response);
                }
            });
        });
    }
</script>
</body>
</html>