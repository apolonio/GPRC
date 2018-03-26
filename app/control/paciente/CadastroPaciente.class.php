<?php
/**
 * @class: cadastropaciente
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CadastroPaciente extends TPage
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
        $notebook = new TNotebook(300, 300);
        $notebook->appendPage('GPRC - Paciente', $this->form);

        
        $nome = new TEntry('nome');
      //  $nome    = new TDBSeekButton('nome', 'fiscalizacao', $this->form->getName(), 'Militar', 'nome', 'nome', 'nome');
        $email = new TEntry('email');
        $sexo = new TCombo('sexo');
        $dataNascimento = new TDate('dataNascimento');
        $dataNascimento->setMask('dd/mm/yyyy');
        $dataNascimento->setDataBaseMask('yyyy-mm-dd');
        
        $peso = new TEntry('peso');
        $peso->setTip('Digite em kg');
        $peso->setSize(7);
        
        $estatura = new TEntry('estatura');
        $estatura->setMask('9,99');
        $estatura->setSize(3);
        
        $telefone = new TEntry('telefone');
        $telefone->setMask('(099)99999-9999');

        $sex = array();
        $sex['0'] = 'Masculino';
        $sex['1'] = 'Feminino';
        $sexo->addItems($sex);
        



        $this->form->addQuickField('Nome',$nome,450);
        $this->form->addQuickField('Sexo',$sexo,200);     
        $this->form->addQuickField('Data Nascimento',$dataNascimento,200);     
        $this->form->addQuickField('Peso',$peso,100);  
        $this->form->addQuickField('Estatura',$estatura,100);     
        $this->form->addQuickField('Telefone',$telefone,200);     
      
        $this->form->addQuickField('Email',$email,200); 

        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
        
        parent::add($notebook);
        
    }
    
    public function onSave()
    {
        try
        {
            TTransaction::open('permission');
            
            $category = $this->form->getData('Paciente');
            
            $category->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Paciente cadastrado com Sucesso!');

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
            
            $repository = new TRepository('Paciente');

            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codigoPaciente';
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
