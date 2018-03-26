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
class PesquisaPaciente extends TStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        parent::setDatabase('permission');                // defines the database
        parent::setActiveRecord('Paciente');            // defines the active record
        parent::setDefaultOrder('codigoPaciente', 'asc');          // defines the default order
        parent::addFilterField('nome', 'like'); // add a filter field
        parent::addFilterField('email', 'like'); // add a filter field
        parent::addFilterField('sexo', 'like'); // add a filter field

        
        // creates the form, with a table inside
        $this->form = new TQuickForm('form_search_paciente');
        $this->form->class = 'tform';
        $this->form->style = 'width: 650px';
        $this->form->setFormTitle('Dados Paciente');
   

        //Criando os campos
        $nome = new TEntry('nome');
        $dataNascimento = new TDate('dataNascimento');
        $sexo = new TCombo('sexo');
        $email = new TEntry('email');
        $peso = new TEntry('peso');
        $estatura = new TEntry('estatura');
        $telefone = new TEntry('telefone');
        
        $sex = array();
        $sex['0'] = 'Masculino';
        $sex['1'] = 'Feminino';
        $sexo->addItems($sex);
        
        // add a row for the filter field        $this->form->addQuickField('SU', $su, 200);
        $this->form->addQuickField('Nome', $nome, 250);
        $this->form->addQuickField('Sexo', $sexo, 100);
        $this->form->addQuickField('Email', $email, 250);
        //$this->form->addQuickField('Peso', $peso, 200);
        //$this->form->addQuickField('Estatura', $estatura, 200);
        //$this->form->addQuickField('IMC', $imc, 200);
        
        $this->form->setData( TSession::getValue('Product_filter_data') );
        $this->form->addQuickAction( _t('Find'), new TAction(array($this, 'onSearch')), 'ico_find.png');
        $this->form->addQuickAction( _t('New'),  new TAction(array('PacienteForm', 'onEdit')), 'ico_new.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(420);

        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'codigoPaciente', 'center', 50);
        $nome = $this->datagrid->addQuickColumn('Nome', 'nome', 'left', 300);
        $dataNascimento = $this->datagrid->addQuickColumn('Data Nasc.', 'dataNascimento', 'left', 150);
        $email = $this->datagrid->addQuickColumn('Email', 'email', 'left', 150);
        $sexo = $this->datagrid->addQuickColumn('Sexo', 'sexo', 'left', 50);
        $peso = $this->datagrid->addQuickColumn('Peso', 'peso', 'left', 50);
        $estatura = $this->datagrid->addQuickColumn('Estatura', 'estatura', 'left', 50);
        $imc = $this->datagrid->addQuickColumn('Telefone', 'telefone', 'left', 150);
  
       
        
        // create the datagrid actions
        $edit_action   = new TDataGridAction(array('PacienteForm', 'onEdit'));
        $delete_action = new TDataGridAction(array($this, 'onDelete'));
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), $edit_action, 'codigoPaciente', 'ico_edit.png');
        $this->datagrid->addQuickAction(_t('Delete'), $delete_action, 'codigoPaciente', 'ico_delete.png');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->add(new TXMLBreadCrumb('menu.xml', 'PesquisaPaciente'));
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }
}
?>


