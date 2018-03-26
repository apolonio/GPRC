<?php
/**
 * GPRc
 */
class ExameItem extends TRecord
{
    const TABLENAME = 'system_exame_item';
    const PRIMARYKEY= 'codExameItem';

    private $tipoExame;
    private $paciente;
    private $avaliador;

 
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('codTipoExame');
        parent::addAttribute('codPaciente');
        parent::addAttribute('codAvaliador');
        parent::addAttribute('parecer');
        parent::addAttribute('file_path');
        parent::addAttribute('dataExameItem');
    }

    public static function getPacienteExame($codPaciente)
    {
        $repository = new TRepository('ExameItem');   
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
    public function set_tipoExame(TipoExame $object)
    {
        $this->tipoExame = $object;
        $this->codTipoExame = $object->codTipoExame;
    }
   
    public function get_tipoExame()
    {
        if (empty($this->tipoExame))
            $this->tipoExame = new TipoExame($this->codTipoExame);
        return $this->tipoExame;
    }




}
?>