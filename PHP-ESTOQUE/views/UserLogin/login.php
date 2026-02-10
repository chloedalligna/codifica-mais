<?php

require_once __DIR__ . "/header-login.php";

?>
<main class="main-login">

    <form class="formulario"
    method="post"
    action="/login">

        <section class="formulario-titulo">
            <strong>Login</strong>
        </section>

        <div class="formulario-div">
            <label class="formulario-label" for="email">E-mail</label>
            <input name="email"
                   class="formulario-input"
                   type="email"
                   id="email"
                   placeholder="Digite seu e-mail"
                   required />
        </div>

        <div class="formulario-div">
            <label class="formulario-label" for="password">Senha</label>
            <input name="password"
                   class="formulario-input"
                   type="password"
                   id="password"
                   placeholder="Digite sua senha"
                   required />
        </div>

        <div class="formulario-botao">
            <input name="login"
                   class="formulario-post"
                   type="submit"
                   value="ENTRAR" />
        </div>

    </form>

</main>
<?php require_once __DIR__ . "/../footer.php"; ?>