<?php
/**
 * @class:     TreinamentoAerobico: Responsabel por acessar a tabela sytem_avaliacao_aerobico
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

class AvaliacaoTreinamentoAerobico  extends TRecord {

    const TABLENAME='system_treinamento_aerobico';
    const PRIMARYKEY ='codAerobico';
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);

 
    }
    
}

?>
