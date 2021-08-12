<script>

    function listCountries(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{API('list_countries')}}", data, function(response){
            $('#countriesTable').html(response).find('table').DataTable(dataTablePresets('normal'));
            Swal.close();
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }

</script>