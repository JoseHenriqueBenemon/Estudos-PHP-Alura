<?php 

/* Podemos adicionar no autoload arquivos que não estejam dentro do nosso diretório base 
(nesse caso o src/), colocando dentro do composer.json o seguinte código

"classmap": [
    "./Teste.php" Nesse exemplo o nome dessa classe é Teste.php
]

Da forma acima podemos fazer com que todas as classe dentro do arquivo "Teste.php" 
que estão dentro do diretório padrão do projeto (./NomeDaClasse.php")
*/
class Teste
{
    public static function getTeste(): void
    {
        echo "Testando...";
    }
}

class Teste2 
{
    public static function getTeste(): void
    {
        echo "Testando novamente...";
    }
}