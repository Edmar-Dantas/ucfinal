$('#abrir-modal').on('click', function() {
    $.ajax({
        url: '{{ route('buscar.dados') }}',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Atualize a modal com os dados recebidos
            $('#modal-conteudo').html(response.dados);
            $('#modal').modal('show');
        },
        error: function() {
            alert('Erro ao buscar dados.');
        }
    });
});
