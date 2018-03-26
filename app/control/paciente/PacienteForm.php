<?php
/**
 * @class: csvpaicente
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PacienteForm extends TStandardForm
{
    protected $form;
    
    function __construct()
    {
        parent::__construct();
        // creates the form
        $this->form = new TForm('form_Leave');
        $this->form = new TQuickForm('form_Paciente');
        $this->form->class = 'tform'; // CSS class
        $this->form->style = 'width: 700px;';
   
        // defines the form title
        $this->form->setFormTitle('Paciente');
        
        // define the database and the Active Record
        parent::setDatabase('permission'); //banco
        parent::setActiveRecord('Paciente'); //tabela
        
    
        
        // create the form fields
        $id                              = new TEntry('codigoPaciente');
        $nome                       = new TEntry('nome');
        $email                         = new TEntry('email');
        $dataNascimento                              = new TDate('dataNascimento');
        $sexo                    = new TCombo('sexo');
        $peso = new TEntry('peso');
        $telefone = new TEntry('telefone');
        $telefone->setMask('(99)99999-9999');
        $estatura = new TEntry('estatura');
        

        $sex = array();
        $sex['0'] = 'Masculino';
        $sex['1'] = 'Feminino';
        $sexo->addItems($sex);
       

        $id->setEditable( FALSE );

        // add the form fields
        $this->form->addQuickField('ID', $id,  50);
        $this->form->addQuickField('Nome', $nome,  300);
        $this->form->addQuickField('Data Nascimento', $dataNascimento,  150);
        $this->form->addQuickField('Sexo', $sexo, 150);
        $this->form->addQuickField('Email', $email,  300);
        $this->form->addQuickField('Peso', $peso,  120);
        $this->form->addQuickField('Estatura', $estatura,  120);
        $this->form->addQuickField('Telefone', $telefone,  150);
      
   
        // add the actions
        $this->form->addQuickAction(_t('Save'), new TAction(array($this, 'onSave')), 'ico_save.png');
        $this->form->addQuickAction(_t('New'), new TAction(array($this, 'onEdit')), 'ico_new.png');
        $this->form->addQuickAction(_t('Find'), new TAction(array('PesquisaPaciente', 'onReload')), 'ico_back.png');

        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', 'PesquisaPaciente'));
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
        
        // if the object has been saved
//        if ($object instanceof Voo)
//        {
//         //   $source_file   = 'tmp/'.$object->photo_path;
//         //   $target_file   = 'images/' . $object->photo_path;
//         //   $finfo = new finfo(FILEINFO_MIME_TYPE);
//            
//            // if the user uploaded a source file
//            if (file_exists($source_file) AND $finfo->file($source_file) == 'image/png')
//            {
//                // move to the target directory
//              //  rename($source_file, $target_file);
//                
//                try
//                {
//                    TTransaction::open($this->database);
//                    // update the photo_path
//                 //   $object->photo_path = 'images/'.$object->photo_path;
//                    $object->store();
//                    TTransaction::close();
//                }
//                catch (Exception $e) // in case of exception
//                {
//                    new TMessage('error', '<b>Error</b> ' . $e->getMessage());
//                    TTransaction::rollback();
//                }
//            }
//        }
    }
  
}
?>

