$(document).ready(function () {
    $('#title').html('Cadastro de Vendas!');

    $('#title').animate({
        fontSize: '4em',
    }, 2000, function () {
        $(this).css('color', 'blue');
    });

    $('#btnAdd').click(function () {
        if ($('#produto').val() === ''
            || $('#preco').val() === '') {
            $('#erros').html('<p> Os campos produto ou preço não podem ser vazios!</p>')
                .css('color', 'red');
            return false;
        } else {
            $('#erros').html('');
            let soma = 0;
            let produto = $('#produto').val();
            let preco = $('#preco').val();
            $('table').append('<tr><br><th scope="col"> #</th>'
                + '<td> ' + produto + '</td><br>'
                + '<td> ' + preco + '</td><br>'
                + '</tr><br>');

            soma = soma + parseFloat(preco);
            $(':input[name=total]').val(soma);

            $('#produto').val('');
            $('#preco').val('');
        }

    });

    $('#btnAdd').click(function () {

    });
    $('#title').css('color', 'red');

});


