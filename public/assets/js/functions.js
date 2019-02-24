$(document).ready(function () {
    let soma = 0;
    $('#titleCadastro').html('Cadastro de Vendas!');
    $('#titleShow').html('Lista do cliente');
    $('#titleIndex').html('Lista de Vendas!');

    $('h2').animate({
        fontSize: '3em',
    }, 2000, function () {
        $(this).css('color', 'blue');
    });

    $('#btnAdd').click(function () {
        if ($('#produto').val() === '' ||
            $('#preco').val() === '') {
            $('#erros').html('<strong>Os campos produto ou preço não podem ser vazios!</strong>')
                .css('color', 'red');
            return false;
        } else {
            $('#erros').html('');
            let produto = $('#produto').val();
            let preco = $('#preco').val();
            $('table').prepend('<tr><br><th scope="col"> #</th>' +
                '<td> ' + produto + '</td><br>' +
                '<td> ' + preco + '</td><br>' +
                '</tr><br>');
            $('#form-hidden').prepend('<input type="hidden" name="produto[]" value="' + produto + '" /><br>' +
                '<input type="hidden" name="preco[]" value="' + preco + '" />');
            soma += parseFloat(preco);
            $(':input[name=total]').val(soma);

            $('#produto').val('');
            $('#preco').val('');
        }
    });

    $('#excluir').click(function () {
        $('#titleIndex').html('Funcionalidade não implementada!');
    });

    $('#title').css('color', 'red');

});