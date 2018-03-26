<?php

/**
 * @class:     PesquisaTreinamentoResistido
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PesquisaTreinamentoResistido  extends TStandardList
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
        parent::setActiveRecord('AvaliacaoTreinamentoResistido');           
        parent::setDefaultOrder('codTr', 'desc');         
        parent::addFilterField('codPaciente', '='); 
        
        // creates the form, with a table inside
        $this->form = new TQuickForm('form_pesquisa_tr');
        $this->form->class = 'tform';
        $this->form->style = 'width: 650px';
        $this->form->setFormTitle('Pesquisa Treinamento Resistido');

        //Criando os campos
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');

        $this->form->addQuickField('Paciente', $codPaciente, 250);
        
        $this->form->setData( TSession::getValue('Resistido_filter_data') );
        $this->form->addQuickAction( _t('Find'), new TAction(array($this, 'onSearch')), 'ico_find.png');
        $this->form->addQuickAction( _t('New'),  new TAction(array('TreinamentoResistido', 'onEdit')), 'ico_new.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(420);

        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'codTr', 'center', 50);
        $codPaciente = $this->datagrid->addQuickColumn('Paciente', 'codPaciente', 'left', 150);
        $sessao = $this->datagrid->addQuickColumn('Sessão', 'sessao', 'left', 50);
        $periodicidade = $this->datagrid->addQuickColumn('Freq.', 'periodicidade', 'left', 50);
        $tempoD = $this->datagrid->addQuickColumn('Tempo', 'tempoD', 'left', 50);
        $minutos = $this->datagrid->addQuickColumn('Minutos', 'minutos', 'left', 50);
        $bdi1 = $this->datagrid->addQuickColumn('BDI1', 'bdi1', 'left', 50);
        $bdi2 = $this->datagrid->addQuickColumn('BDI2', 'bdi2', 'left', 50);
        $bei1 = $this->datagrid->addQuickColumn('BEI1', 'bei1', 'left', 50);
        $bei2 = $this->datagrid->addQuickColumn('BEI2', 'bei2', 'left', 50);
        $bdf1 = $this->datagrid->addQuickColumn('BDF1', 'bdf1', 'left', 50);
        $bdf2 = $this->datagrid->addQuickColumn('BDF2', 'bdf2', 'left', 50);
        $bef1 = $this->datagrid->addQuickColumn('BEF1', 'bef1', 'left', 50);
        $bef2 = $this->datagrid->addQuickColumn('BEF2', 'bef2', 'left', 50);
        $fci = $this->datagrid->addQuickColumn('FC Início', 'fci', 'left', 50);
        $fcfim = $this->datagrid->addQuickColumn('FC Fim', 'fcfim', 'left', 50);
        $sati = $this->datagrid->addQuickColumn('SatInicio', 'sati', 'left', 50);
        $satfim = $this->datagrid->addQuickColumn('SatFim', 'satfim', 'left', 50);
        $fcinf = $this->datagrid->addQuickColumn('FCINF', 'fcinf', 'left', 50);
        $fcinf2 = $this->datagrid->addQuickColumn('FCINF2', 'fcinf2', 'left', 50);
        $fcalta = $this->datagrid->addQuickColumn('FCALTA1', 'fcalta', 'left', 50);
        $fcalta2 = $this->datagrid->addQuickColumn('FCALTA2', 'fcalta2', 'left', 50);
       
        // create the datagrid actions
        $edit_action   = new TDataGridAction(array('TreinamentoResistidoForm', 'onEdit'));
        $delete_action = new TDataGridAction(array($this, 'onDelete'));
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), $edit_action, 'codTr', 'ico_edit.png');
        $this->datagrid->addQuickAction(_t('Delete'), $delete_action, 'codTr', 'ico_delete.png');
       
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->add(new TXMLBreadCrumb('menu.xml', 'PesquisaTreinamentoResistido'));
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }
}
?>



