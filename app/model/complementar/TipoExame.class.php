<?php
/** 
 * Esser Relatorio exibi dados da tabela system_militar
 * @copyright (c) 2016, Apolonio S. S. Junior ICRIACOES Sistemas Web!s - 2ºSgt Santiago
 * @email apolocomputacao@gmail.com
 */
class TipoExame extends Adianti\Database\TRecord {
    
    const TABLENAME='system_tipo_exames';
    const PRIMARYKEY ='codTipoExame';
    const IDPOLICY =  'max'; // {max, serial}
    
     public function __construct($id = NULL)
    {
        parent::__construct($id);
        
        parent::addAttribute('descricaoTipoExame');
    }
    public static function getPacienteExame($codPaciente)
    {
        $repository = new TRepository('ExameItem');   
        return $repository->where('codPaciente', '=', $codPaciente)->load();
    }
    
}

?>
