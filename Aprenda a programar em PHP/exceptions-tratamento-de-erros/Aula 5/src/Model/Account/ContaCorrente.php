<?php 

namespace Alura\Php\Model\Account;

class ContaCorrente extends Conta
{   
    protected function percentualTarifa():float
    {
        return 0.05;
    }

    public function transfer(int|float $valorASerTransferido, Conta $contaDestino) : void
    {   
        if(parent::getSaldo() < $valorASerTransferido){
            echo PHP_EOL . "Está conta não ter saldo para realizar a transferência!". PHP_EOL;
            return;
        }

        if($valorASerTransferido < 0){
            echo PHP_EOL . "Tentando passar um valor menor do que zero!". PHP_EOL;
            return;
        }

        // Realizando transferência
        parent::withdraw($valorASerTransferido);
        $contaDestino->deposit($valorASerTransferido);
    }
}