<?php
/**
 * @class:     Relatorio Avaliador
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class RelatorioAvaliador extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->datagrid = new TQuickGrid;
        $this->datagrid->setHeight(320);
        
        $this->datagrid->class='tdatagrid_table customized-table';
        parent::include_css('app/resources/custom-table.css');

        // add the columns
        $this->datagrid->addQuickColumn('Id',    'codigoAvaliador',    'right', 70);
        $this->datagrid->addQuickColumn('Nome',    'nomeAvaliador',    'left', 180);
        $this->datagrid->addQuickColumn('Telefone',   'telefone',    'left', 160);
        $this->datagrid->addQuickColumn('Email',   'email',    'left', 160);
        $this->datagrid->addQuickColumn('Profissão',   'profissao',    'left', 160);

        
        $this->datagrid->addQuickAction('View',   new TDataGridAction(array($this, 'onView')),   'nomeAvaliador', 'ico_find.png');
                
        $this->datagrid->createModel();
        
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->datagrid);

        parent::add($vbox);
    }
    
     function onReload($param = NULL)
    {
        try
        {
            TTransaction::open('permission');
            
            $repository = new TRepository('Avaliador');
            
            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codigoAvaliador';
            $criteria->setProperty('order', $order);
            
            $categories = $repository->load($criteria);
            $this->datagrid->clear();
            if ($categories)
            {
                foreach ($categories as $category)
                {
                    $this->datagrid->addItem($category);
                }
            }
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            TTransaction::rollback();
        }
    }
        
    /**
     * method show()
     * Shows the page e seu conteúdo
     */
    function show()
    {
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }

    function onView($param)
    {
        $key=$param['key'];
        new TMessage('info', "Avaliador : $key");
    }
    

}
?>
