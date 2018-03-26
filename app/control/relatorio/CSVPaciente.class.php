<?php
/**
 * @class:    csvpaciente: Essa classe conecta em todas as tabelas e busca todos os campos
 * gerando um arquivo .csv para ser lido pelo excel
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CSVPaciente extends TPage
{
    private $form;      // search form
    private $datagrid;  // listing
    private $pageNavigation;
    private $loaded;
    
    /**
     * Class constructor
     * Creates the page, the search form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        new TSession;
        
        // creates the form
        $this->form = new TForm('form_search_paciente');
        
        // create the form fields
        $paciente   = new TEntry('codPaciente');
        $paciente->setSize(300);
      //  $paciente->setValue(TSession::getValue('codPaciente'));
        $table = new TTable;
        
        $row = $table->addRow();
        $cell=$row->addCell('Digite o Nome');
        $cell->width= 80;
        $row->addCell($paciente);
        $this->form->add($table);
        
        // creates the action button
        $button1=new TButton('find');
        $button1->setAction(new TAction(array($this, 'onSearch')), 'Buscar');
        $button1->setImage('ico_find.png');

      //  $button2=new TButton('new');
      //  $button2->setAction(new TAction(array('CustomerFormView', 'onEdit')), 'New');
      //  $button2->setImage('ico_new.png');
        
        $button3=new TButton('csv');
        $button3->setAction(new TAction(array($this, 'onExportCSV')), 'Excel');
        $button3->setImage('ico_print.png');
        
        $row->addCell($button1);
        $row->addCell($button3);
        
        $this->form->setFields(array($paciente, $button1, $button3));
        
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(200);

        // creates the datagrid columns
     //   $this->datagrid->addQuickColumn('Id', 'codPaciente', 'right', 40, new TAction(array($this, 'onReload')), array('order', 'id'));
        $this->datagrid->addQuickColumn('Paciente', 'codPaciente', 'left', 500, new TAction(array($this, 'onReload')), array('order', 'codPaciente'));
    

        // creates two datagrid actions
      //  $this->datagrid->addQuickAction('Edit', new TDataGridAction(array('CustomerFormView', 'onEdit')), 'id', 'ico_edit.png');
       // $this->datagrid->addQuickAction('Delete', new TDataGridAction(array($this, 'onDelete')), 'codExameComp', 'ico_delete.png');
        
        $this->datagrid->createModel();
        
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        $vbox->add($this->datagrid);
        $vbox->add($this->pageNavigation);
        
        parent::add($vbox);
    }
    
   
    function onSearch()
    {
        $data = $this->form->getData();
        
        if (isset($data->codPaciente))
        {
            $filter = new TFilter('codPaciente', 'like', "%{$data->codPaciente}%");
            
            TSession::setValue('codPaciente', $filter);
            
        }
        else
        {
            TSession::setValue('codPaciente', NULL);
        }
        
        $this->form->setData($data);
        
        $param=array();
        $param['offset']    =0;
        $param['first_page']=1;
        $this->onReload($param);
    }
    

    function onReload($param = NULL)
    {
        try
        {
            TTransaction::open('permission');
            
            $repository = new TRepository('AvaliacaoHiit');
            $limit = 20;
            
            $criteria = new TCriteria;
            
            $newparam = $param; 
          //  if (isset($newparam['order']) AND $newparam['order'] == 'system_complementar_exame->exame')
           // {
           //     $newparam['order'] = '(select codPaciente from system_avaliacao_hiit)';
           // }
            
            // default order
            if (empty($newparam['order']))
            {
                $newparam['order'] = 'codPaciente';
                $newparam['direction'] = 'asc';
            }
            
            $criteria->setProperties($newparam); // order, offset
            $criteria->setProperty('limit', $limit);
            
            if (TSession::getValue('codPaciente'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('codPaciente'));
            }
            
          
            $paciente = $repository->load( $criteria, FALSE);
            $this->datagrid->clear();
            
            if ($paciente)
            {
                foreach ($paciente as $pacientes)
                {
                    $this->datagrid->addItem($pacientes);
                }
            }
       
            
            // reset the criteria for record count
            $criteria->resetProperties();
            $count= $repository->count($criteria);
            
            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            
            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            // undo all pending operations
            TTransaction::rollback();
        }
    }
    
    function onExportCSV()
    {
        $this->onSearch();

        try
        {
            TTransaction::open('permission');
            
            $repository = new TRepository('AvaliacaoHiit');
            
            $criteria = new TCriteria;
            
            if (TSession::getValue('codPaciente'))
            {
                $criteria->add(TSession::getValue('codPaciente'));
            }
           
            $csv = '';
            $customers = $repository->load($criteria);
            if ($customers)
            {
                $csv .= $customer.'id'.';'.
                            $customer.'Paciente'.';'.
                            $customer.'Avaliador'.';'.
                            $customer.'Sessao'.';'.
                            $customer.'fcintervalar'.';'.
                            $customer.'fcintervalar2'.';'.
                            $customer.'fcalta1'.';'.
                            $customer.'fcalta2'.';'.
                            $customer.'bdi1'.';'.
                            $customer.'bdi2'.';'.
                            $customer.'bei1'.';'.
                            $customer.'bei2'.';'.
                            $customer.'bdf1'.';'.
                            $customer.'bdf2'.';'.
                            $customer.'bef1'.';'.
                            $customer.'bef2'.';'.
                            $customer.'fci'.';'.
                            $customer.'fcfim'.';'.
                            $customer.'sati'.';'.
                            $customer.'satfim'.';'.
                            $customer.'duracao'.';'.
                            $customer.'velocidade'.';'.
                            $customer.'assento'.';'.
                            $customer.'manivela'.';'.
                            $customer.'duracao2'.';'.
                            $customer.'velocidade2'.';'.
                            $customer.'tempoa'.';'.
                            $customer.'cicloergometro'.';'.
                            $customer.'rotacao'.';'.
                            $customer.'fcinicial'.';'.
                            $customer.'fcfinal'.';'.
                            $customer.'periodicidade'.';'.
                            $customer.'Data'."\n";
                foreach ($customers as $customer)
                {
                    $csv .= $customer->codHiit.';'.
                            $customer->codPaciente.';'.
                            $customer->codAvaliador.';'.
                            $customer->sessao.';'.
                            $customer->fcintervalar.';'.
                            $customer->fcintervalar2.';'.
                            $customer->fcalta1.';'.
                            $customer->fcalta2.';'.
                            $customer->bdi1.';'.
                            $customer->bdi2.';'.
                            $customer->bei1.';'.
                            $customer->bei2.';'.
                            $customer->bdf1.';'.
                            $customer->bdf2.';'.
                            $customer->bef1.';'.
                            $customer->bef2.';'.
                            $customer->fci.';'.
                            $customer->fcfim.';'.
                            $customer->sati.';'.
                            $customer->satfim.';'.
                            $customer->duracao.';'.
                            $customer->velocidade.';'.
                            $customer->assento.';'.
                            $customer->manivela.';'.
                            $customer->duracao2.';'.
                            $customer->velocidade2.';'.
                            $customer->assento2.';'.
                            $customer->tempoa.';'.
                            $customer->cicloergometro.';'.
                            $customer->rotacao.';'.
                            $customer->fcinicial.';'.
                            $customer->fcfinal.';'.
                            $customer->periodicidade.';'.
                            $customer->dataHiit."\n";
                }
                file_put_contents('app/output/avaliacao.csv', $csv);
                TPage::openFile('app/output/avaliacao.csv');
            }
            TTransaction::close();
        }
        catch (Exception $e) 
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            TTransaction::rollback();
        }

    }
    


    function show()
    {
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}
?>
