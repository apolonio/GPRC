<?php
/**
 * @class:     PesquisaMuscoesqueletica
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PesquisaAvaliacaoMuscoesqueletica extends TStandardList
{
    protected $form;    
    protected $datagrid; 
    protected $pageNavigation;
  
    /**
     * Função de Pesquisa Muscoesquelética
     */
    public function __construct()
    {
        parent::__construct();
        
        parent::setDatabase('permission');                
        parent::setActiveRecord('AvaliacaoMuscoesqueletica');           
        parent::setDefaultOrder('codFM', 'desc');         
        parent::addFilterField('codPaciente', 'like'); 
       // parent::addFilterField('modalidade', '='); 
        
        // creates the form, with a table inside
        $this->form = new TQuickForm('pesquisa_Avaliacao');
        $this->form->class = 'tform';
        $this->form->style = 'width: 650px';
        $this->form->setFormTitle('Pesquisa de Avaliação Muscoesquelética');

        //Criando os campos
        $codPaciente    = new TEntry('codPaciente');
       // $modalidade = new TEntry('modalidade');

        $this->form->addQuickField('Pesquise o Paciente', $codPaciente, 250);
     //   $this->form->addQuickField('Modalidade', $modalidade, 250);
        
        $this->form->setData( TSession::getValue('Muscoesqueletica_filter_data') );
        $this->form->addQuickAction( _t('Find'), new TAction(array($this, 'onSearch')), 'ico_find.png');
        $this->form->addQuickAction( _t('New'),  new TAction(array('Muscoesqueletica', 'onEdit')), 'ico_new.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(420);

        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'codFM', 'center', 50);
        $codPaciente = $this->datagrid->addQuickColumn('Paciente', 'codPaciente', 'left', 150);
        $dataFM = $this->datagrid->addQuickColumn('Data', 'dataFM', 'left', 150);
      
        
        // create the datagrid actions
        $edit_action   = new TDataGridAction(array('AvaliacaoMuscoesqueleticaForm', 'onEdit'));
        $delete_action = new TDataGridAction(array($this, 'onDelete'));
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), $edit_action, 'codFM', 'ico_edit.png');
        $this->datagrid->addQuickAction(_t('Delete'), $delete_action, 'codFM', 'ico_delete.png');
       
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->add(new TXMLBreadCrumb('menu.xml', 'PesquisaAvaliacaoMuscoesqueletica'));
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }
}
?>

        


