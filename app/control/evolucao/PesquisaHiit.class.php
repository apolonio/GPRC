<?php

/**
 * @class:     PesquiaHiit
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PesquisaHiit extends TStandardList
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
        parent::setActiveRecord('AvaliacaoHiit');           
        parent::setDefaultOrder('codHiit', 'desc');         
        parent::addFilterField('codPaciente', '='); 
        
        // creates the form, with a table inside
        $this->form = new TQuickForm('form_pesquisa_hiit');
        $this->form->class = 'tform';
        $this->form->style = 'width: 650px';
        $this->form->setFormTitle('Pesquisa HIIT');

        //Criando os campos
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
       // $modalidade = new TEntry('modalidade');

        $this->form->addQuickField('Paciente', $codPaciente, 250);
     //   $this->form->addQuickField('Modalidade', $modalidade, 250);
        
        $this->form->setData( TSession::getValue('Hiit_filter_data') );
        $this->form->addQuickAction( _t('Find'), new TAction(array($this, 'onSearch')), 'ico_find.png');
        $this->form->addQuickAction( _t('New'),  new TAction(array('HIIT', 'onEdit')), 'ico_new.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(420);

        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'codHiit', 'center', 50);
        $codPaciente = $this->datagrid->addQuickColumn('Paciente', 'codPaciente', 'left', 150);
        $sessao = $this->datagrid->addQuickColumn('Sessão', 'sessao', 'left', 50);
        $dataH = $this->datagrid->addQuickColumn('Data', 'dataHiit', 'left', 50);
       
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
        $fcintervalar = $this->datagrid->addQuickColumn('FCI', 'fcintervalar', 'left', 50);
        $fcintervalar2 = $this->datagrid->addQuickColumn('FCI2', 'fcintervalar2', 'left', 50);
        $fcalta1 = $this->datagrid->addQuickColumn('FCALTA1', 'fcalta1', 'left', 50);
        $fcalta2 = $this->datagrid->addQuickColumn('FCALTA2', 'fcalta2', 'left', 50);
        
        $duracao = $this->datagrid->addQuickColumn('Duração', 'duracao', 'left', 50);
        $velocidade = $this->datagrid->addQuickColumn('Vel.', 'velocidade', 'left', 50);
        $assento = $this->datagrid->addQuickColumn('Assento', 'assento', 'left', 50);
        $manivela = $this->datagrid->addQuickColumn('Manivela', 'manivela', 'left', 50);
        $duracao2 = $this->datagrid->addQuickColumn('Duração', 'duracao2', 'left', 50);
        $velocidade2 = $this->datagrid->addQuickColumn('Vel.', 'velocidade2', 'left', 50);
        $assento2 = $this->datagrid->addQuickColumn('Assento', 'assento2', 'left', 50);
        
        $tempoa = $this->datagrid->addQuickColumn('Tempo', 'tempoa', 'left', 50);
        $rotacao = $this->datagrid->addQuickColumn('Rotação', 'rotacao', 'left', 50);
        $fcinicial = $this->datagrid->addQuickColumn('FCInicial', 'fcinicial', 'left', 50);
        $fcfinal = $this->datagrid->addQuickColumn('FCFinal', 'fcfinal', 'left', 50);
        // create the datagrid actions
        $edit_action   = new TDataGridAction(array('HiitForm', 'onEdit'));
        $delete_action = new TDataGridAction(array($this, 'onDelete'));
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), $edit_action, 'codHiit', 'ico_edit.png');
        $this->datagrid->addQuickAction(_t('Delete'), $delete_action, 'codHiit', 'ico_delete.png');
       
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->add(new TXMLBreadCrumb('menu.xml', 'PesquisaHiit'));
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }
}
?>




