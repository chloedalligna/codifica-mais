<?php

use Chloe\PhpEstoque\Entity\Product;

require_once __DIR__ . "/header.php";

/** @var array $listSubcategories */
/** @var Product $product */

?>
<main class="main-form">

    <section class="titulo-form">
        <strong>Edição de Produto</strong>
    </section>

    <form class="formulario scroll"
          method="post"
          enctype="multipart/form-data"
          action="/update?id=<?= $product->getId() ?>">

        <div class="formulario-div">
            <label class="formulario-label" for="name">Nome</label>
            <input name="name"
                   class="formulario-input create-update"
                   type="text"
                   id="name"
                   placeholder="Digite o nome do produto"
                   required
                   value="<?= $product->getName() ?>"/>
        </div>

        <div class="container-radio">
            <?php foreach($listSubcategories as $subcategory): ?>
                <div>
                    <label id="label-radio" class="formulario-label" for="<?= $subcategory['name'] ?>" > <?= $subcategory['name'] ?> </label>
                    <input name="subcategoryName"
                           class="formulario-input create-update-radio"
                           type="radio"
                           id="<?= $subcategory['name'] ?>"
                           value="<?= $subcategory['id'] ?>"
                           <?= $product->getSubcategoryId() === $subcategory['id'] ? "checked" : "" ?> />
                </div>
            <?php endforeach; ?>
        </div>

        <div class="formulario-div">
            <label class="formulario-label" for="quantity">Quantidade</label>
            <input name="quantity"
                   class="formulario-input create-update"
                   type=number
                   step=1
                   min=0
                   id="quantity"
                   placeholder="Digite uma quantidade"
                   required
                   value="<?= $product->getQuantity() ?>" />
        </div>

        <div class="formulario-div">
            <label class="formulario-label" for="price">Preço</label>
            <input name="price"
                   class="formulario-input create-update"
                   type=number
                   step=0.01
                   min="0.00"
                   id="price"
                   placeholder="Digite um preço"
                   required
                   value="<?= $product->getPrice() ?>" />
        </div>

        <div class="formulario-div">
            <label class="formulario-label" for="description">Descrição</label>
            <input name="description"
                   class="formulario-input create-update"
                   type="text"
                   id="description"
                   placeholder="Digite uma descrição"
                   required
                   value="<?= $product->getdescription() ?>"/>
        </div>

        <div class="formulario-div">
            <label class="formulario-label" for="image">Envie uma imagem do produto</label>
            <input name="image"
                   class="formulario-input create-update"
                   type="file"
                   id="image"
                   placeholder="Envie uma imagem"
                   accept="image/*"
                   value="<?= $product->getImagePath() ?>" />
        </div>

        <div class="formulario-botao">
            <input name="update"
                   class="formulario-post"
                   type="submit"
                   value="EDITAR PRODUTO" />
        </div>

    </form>

</main>
<?php require_once __DIR__ . "/../footer.php"; ?>