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

            <h2><?=$viewVar['item']['nome'][0];?></h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produtos</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $qtd = count($viewVar['item']['vendas'])?>
                    <?php for ($i = 0; $i < $qtd; $i++) {?>
                    <tr>
                        <td><?=$viewVar['item']['vendas'][$i]['produto'];?></td>
                        <td><?=$viewVar['item']['vendas'][$i]['preco'];?></td>
                    </tr>
                    <?php }?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td>R$ <?=$viewVar['item']['total'][0];?></td>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <a href="/vendas/index" class="btn btn-primary btn-sm pull-right">
                    <i class="glyphicon glyphicon-arrow-left"></i>Voltar</a>
            </div>

        </div>
    </div>
</div>