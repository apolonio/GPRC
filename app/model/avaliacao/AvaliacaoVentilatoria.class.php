<?php

/** 
 * Esser Relatorio exibi dados da tabela system_militar
 * @copyright (c) 2016, Apolonio S. S. Junior ICRIACOES Sistemas Web!s - 2ºSgt Santiago
 * @email apolocomputacao@gmail.com
 */
class AvaliacaoVentilatoria extends Adianti\Database\TRecord {

    const TABLENAME='system_avaliacao_ventilatoria';
    const PRIMARYKEY ='codVent';
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('codPaciente');
        parent::addAttribute('codAvaliador');
        
        parent::addAttribute('fc');
        parent::addAttribute('pa1');
        parent::addAttribute('pa2');
        parent::addAttribute('sat');
        parent::addAttribute('sindex');
        parent::addAttribute('pimax');
        parent::addAttribute('pinasd');
        parent::addAttribute('pinase');
        parent::addAttribute('PEmax');
        parent::addAttribute('PImaxm');
        parent::addAttribute('cv');
        parent::addAttribute('cpt');
        parent::addAttribute('cvf');
        parent::addAttribute('vef1');
        parent::addAttribute('vef2');
        parent::addAttribute('petco2');
        
        parent::addAttribute('conclusao');
        parent::addAttribute('parecer');
        parent::addAttribute('dataVent');
 
    }
}

?>
