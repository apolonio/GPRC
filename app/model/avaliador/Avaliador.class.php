
<?php
/** 
 * Esser Relatorio exibi dados da tabela system_militar
 * @copyright (c) 2016, Apolonio S. S. Junior ICRIACOES Sistemas Web!s - 2ºSgt Santiago
 * @email apolocomputacao@gmail.com
 */

class Avaliador extends Adianti\Database\TRecord {
    
    const TABLENAME='system_avaliador';
    const PRIMARYKEY ='codigoAvaliador';
     
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        
        parent::addAttribute('nomeAvaliador');
        parent::addAttribute('email');
        parent::addAttribute('telefone');
        parent::addAttribute('profissao');
    }
    
}
