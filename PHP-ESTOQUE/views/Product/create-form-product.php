<?php

use Chloe\PhpEstoque\Entity\Product;

require_once __DIR__ . "/header.php";

/** @var array $listSubcategories */
/** @var array $listStatus */

?>
<main class="main-form">

    <section class="formulario-titulo">
        <strong>Cadastro de Produto</strong>
    </section>

    <form class="formulario scroll"
          method="post"
          enctype="multipart/form-data"
          action="/create">

        <div class="formulario-div">
            <label class="formulario-label" for="name">Nome</label>
            <input name="name"
                   class="formulario-input create-update"
                   type="text"
                   id="name"
                   placeholder="Digite o nome do produto"
                   required/>
            <?php
            if (!empty($_SESSION['error_message']) && isset($_SESSION['varname']) && $_SESSION['varname'] === 'name') {
                echo "<div style='color: red'>" . $_SESSION['error_message'] . "</div>";
            }
            ?>
        </div>

        <div class="container-radio">
            <?php foreach ($listSubcategories as $subcategory): ?>
                <div>
                    <label id="label-radio" class="formulario-label"
                           for="<?= $subcategory['name'] ?>"> <?= $subcategory['name'] ?> </label>
                    <input name="subcategoryName"
                           class="formulario-input create-update-radio"
                           type="radio"
                           id="<?= $subcategory['name'] ?>"
                           value="<?= $subcategory['id'] ?>"/>
                </div>
            <?php endforeach; ?>
            <?php
            if (!empty($_SESSION['error_message']) && isset($_SESSION['varname']) && $_SESSION['varname'] === 'subcategoryName') {
                echo "<div style='color: red; grid-column: 1 / -1'>" . $_SESSION['error_message'] . "</div>";
            }
            ?>
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
                   required/>
            <?php
            if (!empty($_SESSION['error_message']) && isset($_SESSION['varname']) && $_SESSION['varname'] === 'quantity') {
                echo "<div style='color: red'>" . $_SESSION['error_message'] . "</div>";
            }
            ?>
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
                   required/>
            <?php
            if (!empty($_SESSION['error_message']) && isset($_SESSION['varname']) && $_SESSION['varname'] === 'price') {
                echo "<div style='color: red'>" . $_SESSION['error_message'] . "</div>";
            }
            ?>
        </div>

        <div class="formulario-div">
            <label class="formulario-label" for="description">Descrição</label>
            <input name="description"
                   class="formulario-input create-update"
                   type="text"
                   id="description"
                   placeholder="Digite uma descrição"
                   required/>
            <?php
            if (!empty($_SESSION['error_message']) && isset($_SESSION['varname']) && $_SESSION['varname'] === 'description') {
                echo "<div style='color: red'>" . $_SESSION['error_message'] . "</div>";
            }
            ?>
        </div>

        <div class="formulario-div">
            <label class="formulario-label" for="image">Imagem ilustrativa</label>
            <input name="image"
                   class="formulario-input create-update"
                   type="file"
                   id="image"
                   placeholder="Envie uma imagem"
                   accept="image/*"/>
            <?php
            if (!empty($_SESSION['error_message']) && isset($_SESSION['varname']) && $_SESSION['varname'] === 'image') {
                echo "<div style='color: red'>" . $_SESSION['error_message'] . "</div>";
            }
            ?>
        </div>

        <div class="formulario-botao">
            <input name="create"
                   class="formulario-post"
                   type="submit"
                   value="CADASTRAR PRODUTO"/>
<!--            --><?php
//            if (!empty($_SESSION['error_message']) && !isset($_SESSION['varname'])) {
//                echo "<div style='color: red'>" . $_SESSION['error_message'] . "</div>";
//            }
//            ?>
        </div>

    </form>

</main>
<?php require_once __DIR__ . "/../footer.php"; ?>
