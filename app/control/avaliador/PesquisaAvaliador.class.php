<?php
/**
 * @class:     Pesquisa do Avaliador
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PesquisaAvaliador extends TStandardList
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
        parent::setActiveRecord('Avaliador');            // defines the active record
        parent::setDefaultOrder('codigoAvaliador', 'asc');          // defines the default order
        parent::addFilterField('nomeAvaliador', 'like'); // add a filter field
        parent::addFilterField('email', 'like'); // add a filter field

        
        // creates the form, with a table inside
        $this->form = new TQuickForm('form_search_avaliador');
        $this->form->class = 'tform';
        $this->form->style = 'width: 650px';
        $this->form->setFormTitle('Pesquisa de Avaliadores');
   

        //Criando os campos
        $nome = new TEntry('nomeAvaliador');
        $email = new TEntry('email');
         $telefone = new TEntry('telefone');
        
        // add a row for the filter field        $this->form->addQuickField('SU', $su, 200);
        $this->form->addQuickField('Nome', $nome, 250);
        $this->form->addQuickField('Telefone', $telefone, 200);
        $this->form->addQuickField('Email', $email, 250);
        
        $this->form->setData( TSession::getValue('Product_filter_data') );
        $this->form->addQuickAction( 'Pesquisar', new TAction(array($this, 'onSearch')), 'ico_find.png');
        $this->form->addQuickAction( 'Novo',  new TAction(array('AvaliadorForm', 'onEdit')), 'ico_new.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(420);

        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'codigoAvaliador', 'center', 50);
        $nome = $this->datagrid->addQuickColumn('Nome', 'nomeAvaliador', 'left', 300);
        $telefone = $this->datagrid->addQuickColumn('Telefone', 'telefone', 'left', 300);
        $email = $this->datagrid->addQuickColumn('Email', 'email', 'left', 150);
        $profissao = $this->datagrid->addQuickColumn('Profissão', 'profissao', 'left', 150);
        
        // create the datagrid actions
        $edit_action   = new TDataGridAction(array('AvaliadorForm', 'onEdit'));
        $delete_action = new TDataGridAction(array($this, 'onDelete'));
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction('Editar', $edit_action, 'codigoAvaliador', 'ico_edit.png');
        $this->datagrid->addQuickAction('Excluir', $delete_action, 'codigoAvaliador', 'ico_delete.png');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->add(new TXMLBreadCrumb('menu.xml', 'PesquisaAvaliador'));
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }
}
?>


