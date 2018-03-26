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
class PesquisaPrescricao extends TStandardList
{
    protected $form;    
    protected $datagrid; 
    protected $pageNavigation;
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        parent::setDatabase('permission');                
        parent::setActiveRecord('Prescricao');           
        parent::setDefaultOrder('id', 'desc');         
        parent::addFilterField('codPaciente', '='); 
       // parent::addFilterField('modalidade', '='); 
        
        // creates the form, with a table inside
        $this->form = new TQuickForm('form_pesquisa_prescricao');
        $this->form->class = 'tform';
        $this->form->style = 'width: 650px';
        $this->form->setFormTitle('Pesquisa Prescrição');

        //Criando os campos
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
       // $modalidade = new TEntry('modalidade');

        $this->form->addQuickField('Paciente', $codPaciente, 250);
     //   $this->form->addQuickField('Modalidade', $modalidade, 250);
        
        $this->form->setData( TSession::getValue('Prescricao_filter_data') );
        $this->form->addQuickAction( _t('Find'), new TAction(array($this, 'onSearch')), 'ico_find.png');
        $this->form->addQuickAction( _t('New'),  new TAction(array('AvaliacaoPrescricao', 'onEdit')), 'ico_new.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(420);

        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'id', 'center', 50);
        $codPaciente = $this->datagrid->addQuickColumn('Paciente', 'codPaciente', 'left', 150);
        //$codAvaliador = $this->datagrid->addQuickColumn('Avaliador', 'codAvaliador', 'left', 150);
       
        $frequencia = $this->datagrid->addQuickColumn('Freq.', 'frequencia', 'left', 50);
        $tempo = $this->datagrid->addQuickColumn('Tempo', 'tempo', 'left', 50);
        $fcsup = $this->datagrid->addQuickColumn('FC.Sup', 'fcsup', 'left', 50);
        $fcinf = $this->datagrid->addQuickColumn('FC.Inf', 'fcinf', 'left', 50);
        $durcaos = $this->datagrid->addQuickColumn('Duração', 'duracaos', 'left', 50);
        $cargas = $this->datagrid->addQuickColumn('Carga', 'cargas', 'left', 50);
        $rpms = $this->datagrid->addQuickColumn('RPM', 'rpms', 'left', 50);
        $posicaos = $this->datagrid->addQuickColumn('Posição', 'posicaos', 'left', 50);
        $duracaoi = $this->datagrid->addQuickColumn('Duração', 'duracaoi', 'left', 50);
        $cargai = $this->datagrid->addQuickColumn('Carga', 'cargai', 'left', 50);
        $rpmi = $this->datagrid->addQuickColumn('RPM', 'rpmi', 'left', 50);
        $posicaoi = $this->datagrid->addQuickColumn('Posição', 'posicaoi', 'left', 50);
        // create the datagrid actions
        $edit_action   = new TDataGridAction(array('PrescricaoForm', 'onEdit'));
        $delete_action = new TDataGridAction(array($this, 'onDelete'));
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), $edit_action, 'id', 'ico_edit.png');
        $this->datagrid->addQuickAction(_t('Delete'), $delete_action, 'id', 'ico_delete.png');
       
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->add(new TXMLBreadCrumb('menu.xml', 'PesquisaPrescricao'));
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }
}
?>


