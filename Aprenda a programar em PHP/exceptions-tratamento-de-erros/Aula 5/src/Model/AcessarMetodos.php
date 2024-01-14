<?php 

namespace Alura\Php\Model;

trait AcessarMetodos
{

    
    public function __get(string $atributo)
    {   
        $metodo = 'get' . ucfirst($atributo);
        return $this->$metodo();
    }

    public function __set(string $atributo, $valor) : void
    {
        $metodo = 'set' . ucfirst($atributo);
        $this->$metodo($valor);
    }
}