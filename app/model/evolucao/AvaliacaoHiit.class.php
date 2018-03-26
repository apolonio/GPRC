<?php

/**
 * @class:     AvaliacaoHIT: Responsabel por acessar a tabela sytem_avaliacao_hiit
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AvaliacaoHiit  extends Adianti\Database\TRecord {

    const TABLENAME='system_avaliacao_hiit';
    const PRIMARYKEY ='codHiit';
    
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
