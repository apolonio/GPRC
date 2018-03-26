 <?php
/**
 * @class:     RelatorioVentilatoria
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class RelatorioVentilatoria extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(600);
        
        // define the CSS class
        $this->datagrid->class='tdatagrid_table customized-table';
        // import the CSS file
        parent::include_css('app/resources/custom-table.css');

        // add the columns
        $this->datagrid->addQuickColumn('Id',    'codVent',    'right', 70);
        $this->datagrid->addQuickColumn('Paciente',    'codigoPaciente',    'left', 180);
        $this->datagrid->addQuickColumn('Avaliadro', 'codigoAvaliador', 'left', 180);
        $this->datagrid->addQuickColumn('FC',   'fc',    'left', 160);
        $this->datagrid->addQuickColumn('PA',   'pa1',    'left', 160);
        $this->datagrid->addQuickColumn('Sat',   'sat',    'left', 160);
        $this->datagrid->addQuickColumn('SIndex',   'sindex',    'left', 160);
        $this->datagrid->addQuickColumn('PImáx',   'pimax',    'left', 160);
        $this->datagrid->addQuickColumn('Data',   'dataVent',    'left', 160);
        
        $action = new TDataGridAction(array($this, 'onView'));
        $action->setUseButton(TRUE);
        $this->datagrid->addQuickAction('View', $action, 'name', 'fa:search green');
                
        // creates the datagrid model
        $this->datagrid->createModel();
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->datagrid);

        parent::add($vbox);
    }
    
    /**
     * Load the data into the datagrid
     */
    function onReload()
    {
        $this->datagrid->clear();
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code     = '1';
        $item->name     = 'Fábio Locatelli';
        $item->address  = 'Rua Expedicionario';
        $item->fone     = '1111-1111';
        $this->datagrid->addItem($item);
        

    }
    
    /**
     * method onView()
     * Executed when the user clicks at the view button
     */
    function onView($param)
    {
        // get the parameter and shows the message
        $key=$param['key'];
        new TMessage('info', "The name is : $key");
    }
    
    /**
     * shows the page
     */
    function show()
    {
        $this->onReload();
        parent::show();
    }
}
?>
