Para utilizar o projeto em um ambiente de produção temos que rodar o código sem o require de desenvolvimento
Então quando rodarmos o comando 

composer install --no-dev 

não iremos pegar qualquer require de desenvolvimento

com o phpcs, podemos verificar se o código está com o padrão da PSR 12 utilizando o seguinte comando

vendor\bin\phpcs --standard=PSR12 src\ 

sendo o local que o phpcs é instalado (vendor\bin\phpcs), a PSR que será seguida (nesse caso a PSR12) e o local (src\)


com o phan conseguimos verificar se existe algum código errado dentro do nosso projeto executando o comando

vendor\bin\phan --allow-polyfill-parser {src\}

sendo o local que o phan está instalado (vendor\bin\phan) e algum recurso que não foi explicado 
e o opicional que é o local que iremos verificar o código que terá erros

