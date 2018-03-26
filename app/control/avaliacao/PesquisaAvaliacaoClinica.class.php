<?php
/**
 * @class:     PesquisaAvaliacaoClinica: Essa classe pesquisa todos os resultados na tabela sytem_avaliacao_clinica
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PesquisaAvaliacaoClinica extends TStandardList
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
        parent::setActiveRecord('AvaliacaoClinica');           
        parent::setDefaultOrder('codAva', 'desc');         
        parent::addFilterField('codPaciente', 'like'); 
       // parent::addFilterField('modalidade', '='); 
        
        // creates the form, with a table inside
        $this->form = new TQuickForm('pesquisa_Avaliacao');
        $this->form->class = 'tform';
        $this->form->style = 'width: 650px';
        $this->form->setFormTitle('Pesquisa de Avaliação Clínica do Paciente');

        //Criando os campos
        $codPaciente    = new TEntry('codPaciente');
       // $modalidade = new TEntry('modalidade');

        $this->form->addQuickField('Pesquise o Paciente', $codPaciente, 250);
     //   $this->form->addQuickField('Modalidade', $modalidade, 250);
        
        $this->form->setData( TSession::getValue('Prescricao_filter_data') );
        $this->form->addQuickAction( _t('Find'), new TAction(array($this, 'onSearch')), 'ico_find.png');
        $this->form->addQuickAction( _t('New'),  new TAction(array('AvaliacaoPaciente', 'onEdit')), 'ico_new.png');
        
        // creates a DataGrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(420);

        // creates the datagrid columns
        $id = $this->datagrid->addQuickColumn('ID', 'codAva', 'center', 50);
        $codPaciente = $this->datagrid->addQuickColumn('Paciente', 'codPaciente', 'left', 150);
        $dataAva = $this->datagrid->addQuickColumn('Data', 'dataAva', 'left', 150);
      
        $hipDiag = $this->datagrid->addQuickColumn('Hip.Diag', 'hipoDiag', 'left', 50);
        $hipoCli = $this->datagrid->addQuickColumn('Hip.Cli', 'hipoClin', 'left', 50);
        $peso = $this->datagrid->addQuickColumn('FC.Sup', 'peso', 'left', 50);
        $estatura = $this->datagrid->addQuickColumn('FC.Inf', 'estatura', 'left', 50);
        $circAbdominal = $this->datagrid->addQuickColumn('CircAbd.', 'circAbdominal', 'left', 50);
        $cicQuadril = $this->datagrid->addQuickColumn('CircQuadril', 'circQuadril', 'left', 50);
        $frequencia = $this->datagrid->addQuickColumn('Freq.', 'frequencia', 'left', 50);
        $pressao1 = $this->datagrid->addQuickColumn('Pressaão1', 'pressao1', 'left', 50);
        $pressao2 = $this->datagrid->addQuickColumn('Pressão2', 'pressao2', 'left', 50);
        $A0 = $this->datagrid->addQuickColumn('A0', 'a0', 'left', 50);
        $AE = $this->datagrid->addQuickColumn('AE', 'ae', 'left', 50);
        $S = $this->datagrid->addQuickColumn('S', 's', 'left', 50);
        $PP = $this->datagrid->addQuickColumn('PP', 'pp', 'left', 50);
        $VE = $this->datagrid->addQuickColumn('VE', 've', 'left', 50);
        $FE = $this->datagrid->addQuickColumn('FE', 'fe', 'left', 50);
        // create the datagrid actions
        $edit_action   = new TDataGridAction(array('AvaliacaoClinicaForm', 'onEdit'));
        $delete_action = new TDataGridAction(array($this, 'onDelete'));
        
        // add the actions to the datagrid
        $this->datagrid->addQuickAction(_t('Edit'), $edit_action, 'codAva', 'ico_edit.png');
        $this->datagrid->addQuickAction(_t('Delete'), $delete_action, 'codAva', 'ico_delete.png');
       
        // create the datagrid model
        $this->datagrid->createModel();
        
        // create the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // create the page container
        $container = new TVBox;
        $container->add(new TXMLBreadCrumb('menu.xml', 'PesquisaAvaliacaoClinica'));
        $container->add($this->form);
        $container->add($this->datagrid);
        $container->add($this->pageNavigation);
        
        parent::add($container);
    }
}
?>

        


