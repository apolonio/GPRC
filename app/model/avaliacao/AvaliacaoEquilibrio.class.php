<?php

class AvaliacaoEquilibrio extends Adianti\Database\TRecord{
       
    const TABLENAME='system_avaliacao_equilibrio';
    const PRIMARYKEY ='codAvaliacaoEquilibrio';
    
    private $avaliador;
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('codPaciente');
        parent::addAttribute('codAvaliador');
        parent::addAttribute('media');
        parent::addAttribute('conclusao');
        parent::addAttribute('parecer');
        parent::addAttribute('dataAvaliacao');
 
    }
    public static function getPacienteEquilibrio($codPaciente)
    {
        $repository = new TRepository('AvaliacaoEquilibrio');    //codigo do Paciente da tabela paciente
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
