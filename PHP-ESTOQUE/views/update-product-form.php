<?php

use Chloe\PhpEstoque\Entity\Product;

require_once __DIR__ . "/header.php";

/** @var array $listSubcategories */
/** @var array $listStatus */
/** @var Product $product */
/** @var int $id */

?>

    <main class="main-form">

        <form class="formulario"
              method="post">

            <section class="titulo-form">
                <h2>Edição de Produto</h2>
            </section>

            <div class="formulario-div">
                <label class="formulario-label" for="nameProduct">Nome</label>
                <input name="nameProduct"
                       class="formulario-input"
                       value="<?= $product->getNameProduct() ?>"
                       type="text"
                       placeholder="Digite o nome do produto"
                       required
                       id="nameProduct" >
            </div>

            <div class="container-radio">
                <?php foreach($listSubcategories as $key => $subcategory): ?>
                    <div>
                        <label class="formulario-label" for="<?= $subcategory['nome_subcategoria'] ?>" > <?= $subcategory['nome_subcategoria'] ?> </label>
                        <input name="nameSubcategory"
                               class="formulario-input"
                               type="radio"
                               id="<?= $subcategory['nome_subcategoria'] ?>"
                                <?= $product->getNameSubcategory() === $subcategory['nome_subcategoria'] ? "checked" : "" ?> >
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="formulario-div">
                <label class="formulario-label" for="price">Preço</label>
                <input name="price"
                       class="formulario-input"
                       type="float"
                       id="price"
                       placeholder="Digite um preço"
                       required
                       value="<?= $product->getPrice() ?>">
            </div>

            <div class="formulario-div">
                <label class="formulario-label" for="quantity">Quantidade</label>
                <input name="quantity"
                       class="formulario-input"
                       type="number"
                       id="quantity"
                       placeholder="Digite uma quantidade"
                       required
                       value="<?= $product->getQuantity() ?>">
            </div>

            <div class="formulario-div">
                <label class="formulario-label" for="description">Descrição</label>
                <input name="description"
                       class="formulario-input"
                       type="text"
                       id="description"
                       placeholder="Digite uma descrição"
                       required
                       value="<?= $product->getdescription() ?>">
            </div>

            <div class="formulario-div">
                <label class="formulario-label" for="imageUrl">Envie uma imagem do produto</label>
                <input name="imageUrl"
                       class="formulario-input"
                       type="file"
                       accept="image/*"
                       id="imageUrl"
                       placeholder="Envie uma imagem"
                       value="<?= $product->getImageUrl() ?>">
            </div>

<!--            <div class="container-radio">-->
<!--                --><?php //foreach($listStatus as $key => $status): ?>
<!--                    <div>-->
<!--                        <label class="formulario-label" for="--><?php //= $status['nome_status'] ?><!--" > --><?php //= $status['nome_status'] ?><!-- </label>-->
<!--                        <input name="nameStatus"-->
<!--                               class="formulario-input"-->
<!--                               type="radio"-->
<!--                               id="--><?php //= $status['nome_status'] ?><!--"-->
<!--                                --><?php //= $product->getIdStatus() === $status['id_status'] ? "checked" : "" ?><!-- >-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>
<!--            </div>-->

            <div class="formulario-botao">
                <input name="edicao" class="formulario-post" type="submit" value="Editar produto" />
            </div>

        </form>
    </main>

<?php require_once __DIR__ . "/footer.php"; ?>