<?php
/**
 * Product Active Record
 * @author  Pablo Dall'Oglio
 */
class Prescricao extends TRecord
{
    const TABLENAME = 'system_prescricao';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    const CACHECONTROL = 'TAPCache';
    
    private $skills;
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        
//        parent::addAttribute('codPaciente');
//        parent::addAttribute('codAvaliador');
//        parent::addAttribute('diagnostico');
//        parent::addAttribute('funcional');
//        parent::addAttribute('ciclommss');
//        parent::addAttribute('ciclommii');
//        parent::addAttribute('frequencia');
//        parent::addAttribute('modalidade');
//        parent::addAttribute('tipotp');
//        parent::addAttribute('tempo');
//        parent::addAttribute('fcsup');
//        parent::addAttribute('fcinf');
//        parent::addAttribute('cmembros');
//        parent::addAttribute('duracaos');
//        parent::addAttribute('cargas');
//        parent::addAttribute('rpms');
//        parent::addAttribute('posicaos');
//        parent::addAttribute('cmembroi');
//        parent::addAttribute('duracaoi');
//        parent::addAttribute('cargai');
//        parent::addAttribute('rpmi');
//        parent::addAttribute('posicaoi');
//        parent::addAttribute('dataPresc');
//        parent::addAttribute('parecer');
    }
    
     public function clearParts()
    {
        $this->skills = array();
    }
      public function addSkill(ObjetivoClinico $object)
    {
        $this->skills[] = $object;
    }
    
    /**
     * Method getSkills
     * Return the Customer' Skill's
     * @return Collection of Skill
     */
    public function getSkills()
    {
        return $this->skills;
    }
    public function load($id)
    {                                            //model             //Model               //campo        //campo
        $this->skills = parent::loadAggregate('ObjetivoClinico', 'PrescricaoObjetivo', 'customer_id', 'skill_id', $id);
       // $this->contacts = parent::loadComposite('Contact', 'customer_id', $id);
    
        // load the object itself
        return parent::load($id);
    } 
       public function store()
    {
        // store the object itself
        parent::store();
                                                                        //objeto    //objetivos
        parent::saveAggregate('PrescricaoObjetivo', 'customer_id', 'skill_id', $this->id, $this->skills);
      //  parent::saveComposite('Contact', 'customer_id', $this->id, $this->contacts);
    }
       public function delete($id = NULL)
    {
        $id = isset($id) ? $id : $this->id;
        parent::deleteComposite('PrescricaoObjetivo', 'id', $id);
      //  parent::deleteComposite('Contact', 'customer_id', $id);
    
        // delete the object itself
        parent::delete($id);
    }
}
?>