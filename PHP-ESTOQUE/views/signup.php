<?php


require_once __DIR__ . "/header.php";


?>

<main class="main-login">

    <form class="formulario">

        <section class="formulario-titulo">
            <h2>Efetue login</h2>
        </section>

            <div class="formulario-div">
                <label class="formulario-label" for="usuario">Usuário</label>
                <input name="user" class="formulario-input" required
                       placeholder="Digite seu usuário" id='usuario' />
            </div>

            <div class="formulario-div">
                <label class="formulario-label" for="email">E-mail</label>
                <input name="email" class="formulario-input" required
                       placeholder="Digite seu e-mail" id='email' />
            </div>

            <div class="formulario-div">
                <label class="formulario-label" for="senha">Senha</label>
                <input type="password" name="senha" class="formulario-input" required placeholder="Digite sua senha"
                       id='senha' />
            </div>

        <div class="formulario-botao">
            <input name="login" class="formulario-post" type="submit" value="Entrar" />
        </div>
    </form>

</main>

<?php require_once __DIR__ . "/footer.php"; ?>
