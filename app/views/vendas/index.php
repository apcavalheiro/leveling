<div class="container">
    <div class="row">
        <a href="/vendas/cadastro" class="btn btn-primary pull-right">
            <i class="glyphicon glyphicon-plus-sign"></i>
            Nova venda</a>
    </div>
</div>
<div class="container">
    <div class="starter-template">
        <?php if ($Session::getSession('success')) { ?>
        <?php foreach ($Session::getSession('success') as $message) { ?>
        <div class="alert alert-success" role="alert" id="notice">
            <i class="glyphicon glyphicon-ok-sign"></i>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>
                <?= $message; ?></strong>
        </div>
        <?php

    } ?>
        <?php

    } ?>
        <?php if ($Session::getSession('errors')) { ?>
        <?php foreach ($Session::getSession('errors') as $message) { ?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <i class="glyphicon glyphicon-ok-sign"></i>
            <strong>
                <?= $message; ?></strong>
        </div>
        <?php

    } ?>
        <?php

    } ?>
        <!-- Listagem das vendas -->

        <?php if (empty($viewVar['listaDeVendas'])) { ?>
        <div class="alert alert-info" role="alert">Não foi efetuada nenhuma venda!</div>
        <?php

    } else { ?>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <?php foreach ($viewVar['listaDeVendas'] as $item) { ?>
            <tr>
                <td>
                    <?php echo $item->getId(); ?>
                </td>
                <td>
                    <?php echo $item->getCliente(); ?>
                </td>
                <td>
                    <?php echo $item->getTotal(); ?>
                </td>
                <td>
                    <a href="/vendas/show/<?php echo $item->getId(); ?>" class="btn btn-info btn-sm">Detalhes</a>
                </td>
            </tr>
            <?php

        } ?>
            <?php

        } ?>
        </table>
    </div>
</div>
</div>