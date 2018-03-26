<?php


class AvaliacaoMuscoesqueletica extends Adianti\Database\TRecord{
       
    const TABLENAME='system_muscoesqueletica';
    const PRIMARYKEY ='codMusco';
    const IDPOLICY =  'max'; // {max, serial}
    const CACHECONTROL = 'TAPCache';
    
    
       public function __construct($id = NULL)
    {
        parent::__construct($id);

    }

    
}