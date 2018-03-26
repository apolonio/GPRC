<?php

class AvaliacaoOmbros extends Adianti\Database\TRecord{
       
    const TABLENAME='system_avaliacao_ombros';
    const PRIMARYKEY ='codAvaliacaoOmbros';
    
    private $avaliador;
    
      public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('codPaciente');
        parent::addAttribute('codAvaliador');
        parent::addAttribute('media');
        parent::addAttribute('maoDominante');
        parent::addAttribute('conclusao');
        parent::addAttribute('parecer');
        parent::addAttribute('dataAvaliacao');
 
    }
          public static function getPacienteOmbros($codPaciente)
    {
        $repository = new TRepository('AvaliacaoOmbros');    
        return $repository->where('codPaciente', '=', $codPaciente)->load(); //codigo do Paciente da tabela paciente
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
