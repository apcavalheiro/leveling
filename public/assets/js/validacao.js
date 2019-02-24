$(document).ready(function () {
    $("form").validate({
        rules: {
            total: {
                required: true
            },
            nome: {
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        messages: {
            total: {
                required: "A lista de vendas não pode ser vazia!"
            },
            nome: {
                required: "Este campo não pode ser vazio!"
            }
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        number: "Entre com um número válido.",
        maxlength: "Não insira mais do que {0} caracteres"
    });

});

setTimeout(function () {
    $('#notice').fadeOut('fast');
}, 5000);