<?php

class AvaliacaoWells extends Adianti\Database\TRecord{
       
    const TABLENAME='system_avaliacao_wells';
    const PRIMARYKEY ='codWells';
    
    private $avaliador;

    public static function getPacienteWells($codPaciente)
    {
        $repository = new TRepository('AvaliacaoWells');    //codigo do Paciente da tabela paciente
        return $repository->where('codPaciente', '=', $codPaciente)->load();
    }

    public function set_avaliador(Avaliador $object)
    {
        $this->avaliador = $object;
        $this->codigoAvaliador = $object->codAvaliador;
    }
    
    /**
     * Method get_product
     * Sample of usage: $sale_item->product->attribute;
     * @returns Product instance
     */
    public function get_avaliador()
    {
        // loads the associated object
        if (empty($this->avaliador))
            $this->avaliador = new Avaliador($this->codAvaliador);
    
        // returns the associated object
        return $this->avaliador;
  
    }
        
    }
?>