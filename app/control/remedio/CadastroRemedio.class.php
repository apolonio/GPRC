<?php
/**
 * @class: cadastroremedio
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CadastroRemedio extends TPage
{
    private $form;     
    private $datagrid;  
    private $loaded;

    public function __construct()
    {
        parent::__construct();
        
        parent::add(new TLabel('Preencha todos os campos sempre que possível!'));
       // parent::add(new TLabel('NOVAS FUNCIONALIDADES: '));
        
        $this->form = new TQuickForm;
        $notebook = new TNotebook(350, 250);
        $notebook->appendPage('GPRC - Seja Bem Vindo!', $this->form);

                                                    //campoDestino                                           //TRecord         Nome na Caixa        Valores que vem da tabela
        $codigoGrupoRemedio    = new TDBSeekButton('codigoGrupoRemedio', 'permission', $this->form->getName(), 'GrupoRemedio', 'descricaoGrupo', 'codigoGrupoRemedio', 'codigoGrupoRemedio');
        $descricaoRemedio = new TEntry('descricaoRemedio');

        
        $this->form->addQuickField('Classe Medicamento',$codigoGrupoRemedio,350);
        $this->form->addQuickField('Descrição Medicamento',$descricaoRemedio,350);     


        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
        
        parent::add($notebook);
        
    }
    
    public function onSave()
    {
        try
        {
            TTransaction::open('permission');
            
            $category = $this->form->getData('Remedio');
            
            $category->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Remédio cadastrado com Sucesso!');

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
            
            $repository = new TRepository('Remedio');

            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codigoRemedio';
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
