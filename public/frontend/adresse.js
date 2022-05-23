$(document).ready(function() {
    $('#cep').focusout(function() {
        var cep = $('#cep').val();
        cep = cep.replace("-", "");
        var urlstr = "https://viacep.com.br/ws/" + cep + "/json/";
        $.ajax({
            url: urlstr,
            method: "GET",
            dataType: "json",
            success: function(data) {
                $("#cidade").val(data.localidade);
                $("#bairro").val(data.bairro);
                $("#rua").val(data.logradouro);
                $("#estado").val(data.uf);

            },
            error: function() {
                console.log('le cep est invalid');
            }
        });
    });
});