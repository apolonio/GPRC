<?php

/** 
 * Esser Relatorio exibi dados da tabela system_militar
 * @copyright (c) 2016, Apolonio S. S. Junior ICRIACOES Sistemas Web!s - 2ºSgt Santiago
 * @email apolocomputacao@gmail.com
 */
class AvaliacaoMinnesota extends Adianti\Database\TRecord {

    const TABLENAME='system_avaliacao_minnesota';
    const PRIMARYKEY ='codMin';
    
    private $avaliador;
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('codPaciente');
        parent::addAttribute('codAvaliador');
        parent::addAttribute('conclusao');
        parent::addAttribute('parecer');
        parent::addAttribute('dataMin');
 
    }
       public static function getPacienteMinnesota($codPaciente)
    {
        $repository = new TRepository('AvaliacaoMinnesota');    
        return $repository->where('codPaciente', '=', $codPaciente)->load();
    }

    public function set_avaliador(Avaliador $object)
    {
        $this->avaliador = $object;
        $this->codigoAvaliador = $object->codAvaliador;
    }
   
    public function get_avaliador()
    {
        if (empty($this->avaliador))
            $this->avaliador = new Avaliador($this->codAvaliador);
        return $this->avaliador;
    }
}

?>

