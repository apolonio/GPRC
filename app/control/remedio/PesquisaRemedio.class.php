<?php
/**
 * @class: PesquisaRemedio
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PesquisaRemedio extends TStandardList
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
        parent::setActiveRecord('Remedio');            // defines the active record
        parent::setDefaultOrder('codigoRemedio', 'asc');          // defines the default order
        parent::addFilterField('descricaoRemedio', 'like'); // add a filter field

        
        // creates the form, with a table inside
        $this->form = new TQuickForm('form_search_medicamento');
        $this->form->class = 'tform';
        $this->form->style = 'width: 650px';
        $this->form->setFormTitle('Pesquisa Remédio');
   

        //Criando os campos
        
        $codigoGrupoRemedio = new TEntry('codigoGrupoRemedio');
        $descricaoRemedio= new TEntry('descricaoRemedio');
        
        // add a row for the filter field        $this->form->addQuickField('SU', $su, 200);
        $this->form->addQuickField('Classe', $codigoGrupoRemedio, 250);
        $this->form->addQuickField('Medicamento', $descricaoRemedio, 100);
        
        $this->form->setData( TSession::getValue('Product_filter_data') );
        $this->form->addQuickAction( 'Pesquisar', new TAction(array($this, 'onSearch')), 'ico_find.png');
      //  $this->form->addQuickAction( _t('New'),  new TAction(array('PacienteForm', 'onEdit')), 'ico_new.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(420);

        // creates the datagrid columns
        $codigoRemedio = $this->datagrid->addQuickColumn('ID', 'codigoRemedio', 'center', 50);
        $codigoGrupoRemedio = $this->datagrid->addQuickColumn('Classe', 'codigoGrupoRemedio', 'left', 300);
        $descricaoRemedio = $this->datagrid->addQuickColumn('Medicamento', 'descricaoRemedio', 'left', 150);
        
        // create the datagrid actions
       // $edit_action   = new TDataGridAction(array('PacienteForm', 'onEdit'));
        $delete_action = new TDataGridAction(array($this, 'onDelete'));
        
        // add the actions to the datagrid
      //  $this->datagrid->addQuickAction(_t('Edit'), $edit_action, 'codigoRemedio', 'ico_edit.png');
        $this->datagrid->addQuickAction(_t('Delete'), $delete_action, 'codigoRemedio', 'ico_delete.png');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->add(new TXMLBreadCrumb('menu.xml', 'PesquisaRemedio'));
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }
}
?>


