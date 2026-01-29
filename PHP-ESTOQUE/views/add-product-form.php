<?php

use Chloe\PhpEstoque\Entity\Product;

require_once __DIR__ . "/header.php";

/** @var array $listSubcategories */
/** @var array $listStatus */

?>

<main class="main-form">

    <form class="formulario"
          method="post">

        <section class="formulario-titulo">
            <h2>Cadastro de Produto</h2>
        </section>

        <div class="formulario-div">
        <label class="formulario-label" for="nameProduct">Nome</label>
        <input name="nameProduct"
               class="formulario_input"
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
                           class="formulario_input"
                           type="radio"
                           id="<?= $subcategory['nome_subcategoria'] ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="formulario-div">
        <label class="formulario-label" for="price">Preço</label>
        <input name="price"
               class="formulario_input"
               type="float"
               id="price"
               placeholder="Digite um preço"
               required>
        </div>

        <div class="formulario-div">
        <label class="formulario-label" for="quantity">Quantidade</label>
        <input name="quantity"
               class="formulario_input"
               type="number"
               id="quantity"
               placeholder="Digite uma quantidade"
               required>
        </div>

        <div class="formulario-div">
        <label class="formulario-label" for="description">Descrição</label>
        <input name="description"
               class="formulario_input"
               type="text"
               id="description"
               placeholder="Digite uma descrição"
               required>
        </div>

        <div class="formulario-div">
        <label class="formulario-label" for="imageUrl">Envie uma imagem do produto</label>
        <input name="imageUrl"
               class="formulario_input"
               type="file"
               accept="image/*"
               id="imageUrl"
               placeholder="Envie uma imagem">
        </div>

        <div class="formulario-botao">
        <input name="cadastro" class="formulario-post" type="submit" value="Cadastrar produto" />
        </div>

    </form>

</main>

<?php require_once __DIR__ . "/footer.php"; ?>




<!--      --><?php //foreach ($produtos as $key => $produto): ?>
<!--          <tr>-->
<!--            <td>--><?php //= $produto->getNome() ?><!--</td>-->
<!--            <td>--><?php //= $produto->getTipo() ?><!--</td>-->
<!--            <td>--><?php //= $produto->getDescricao() ?><!--</td>-->
<!--            <td>--><?php //= $produto->getPrecoFormatado() ?><!--</td>-->
<!--            <td><a class="botao-editar" href="editar-produto.html">Editar</a></td>-->
<!--            <td>-->
<!--              <form action="excluir-produto.php" method="post">-->
<!--                  <input type="hidden" name="id" value="--><?php //= $produto->getId() ?><!--">-->
<!--                <input type="submit" class="botao-excluir" value="Excluir">-->
<!--              </form>-->
<!--            </td>-->
<!--          </tr>-->
<!--      --><?php //endforeach; ?>
