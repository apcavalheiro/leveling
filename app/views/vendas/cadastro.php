<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php if ($Session::getSession('errors')) {?>
            <?php foreach ($Session::getSession('errors') as $message) {?>
            <div class="alert alert-danger" role="alert" id="notice">
                <i class="glyphicon glyphicon-ban-circle"></i>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?=$message;?></strong>
            </div>
            <?php
}?>
            <?php
}?>
        </div>
    </div>
    <div class="container">
        <form action="/vendas/salvar" method="post">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <th scope="row">R$</th>
                    <td>Total</td>
                    <td><input style="border:none" id="total" name="total" placeholder="R$ 00,00"></td>
                </tfoot>
            </table>
            <hr>
            <div class="form-group">
                <label for="nome">Cliente</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome..."
                    value="<?=$Session::getFormSession('nome')?>" required>
            </div>
            <div class="form-group">
                <label for="produto">Produto</label>
                <input type="text" class="form-control" name="produto" id="produto" placeholder="Produto..."
                    value="<?=$Session::getFormSession('produto')?>" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" class="form-control" name="preco" id="preco" placeholder="R$ 00,00"
                    value="<?=$Session::getFormSession('preco')?>" required>
            </div>
            <button id="add" class="btn btn-primary add">
                <i class="glyphicon glyphicon-plus-sign"></i>
                Adicionar</button>
            <button type="submit" class="btn btn-success pull-right">
                <i class="glyphicon glyphicon-circle-arrow-up"></i>Salvar venda</button>
        </form>
    </div>

    <div class="col-md-3"></div>
</div>
</div>
</div>