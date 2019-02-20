<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3 id="titleShow"></h3>
            <?php if ($Session::getSession('errors')) {?>
            <?php foreach ($Session::getSession('errors') as $message) {?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="glyphicon glyphicon-ok-sign"></i>
                <strong>
                    <?=$message;?></strong>
            </div>
            <?php }?>
            <?php }?>
            <?php foreach ($viewVar['item'] as $item) {?>
            <h2><?=$item->getCliente()->getNome();?></h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produtos</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$item->getProduto();?></td>
                        <td><?=$item->getPreco();?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td>R$<?=dataToMoeda($item->getTotal());?></td>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="row">
                    <a href="/vendas/index" class="btn btn-primary btn-sm pull-right">
                        <i class="glyphicon glyphicon-arrow-left"></i>Voltar</a>
                </div>
                <?php }?>
            </div>
        </div>
    </div>