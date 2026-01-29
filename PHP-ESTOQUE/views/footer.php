<?php ?>
<!--    <footer>-->
<!--        <div class="footer-content">-->
<!--            <div class="footer-section about">-->
<!--                <h2>Sobre Nós</h2>-->
<!--                <p>Informações sobre a empresa, missão e valores.</p>-->
<!--            </div>-->
<!--            <div class="footer-section links">-->
<!--                <h2>Links Rápidos</h2>-->
<!--                <ul>-->
<!--                    <li><a href="#">Início</a></li>-->
<!--                    <li><a href="#">Produtos</a></li>-->
<!--                    <li><a href="#">Contato</a></li>-->
<!--                    <li><a href="#">Suporte</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="footer-section contact">-->
<!--                <h2>Contato</h2>-->
<!--                <p>Email:-->


</body>
<script>

    const switchModal = () => {
        const modal = document.querySelector('.modal')
        const actualStyle = modal.style.display
        if(actualStyle == 'block') {
            modal.style.display = 'none'
        }
        else {
            modal.style.display = 'block'
        }
    }

    window.onclick = function(event) {
        const modal = document.querySelector('.modal')
        if (event.target == modal) {
            switchModal()
        }
    }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<script src="js/index.js"></script>-->
</html>