Na aula 5 aprendemos como:

- Utilizar scripts para rodarmos funções instaladas com composer 

Arquivo: composer.json

"scripts": {
    "phan": "phan --allow-polyfill-parser",
    "phpcs": "phpcs --standard=PSR12 src/",
}

rodando o comando composer phan ou composer phpcs (composer + o apelido da função) ele chamará o caminho que fornecemos

- Criar uma rotina para executar de 1 em 1 função do nosso indice scripts

Arquivo: composer.json

"scripts": {
    "phan": "phan --allow-polyfill-parser",
    "phpcs": "phpcs --standard=PSR12 src/",
    "check" : [
        "@phan",
        "@phpcs"
    ]
}

rodando o comando composer check ele irá rodar os scripts phan e phpcs 
Obs: (lembrando que precisa utilizar o arroba antes do nome do indice)

- Conseguimos colocar descrições aos nossos scripts

Arquivo: composer.json

"scripts-descriptions": {
    "check": "Roda as verificações dos códigos do Phan e do Phpcs"
}

Então a descrição do scirpt check quando rodamos composer list 
irá retornar a frase acima junto com o nome do script

Retorno: check -> Roda as verificações dos códigos do Phan e do Phpcs

- Aprendemos que podemos rodar comandos windows com composer

Arquivo: composer.json

"scripts": {
    "phan": "phan --allow-polyfill-parser",
    "phpcs": "phpcs --standard=PSR12 src/",
    "listar": "dir",
    "check" : [
        "@phan",
        "@phpcs"
    ]
}

Podemos rodar o comando composer listar (composer + nome atribuia a função no "scripts") 
que irá listar as pastas do diretório atual

- Podemos executar métodos de uma classe do nosso projeto

Arquivo: composer.json

"scripts": {
    "phan": "phan --allow-polyfill-parser",
    "phpcs": "phpcs --standard=PSR12 src/",
    "listar": "dir",
    "testar": "Alura\\Php\\BuscadorDeCursos\\Buscador::testar",
    "check" : [
        "@phan",
        "@phpcs"
    ]
}

Podemos utlizar o comando composer testar que irá executar o método da classe Buscador
Passando o namespace dela, o nome da classe e o nome do método (sem os parenteses)

- Podemos rodar os nosso scripts antes ou depois de algumas verificações do composer
por exemplo, podemos rodar o comando phan (que verifica se tem algum código escrito errado no arquivo)
antes de atualizar o projeto

Arquivo: composer.json

"scripts": {
    "phan": "phan --allow-polyfill-parser",
    "phpcs": "phpcs --standard=PSR12 src/",
    "listar": "dir",
    "testar": "Alura\\Php\\BuscadorDeCursos\\Buscador::testar",
    "check" : [
        "@phan",
        "@phpcs"
    ],
    "pre-update-cmd": [
        "@phan"
    ],
    "post-update-cmd": [
        "@phpcs"
    ]
}

Com os pre-update-cmd e post-update-cmd, conseguimos fazer verificações antes e depois
do composer pegar a chamada da função update
No exemplo acima, rodamos o phan antes do composer rodar o update e o phpcs depois que o 
composer rodar o update