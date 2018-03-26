<?php
/** 
 * Esser Relatorio exibi dados da tabela system_militar
 * @copyright (c) 2016, Apolonio S. S. Junior ICRIACOES Sistemas Web!s - 2ºSgt Santiago
 * @email apolocomputacao@gmail.com
 */
class GrupoRemedio extends Adianti\Database\TRecord {
    
    const TABLENAME='system_grupo_remedio';
    const PRIMARYKEY ='codigoGrupoRemedio';
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('descricaoGrupo');
 
    }
}

?>
