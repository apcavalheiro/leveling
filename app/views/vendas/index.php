<div class="container">
    <div class="row">
        <a href="/vendas/cadastro" class="btn btn-primary pull-right">
            <i class="glyphicon glyphicon-plus-sign"></i>
            Nova venda</a> </div>
</div>
<div class="container">
    <div class="starter-template">
        <h2 id="titleIndex"></h2>
        <?php if ($Session::getSession('success')) {?>
        <?php foreach ($Session::getSession('success') as $message) {?>
        <div class="alert alert-success" role="alert" id="notice">
            <i class="glyphicon glyphicon-ok-sign"></i>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?=$message;?></strong>
        </div>
        <?php }?>
        <?php }?>
        <?php if ($Session::getSession('errors')) {?>
        <?php foreach ($Session::getSession('errors') as $message) {?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <i class="glyphicon glyphicon-ban-circle"></i>
            <strong><?=$message;?></strong>
        </div>
        <?php }?>
        <?php }?>
        <!-- Listagem das vendas -->
        <?php if (empty($viewVar['item'])) {?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <i class="glyphicon glyphicon-ban-circle"></i>
            <strong>Nenhuma venda efetuada!</strong>
        </div>
        <?php
} else {?>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <h3 id="msg"></h3>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php $qtdNome = count($viewVar['item']['nome'])?>
            <?php for ($i = 0; $i < $qtdNome; $i++) {?>
            <tr>
                <td>
                    <?=$viewVar['item']['vendas'][$i]['id'];?> </td>
                <td>
                    <?php echo $viewVar['item']['nome'][$i]['nome']; ?> </td>
                </td>
                <td>
                    <?=$viewVar['item']['vendas'][$i]['preco'];?>
                </td>
                </td>
                <td>
                    <a href="/vendas/show/<?php echo $viewVar['item']['vendas'][$i]['id']; ?>"
                        class="btn btn-info btn-sm">Detalhes</a>
                    | <button id="excluir" class="btn btn-danger btn-sm">Deletar</button>
                </td>
            </tr>
            <?php }?>
            <?php }?>
        </table>
    </div>
</div>
</div>