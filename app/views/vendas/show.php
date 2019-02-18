<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Detalhes da venda</h3>
            <?php if ($Session::getSession('errors')) {?>
            <?php foreach ($Session::getSession('errors') as $message) {?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="glyphicon glyphicon-ok-sign"></i>
                <strong>
                    <?=$message;?></strong>
            </div>
            <?php
}?>
            <?php
}?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produtos</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$viewVar['item']->getProduto();?></td>
                        <td><?=$viewVar['item']->getPreco();?></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class=" col-md-3">
            <a href="/vendas/index; ?>" class="btn btn-info btn-sm">Voltar</a></div>
    </div>
</div>