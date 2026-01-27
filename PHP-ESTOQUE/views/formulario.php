<section class="container-admin-banner">
<!--    --><?php //if (header('Location') === '/editar-produto.php'): ?>
<!--        <h1>Editar Produto</h1>-->
<!--    --><?php //else: ?>
        <h1>Cadastrar Produto</h1>
<!--    --><?php //endif; ?>
</section>

<section class="container-form">
    <form class="formulario"
          action="<?= $id === false ? 'listagem-produtos.php' : '/editar-produto.php?id=' . $id?>"
          method="post">

        <label for="nameProduct">Nome</label>
        <input name="nameProduct"
               value="<?= $product['nome_produto'] ?>"
               type="text"
               placeholder="Digite o nome do produto"
               required
               id="nameProduct" >

        <div class="container-radio">
            <?php foreach($listSubcategories as $key => $subcategory): ?>
                <div>
                    <label for="<?= $subcategory['nome_subcategoria'] ?>" > <?= $subcategory['nome_subcategoria'] ?> </label>
                    <?php if ($subcategory['nome_subcategoria'] === $product['nome_subcategoria']): ?>
                        <input name="nameSubcategory"
                               type="radio"
                               id="<?= $subcategory['nome_subcategoria'] ?>"
                               checked >
                    <?php else: ?>
                        <input name="nameSubcategory"
                               type="radio"
                               id="<?= $subcategory['nome_subcategoria'] ?>" >
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <label for="price">Preço</label>
        <input name="price"
               type="float"
               id="price"
               placeholder="Digite um preço"
               required
               value="<?= $product['preco'] ?>">

        <label for="quantity">Quantidade</label>
        <input name="quantity"
               type="number"
               id="quantity"
               placeholder="Digite uma quantidade"
               required
               value="<?= $product['quantidade'] ?>">

        <label for="description">Descrição</label>
        <input name="description"
               type="text"
               id="description"
               placeholder="Digite uma descrição"
               required
               value="<?= $product['descricao'] ?>">

        <label for="imageUrl">Envie uma imagem do produto</label>
        <input name="imageUrl"
               type="file"
               accept="image/*"
               id="imageUrl"
               placeholder="Envie uma imagem"
               value="<?= $product['imagem_url'] ?>">

        <div class="container-radio">
            <?php foreach($listStatus as $key => $status): ?>
                <div>
                    <label for="<?= $status['nome_status'] ?>" > <?= $status['nome_status'] ?> </label>
                    <?php if ($status['id_status'] === $product['id_status']): ?>
                        <input name="nameStatus"
                               type="radio"
                               id="<?= $status['nome_status'] ?>"
                               checked >
                    <?php else: ?>
                        <input name="nameStatus"
                               type="radio"
                               id="<?= $status['nome_status'] ?>" >
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </form>

    <a class="botao-cadastrar" href="/cadastro">Enviar produto</a>

<!--    <form action="#" method="post">-->
<!--        <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>-->
<!--    </form>-->

<!--    <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar produto"/>-->

</section>
</main>



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
