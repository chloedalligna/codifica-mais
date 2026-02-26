<?php


require_once __DIR__ . "/header-login.php";


?>
<main class="main-login">

    <form class="formulario"
    method="post"
    action="/signup">

        <section class="formulario-titulo">
            <strong>Signup</strong>
        </section>

        <div class="formulario-div">
            <label class="formulario-label" for="username">Usuário</label>
            <input name="username"
                   class="formulario-input"
                   type="text"
                   id="username"
                   placeholder="Digite seu nome de usuário"
                   required/>
        </div>

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
            <?php
            if (!empty($_SESSION['error_message'])) {
                echo "<div class='password-validation' style='color: red'></div>";
            ?>
        </div>

        <div class="formulario-botao">
            <input name="signup"
                   class="formulario-post"
                   id="signup-button"
                   type="submit"
                   value="CRIAR CONTA" />
        </div>

    </form>

</main>
<?php require_once __DIR__ . "/../footer.php"; ?>