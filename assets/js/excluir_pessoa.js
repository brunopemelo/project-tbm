function excluir_pessoa(id_excluir) {
    var base_url = $('#BASE_URL').val();
    
    $.ajax({
        url: base_url + "/php/excluir_pessoa.php",
        type: "POST",
        data: {
            id: id_excluir,
        },
        dataType: 'json',
        success: function(mensagem) {
            if (mensagem == 'SUC_DEL') {
                window.location.href = base_url + "/listar.php?msg=" + mensagem;
            }
        },
    });
}