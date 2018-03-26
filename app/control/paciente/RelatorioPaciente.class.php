<?php
/** 
 * Esser Relatorio exibi dados da tabela system_militar e permiti exportar arquivo csv(excel)
 * class CustomerDataGridView extends TPage
 * @class: csvpaicente
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class RelatorioPaciente extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(320);
        
        // define the CSS class
        $this->datagrid->class='tdatagrid_table customized-table';
        // import the CSS file
        parent::include_css('app/resources/custom-table.css');

        // add the columns
        $this->datagrid->addQuickColumn('Id',    'codigoPaciente',    'right', 50);
        $this->datagrid->addQuickColumn('Nome',    'nome',    'left', 300);
        $this->datagrid->addQuickColumn('Email',   'email',    'left', 200);
        $this->datagrid->addQuickColumn('Data Nascimento',   'dataNascimento',    'left', 100);
        $this->datagrid->addQuickColumn('Sexo', 'sexo', 'left', 50);
        $this->datagrid->addQuickColumn('Peso',   'peso',    'left', 50);
        $this->datagrid->addQuickColumn('Estatura',   'estatura',    'left', 50);
        $this->datagrid->addQuickColumn('Telefone',   'telefone',    'left', 50);
   
       // DATE_FORMAT(data, '%d/%m/%y')
        
        $this->datagrid->addQuickAction('View',   new TDataGridAction(array($this, 'onView')),   'nome', 'ico_find.png');
                
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->datagrid);

        parent::add($vbox);
    }
    
     function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('permission');
            
            // creates a repository for Category
            $repository = new TRepository('Paciente');
            
            // creates a criteria, ordered by id
            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codigoPaciente';
            $criteria->setProperty('order', $order);
            
            // load the objects according to criteria
            $categories = $repository->load($criteria);
            $this->datagrid->clear();
            if ($categories)
            {
                // iterate the collection of active records
                foreach ($categories as $category)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($category);
                }
            }
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
        
    /**
     * method show()
     * Shows the page e seu conteúdo
     */
    function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }

    /**
     * method onView()
     * Executed when the user clicks at the view button
     */
    function onView($param)
    {
        // get the parameter and shows the message
        $key=$param['key'];
        new TMessage('info', "Paciente : $key");
    }
    

}
?>
