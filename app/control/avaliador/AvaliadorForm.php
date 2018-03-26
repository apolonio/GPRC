<?php
/**
 * @class: Formulario Avaliador
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AvaliadorForm extends TStandardForm
{
    protected $form;
    
    function __construct()
    {
        parent::__construct();
        // creates the form
        $this->form = new TForm('form_Leave');
        $this->form = new TQuickForm('form_Avaliador');
        $this->form->class = 'tform'; // CSS class
        $this->form->style = 'width: 700px;';
   
        // defines the form title
        $this->form->setFormTitle('Avaliador');
        
        // define the database and the Active Record
        parent::setDatabase('permission'); //banco
        parent::setActiveRecord('Avaliador'); //tabela
        
    
        
        // create the form fields
        $id                              = new TEntry('codigoAvaliador');
        $nome                       = new TEntry('nomeAvaliador');
        $telefone                       = new TEntry('telefone');
        $telefone->setMask('(99)99999-9999');
        $email                         = new TEntry('email');
        $profissao                         = new TEntry('profissao');

        $id->setEditable( FALSE );

        // add the form fields
        $this->form->addQuickField('ID', $id,  50);
        $this->form->addQuickField('Nome', $nome,  300);
         $this->form->addQuickField('Telefone', $telefone,  300);
        $this->form->addQuickField('Email', $email,  300);
        $this->form->addQuickField('Profissão', $profissao,  300);
   
        // add the actions
        $this->form->addQuickAction('Salvar', new TAction(array($this, 'onSave')), 'ico_save.png');
        $this->form->addQuickAction('Novo', new TAction(array($this, 'onEdit')), 'ico_new.png');
        $this->form->addQuickAction('Pesquisar', new TAction(array('PesquisaAvaliador', 'onReload')), 'ico_back.png');

        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', 'PesquisaAvaliador'));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Overloaded method onSave()
     * Executed whenever the user clicks at the save button
     */
    public function onSave()
    {
        // first, use the default onSave()
        $object = parent::onSave();
        

    }
  
}
?>

