<script>

    function listGlobal(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{API('list_global')}}", data, function(response){
            $('#globalTable').html(response).find('table').DataTable(dataTablePresets('normal'));
            Swal.close();
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }

</script>