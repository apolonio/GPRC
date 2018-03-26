<?php

/**
 * @class:    Treinamento Resistido: Model que acessa a tabela system_treinamento_resistido
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc 
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2010 - 2017 Icriações (http://www.icriacoes.com.br)
 */
class AvaliacaoTreinamentoResistido  extends Adianti\Database\TRecord {

    const TABLENAME='system_treinamento_resistido';
    const PRIMARYKEY ='codTr';
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
//        parent::addAttribute('codPaciente');
//        parent::addAttribute('codAvaliador');
//        parent::addAttribute('conclusao');
//        parent::addAttribute('parecer');
//        parent::addAttribute('dataHiit');
 
    }
    
}


?>


