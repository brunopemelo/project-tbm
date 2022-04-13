$("#atualizar_pessoa").submit(function() {
    event.preventDefault();
    var formData = new FormData(this);
    var base_url = $('#BASE_URL').val();

    $.ajax({
        url: "./php/editar_pessoa.php",
        type: "POST",
        data: formData,
        dataType: 'json',

        success: function(mensagem) {
            if (mensagem == 'SUCCESS') {
                window.location.href = base_url + "/listar.php" + mensagem;
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });
});