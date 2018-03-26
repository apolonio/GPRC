<?php
/**
 * Product Active Record
 * @author  Pablo Dall'Oglio
 */
class ObjetivoClinico extends TRecord
{
    const TABLENAME = 'system_objetivo_clinico';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        
        parent::addAttribute('name');
    }
}
?>