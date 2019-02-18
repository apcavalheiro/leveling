<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3 id="title"></h3>
            <!-- form -->
            <form action="/teste/cadastro" class="form_cadastro" method="POST">
                <div class="form-group">
                    <label for="nome">Cliente</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do cliente"
                        value=""> </div>
                <span id="erros"> </span>
                <div class="input-group">
                    <div id="prod" class="col-sm-4 my-1">
                        <label class="sr-only" for="produto">Produto</label>
                        <input type="text" id="produto" class="form-control produto" name="produto[]"
                            placeholder="Produto...">
                    </div>
                    <div class="col-sm-4 my-1">
                        <label class="sr-only" for="preco">Preço</label>
                        <div class="input-group">
                            <input type="text" class="form-control preco" id="preco" name="preco[]"
                                placeholder="Preço...">
                        </div>
                    </div>
                    <div class="col-auto my-1">
                        <a href="#" id="btnAdd" class="btn btn-primary">Adicionar</a>
                    </div>
                </div>
                <div>
                    <hr>
                </div>
                <div class="row">
                    <button type="submit" id='submit' class="btn btn-success pull-right">
                        <i class="glyphicon glyphicon-upload"></i>Salvar</button>
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control" id="total" style="border:none" name="total"
                        placeholder="Total R$ 00,00">
                </div>
                <hr>
            </form>
            <?php $Session::setSession('form', $_POST);?>

            <!-- end form -->

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
        </div>
    </div>
</div>
<div class="col-md-3"></div>
</div>