<?php

// Calcule a média de 3 notas e informe aprovação (Aprovado se nota >=6).

$media = 0;
$cont = 0;

for ($i=1; $i <= 3; $i++) {
    $nota = readline("Digite a $i ª nota: ") . PHP_EOL;
    $media += $nota;
    $cont++;
}

$media = $media / $cont;

echo "A média final é $media. ";

if ($media >= 6) {
    echo "O aluno está aprovado! :D";
} else {
    echo "O aluno está reprovado. :(";
}

