<?php
/**
 * @class: CadastroGrupoRemedio
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CadastroGrupoRemedio extends TPage
{
    private $form;     
    private $datagrid;  
    private $loaded;

    public function __construct()
    {
        parent::__construct();
        
        
        $this->form = new TQuickForm;
        $notebook = new TNotebook(200, 200);
        $notebook->appendPage('GPRC - Seja Bem Vindo!', $this->form);

        $descricaoGrupo = new TEntry('descricaoGrupo');
        
        $this->form->addQuickField('Classe Medicamento',$descricaoGrupo,450);
     //   $this->form->addQuickFields('SU',      array($su,     new TLabel('Fração'), $subunidade));
     

     //$this->form->addQuickField('Destino', $destino, 200);
     //$this->form->addQuickFields('Situação', array($viajem, new TLabel('Status'), $status));
        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
        
        parent::add($notebook);
        
    }
    
    public function onSave()
    {
        try
        {
            TTransaction::open('permission');
            
            $category = $this->form->getData('GrupoRemedio');
            
            $category->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Grupo Medicamento cadastrado com Sucesso!');

            $this->onReload();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            
            TTransaction::rollback();
        }
    }
    
    function onReload($param = NULL)
    {
        try
        {
            TTransaction::open('permission');
            
            $repository = new TRepository('GrupoRemedio');

            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codigoGrupoRemedio';
            $criteria->setProperty('order', $order);
        //    $criteria->add(new TFilter('situacao','!=','Finalizado');
            // load the objects according to criteria
            $categories = $repository->load($criteria);
            //$this->datagrid->onClear();
            if ($categories)
            {
                // iterate the collection of active records
                foreach ($categories as $category)
                {
                    // add the object inside the datagrid
                    //$this->datagrid->addItem($category);
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
     * Clear form
     */
    public function onClear()
    {
        $this->form->clear();
    }
    
    function show()
    {
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
   
}//fim da classe

?>
