<?php 

namespace Alura\Php\Service;

use Alura\Php\Model\Autenticavel;

class Autenticador
{
    public function login(Autenticavel $autenticavel, string $senha) : void
    {
        if($autenticavel->podeAutenticar($senha)) {
            // Pegando o nome da classe tirando o namespace
            $arr = explode("\\", get_class($autenticavel));
            
            echo end($arr) . " logado no sistema!";
        }  else{
            echo 'Senha incorreta, tente novamente!';
        } 
    }
}