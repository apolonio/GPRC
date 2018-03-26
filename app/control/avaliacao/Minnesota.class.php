<?php
/**
 * @class:     Cadastro Avaliacao Minnesota
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class Minnesota extends TStandardForm
{
    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
          
        $this->form = new TQuickForm('form_Minnesota');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Questionário Minnesota');
        $this->form->style = 'width: 900px';
        
        // Bancos de dados e Active Record
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoMinnesota');
        
        //Campos do Formulario          //origem      //banco       //model    //gravaBanco  // aparece na caixa
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'codigoPaciente', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','codigoAvaliador','nomeAvaliador');
        $dataMin= new TDate('dataMin');
        $dataMin->setMask('dd/mm/yyyy');
        $dataMin->setDatabaseMask('yyyy-mm-dd');
        $conclusao = new TCombo('conclusao');
        $parecer = new TText('parecer');
        
        $cb = array();
        $cb['0'] = 'Qualidade de vida ruim';
        $cb['1'] = 'Qualidade de vida moderada';
        $cb['2'] = 'Boa Qualidade de vida';

        $conclusao->addItems($cb);
        
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        $this->form->addQuickField('Conclusão ',$conclusao,350);
        $this->form->addQuickField('Parecer ',$parecer,350);
        $this->form->addQuickField('Data Minnesota',$dataMin,100);
        $parecer->setSize(400, 70);
        
        // Ações dos botões do formulário
        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
                
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'Minnesota'));
        $vbox->add($this->form);
     
        parent::add($vbox);
        
    }
    
    public function onSave()
    {
        $object = parent::onSave();
        try
            {

            if ($object instanceof AvaliacaoMinnesota)
            {

                TTransaction::open($this->database);

                $object->store();
                $this->onClear();

                new TMessage('info', 'Questionário Minnesota Cadastrada com Sucesso!');

                 TTransaction::close();

            }
            else{

             new TMessage('info', 'Erro ao gravar!');
            }

            }  catch (Exception $e)
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
            
            $repository = new TRepository('AvaliacaoMinnesota');
            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codMin';
            $criteria->setProperty('order', $order);
        //    $criteria->add(new TFilter('situacao','!=','Finalizado');
            $categories = $repository->load($criteria);
            if ($categories)
            {
                foreach ($categories as $category)
                {
                    //$this->datagrid->addItem($category);
                }
            }
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) 
        {
            new TMessage('error', '<b>Error ao salvar Questionário</b> ' . $e->getMessage());
            TTransaction::rollback();
        }
    }
  
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
   
}

?>


