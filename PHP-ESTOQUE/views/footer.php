<?php ?>
<!--<footer>-->
<!--    <div class="footer-content">-->
<!--        <div class="footer-section contact">-->
<!--            <h2>Redes Sociais e Contato</h2>-->
<!--            <p>Email:</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->


</body>
<script>

    const switchMenu = () => {
        const modal1 = document.querySelector('.modal-menu')
        const actualStyle = modal1.style.display
        if(actualStyle === 'block') {
            modal1.style.display = 'none'
        }
        else {
            modal1.style.display = 'block'
        }
    }

    window.onclick = function(event) {
        const modal1 = document.querySelector('.modal-menu')
        if (event.target === modal1) {
            switchMenu()
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // abre o modal relativo ao item clicado
        document.querySelectorAll('.view-product-btn').forEach(function(btn){
            btn.addEventListener('click', function(){
                const li = btn.closest('.list-li');
                if (!li) return;
                const modal = li.querySelector('.modal-view');
                if (!modal) return;
                modal.style.display = 'block';
                modal.setAttribute('aria-hidden', 'false');
            });
        });

        // fecha ao clicar no overlay (fora do conteúdo) ou no botão de fechar
        document.querySelectorAll('.modal-view').forEach(function(modal){
            modal.addEventListener('click', function(e){
                // se clicou no overlay (modal em si), fecha
                if (e.target === modal) {
                    modal.style.display = 'none';
                    modal.setAttribute('aria-hidden', 'true');
                }
            });
            const btnClose = modal.querySelector('.modal-close');
            if (btnClose) {
                btnClose.addEventListener('click', function(){
                    modal.style.display = 'none';
                    modal.setAttribute('aria-hidden', 'true');
                });
            }
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<script src="js/index.js"></script>-->
</html>