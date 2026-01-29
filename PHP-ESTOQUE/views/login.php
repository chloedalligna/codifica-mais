<?php


require_once __DIR__ . "/header.php";


?>

<main class="main-login">

    <form class="formulario">

        <section class="formulario-titulo">
            <h2>Login</h2>
        </section>

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

        <div class="formulario-botao">
            <a class="formulario-post" href="signup.php">Criar conta</a>
        </div>

    </form>

</main>

<?php require_once __DIR__ . "/footer.php"; ?>
