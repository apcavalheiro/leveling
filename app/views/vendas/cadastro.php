<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 id="titleCadastro"></h2>
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
            <div class="alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="glyphicon glyphicon-ok-sign"></i>
                <strong> <?=$message;?></strong>
            </div>
            <?php }?>
            <?php }?>
            <form action="/vendas/salvar" method="post" id="form-hidden" class="formCadastro">
                <div class="form-group">
                    <label for="nome">Cliente</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do cliente"
                        value="<?=$Session::getFormSession('nome');?>"> </div>
                <span id="erros"> </span>
                <div class="input-group">
                    <div class="col-sm-4 my-1">
                        <label class="sr-only" for="produto">Produto</label>
                        <input type="text" id="produto" class="form-control produto" placeholder="Produto...">
                    </div>
                    <div class="col-sm-4 my-1">
                        <label class="sr-only" for="preco">Preço</label>
                        <div class="input-group">
                            <input type="text" class="form-control preco" id="preco" placeholder="Preço...">
                        </div>
                    </div>
                    <div class="col-auto my-1">
                        <a href="#" id="btnAdd" class="btn btn-primary">Adicionar
                            <i class="glyphicon glyphicon-plus-sign"></i></a>
                    </div>
                </div>
                <hr>
                <span id="totalErro"> </span>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Preço</th>
                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                    </tbody>
                </table>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" id="total" style="border:none" name="total" value=""
                        placeholder="Total R$ 00,00">
                </div>
                <button type="submit" class="btn btn-success pull-right">Salvar venda
                    <i class="glyphicon glyphicon-circle-arrow-up"></i></button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-3"></div>
</div>