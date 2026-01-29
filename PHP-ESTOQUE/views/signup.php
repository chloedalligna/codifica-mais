<?php


require_once __DIR__ . "/header.php";


?>

<main class="main-login">

    <form class="formulario">

        <section class="formulario-titulo">
            <h2>Signup</h2>
        </section>

            <div class="formulario-div">
                <label class="formulario-label" for="usuario">Usuário</label>
                <input name="user" class="formulario-input" required
                       placeholder="Digite seu nome de usuário" id='usuario' />
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
            <input name="signup" class="formulario-post" type="submit" value="Criar conta" />
        </div>
    </form>

</main>

<?php require_once __DIR__ . "/footer.php"; ?>
