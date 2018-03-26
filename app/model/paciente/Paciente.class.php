<?php
/**
 * @class:     Paciente: Classe cadastrar o Paciente
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc 
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2010 - 2017 Icriações (http://www.icriacoes.com.br)
 */

class Paciente extends Adianti\Database\TRecord {
    
    const TABLENAME='system_paciente';
    const PRIMARYKEY ='codigoPaciente';
    const IDPOLICY     =  'max'; // {max, serial}
    const CACHECONTROL = 'TAPCache';
    
      public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('nome');
        parent::addAttribute('dataNascimento');
        parent::addAttribute('email');
        parent::addAttribute('sexo');
        parent::addAttribute('peso');
        parent::addAttribute('estatura');
        parent::addAttribute('telefone');
    }
    
    public function getPaciente()
    {
        return ExameItem::getPacienteExame($this->codigoPaciente);
    }
    public function getEquilibrio()
    {
        return AvaliacaoEquilibrio::getPacienteEquilibrio($this->codigoPaciente);
    }
    public function getOmbro()
    {
        return AvaliacaoOmbros::getPacienteOmbros($this->codigoPaciente);
    }
    public function getWell()
    {
        return AvaliacaoWells::getPacienteWells($this->codigoPaciente);
    }
    public function getBDI()
    {
        return AvaliacaoBDI::getPacienteBDI($this->codigoPaciente);
    }
    public function getMinnesota()
    {
        return AvaliacaoMinnesota::getPacienteMinnesota($this->codigoPaciente);
    }
    
  
    
}
