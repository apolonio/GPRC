<?php

class PrescricaoObjetivo extends TRecord
{
    const TABLENAME = 'system_prescricao_objetivo';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('customer_id');
        parent::addAttribute('skill_id');
    }
}
?>