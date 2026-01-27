<?php require_once 'header.php'; ?>

    <main>

        <section>
            <a class="adicionar-produto" href="/cadastro">
                <label for="botao-adicionar">Adicionar Produto</label>
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M256 512a256 256 0 1 0 0-512 256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
            </a>

            <button class="botao-voltar hidden">
            </button>
        </section>

        <div class="lista-estoque">
            <ul class="lista-estoque-ul">
                <li class="lista-estoque-li">
                    <div class="lista-estoque-div cabecalho">
                        <span class="coluna coluna-produto"><strong>Produto</strong></span>
                        <span class="coluna coluna-qtd"><strong>Quantidade</strong></span>
                        <span class="coluna coluna-preco"><strong>Preço</strong></span>
                        <span class="coluna coluna-subcategoria"><strong>Subcategoria</strong></span>
                        <span class="coluna coluna-categoria"><strong>Categoria</strong></span>
                        <span class="coluna coluna-empty"></span>
                        <span class="coluna coluna-botao"><strong>Editar</strong></span>
                        <span class="coluna coluna-botao"><strong>Excluir</strong></span>
                    </div>
                </li>
                <?php foreach ($products as $key => $product): ?>
                <li class="lista-estoque-li">
                    <div class="lista-estoque-div produto">
                        <span class="coluna coluna-produto"><?= $product->getNameProduct() ?></span>
                        <span class="coluna coluna-qtd"><?= $product->getQuantity() ?></span>
                        <span class="coluna coluna-preco">R$ <?= $product->getPrice() ?></span>
                        <span class="coluna coluna-subcategoria"><?= $product->getNameSubcategory() ?></span>
                        <span class="coluna coluna-categoria"><?= $product->getNameCategory() ?></span>
                        <span class="coluna coluna-empty">
                            <button type="button" id="view-product">Mais</button>
                        </span>
                        <span class="coluna coluna-botao"><a href="./edicao?id=<?= $product->getId() ?>">Editar</a></span>
                        <span class="coluna coluna-botao"><a href="./exclusao?id=<?= $product->getId() ?>">Excluir</a></span>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>

<?php require_once 'footer.php'; ?>

    