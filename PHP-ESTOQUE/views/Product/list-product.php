<?php

use Chloe\PhpEstoque\Entity\Product;

require_once __DIR__ . "/header.php";

/** @var Product[] $products */

$backgroundColor = [
    1 => 'rgba(0, 255, 0, 0.39)', // Disponível - verde
    2 => 'rgba(255, 0, 0, 0.39)',  // Esgotado - vermelho
    3 => 'rgba(255, 245, 0, 0.39)'  // Última Unidade - amarelo
];

?>
<section class="section-create-product">
    <button>
        <a class="section-a" id="create-product" href="/create">
            <label for="create-product">CADASTRAR PRODUTO</label>
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M256 512a256 256 0 1 0 0-512 256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
        </a>
    </button>
</section>

<main class="main-product-list">

    <div class="list">

        <div class="list-div" id="cabecalho">
            <span class="column" id="column-product"><strong>Produto</strong></span>
            <span class="column" id="column-quantity"><strong>Quantidade</strong></span>
            <span class="column" id="column-price"><strong>Preço</strong></span>
            <span class="column" id="column-subcategory"><strong>Subcategoria</strong></span>
            <span class="column" id="column-category"><strong>Categoria</strong></span>
            <span class="column" id="column-info"><strong>Info</strong></span>
            <span class="column" id="column-botao"><strong>Editar</strong></span>
            <span class="column" id="column-botao"><strong>Excluir</strong></span>
        </div>
        <div class="scroll">
            <ul class="list-ul" id="products-ul">
                <?php foreach ($products as $product): ?>
                <li class="list-li" id="products-li">
                    <div class="list-div produtos" style="background-color: <?= $backgroundColor[$product->getStatusId()]?>" >
                        <span class="column" id="column-product">
                           htmlspecialchars(<?= $product->getName(); ?>)
                        </span>
                        <span class="column" id="column-quantity">
                            <?= $product->getQuantity(); ?>
                        </span>
                        <span class="column" id="column-price">
                            R$ <?= $product->getPrice(); ?>
                        </span>
                        <span class="column" id="column-subcategory">
                            <?= $this->productRepository->getSubcategoryName($product->getSubcategoryId()); ?>
                        </span>
                        <span class="column" id="column-category">
                            <?= $this->productRepository->getCategoryName($product->getCategoryId()); ?>
                        </span>
                        <span class="column" id="column-info">
                            <form method="post">
                                <input name="id-view" type="hidden" value="<?= $product->getId(); ?>" />
                                <button type="button" class="view-product-btn" data-product-id="<?= $product->getId(); ?>">
<!--                                <button type="button" id="view-product" onclick="switchView()">-->
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M256 512a256 256 0 1 0 0-512 256 256 0 1 0 0 512zM224 160a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm-8 64l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
<!--                                </button>-->
                                </button>
                            </form>
                        </span>
                        <span class="column" id="column-botao">
                            <a href="/update?id=<?= $product->getId(); ?>">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L368 46.1 465.9 144 490.3 119.6c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L432 177.9 334.1 80 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                            </a>
                        </span>
                        <span class="column" id="column-botao">
                            <a href="/products/delete?id=<?= $product->getId(); ?>" onclick="return confirm('Você deseja excluir este produto permanentemente?');">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M136.7 5.9L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-8.7-26.1C306.9-7.2 294.7-16 280.9-16L167.1-16c-13.8 0-26 8.8-30.4 21.9zM416 144L32 144 53.1 467.1C54.7 492.4 75.7 512 101 512L347 512c25.3 0 46.3-19.6 47.9-44.9L416 144z"/></svg>
                            </a>
                        </span>
                    </div>

                    <div class="modal-view" aria-hidden="true">
                        <div class="view-produto">
                            <div class="view-content">
                                <div class="view-image">
                                    <img src="<?= $product->getImageDir() ?>" alt="Imagem <?= $product->getName(); ?>" >
                                </div>
                                <div class="view-div">
                                    <div class="name-close-button">
                                        <div class="view-name">
                                            <strong><?= $product->getName(); ?></strong>
                                        </div>
                                        <button type="button" class="modal-close" aria-label="Fechar">
                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M256 512a256 256 0 1 0 0-512 256 256 0 1 0 0 512zM167 167c9.4-9.4 24.6-9.4 33.9 0l55 55 55-55c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-55 55 55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-55-55-55 55c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l55-55-55-55c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                        </button>
                                    </div>
                                    <div class="view-description">
                                        <h3>Descrição:</h3>
                                        <?= $product->getDescription(); ?>
                                    </div>
                                    <ul class="view-ul">
<!--                                        <li class="view-li description">-->
<!--                                            <h3>Descrição:</h3>-->
<!--                                            --><?php //= $product->getDescription(); ?>
<!--                                        </li>-->
                                        <li class="view-li quantity">
                                            <h3>Quantidade:</h3>
                                            <?= $product->getQuantity(); ?>
                                        </li>
                                        <li class="view-li price">
                                            <h3>Preço:</h3>
                                            R$ <?= $product->getPrice(); ?>
                                        </li>
                                        <li class="view-li category">
                                            <h3>Subcategoria:</h3>
                                            <?= $this->productRepository->getSubcategoryName($product->getSubcategoryId()); ?>
                                        </li>
                                        <li class="view-li category">
                                            <h3>Categoria:</h3>
                                            <?= $this->productRepository->getCategoryName($product->getCategoryId()); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>

</main>

<?php require_once __DIR__ . "/../footer.php"; ?>