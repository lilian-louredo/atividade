$(document).ready(function () {

    $("#cpf").mask('000.000.000-00', {reverse: true});
    $("#data_nascimento").mask("99/99/9999");
    $("#telefone").inputmask({
        mask: ["(99) 9999-9999", "(99) 99999-9999", ],
        keepStatic: true
    });

    $.getJSON('http://mendesepereira.neuroteks.com/entrevista/estados_cidades.json', function (data) {

        var options = '<option value="">escolha um estado</option>';

        $.each(data, function (key, val) {
            options += '<option value="' + val.nome + '">' + val.nome + '</option>';
        });
        $("#estados").html(options);

        $("#estados").change(function () {

            var options_cidades = '';
            var str = "";

            $("#estados option:selected").each(function () {
                str += $(this).text();
            });

            $.each(data, function (key, val) {
                if(val.nome == str) {
                    $.each(val.cidades, function (key_city, val_city) {
                        options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                    });
                }
            });

            $("#cidades").html(options_cidades);

        }).change();
    });
});
