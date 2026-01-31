<?php


require_once __DIR__ . "/header-login.php";


?>

<main class="main-login">

    <form class="formulario"
    method="post"
    action="/login">

        <section class="formulario-titulo">
            <h2>Login</h2>
        </section>

            <div class="formulario-div">
                <label class="formulario-label" for="email">E-mail</label>
                <input type="email" name="email" class="formulario-input" required
                       placeholder="Digite seu e-mail" id='email' />
            </div>

            <div class="formulario-div">
                <label class="formulario-label" for="password">Senha</label>
                <input type="password" name="password" class="formulario-input" required placeholder="Digite sua senha"
                       id='password' />
            </div>

        <div class="formulario-botao">
            <input class="formulario-post" type="submit" value="ENTRAR" />
        </div>

    </form>

</main>

<?php require_once __DIR__ . "/footer.php"; ?>
