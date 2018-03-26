<?php
 /**
 * @class: BDI
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */

class BDI extends TStandardForm
{
    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
          
        $this->form = new TQuickForm('form_bdi');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Avaliação BDI');
        $this->form->style = 'width: 900px';
        
        // Bancos de dados e Active Record
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoBDI');
        
        //Campos do Formulario          //origem      //banco       //model    //gravaBanco  // aparece na caixa
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'codigoPaciente', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','codigoAvaliador','nomeAvaliador');
        $dataBDI= new TDate('dataBDI');
        $dataBDI->setMask('dd/mm/yyyy');
        $dataBDI->setDatabaseMask('yyyy-mm-dd');
        $conclusao = new TCombo('conclusao');
        $parecer = new TText('parecer');
        
              //  $codAvaliador = new TDBSeekButton('codAvaliador', 'permission', $this->form->getName(), 'Avaliador', 'nome', 'codAvaliador', 'nome');

        $cb = array();
        $cb['0'] = 'Nenhuma Depressão';
        $cb['1'] = 'Alteração do Humor';
        $cb['2'] = 'Depressão Clínica';
        $cb['3'] = 'Depressão Moderada';
        $cb['4'] = 'Depressão Severa';
        $cb['5'] = 'Depressão Extrema';
        $conclusao->addItems($cb);
        
        
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        $this->form->addQuickField('Conclusão ',$conclusao,350);
        $this->form->addQuickField('Parecer ',$parecer,350);
        $this->form->addQuickField('Data BDI',$dataBDI,100);
        $parecer->setSize(400, 70);
        
        // Ações dos botões do formulário
        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
                
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'BDI'));
        $vbox->add($this->form);
     
        parent::add($vbox);
        
    }
      /**
     * Salvando o Cadastro da Avaliação BDI
     */
    public function onSave()
    {
        // first, use the default onSave()
        $object = parent::onSave();
         // if the object has been saved
        if ($object instanceof AvaliacaoBDI)
        {
                try
                {
                    TTransaction::open($this->database);
                    // Atualizando o caminho de file_path
                    
                    $object->store();
                    $this->onClear();
                    
                    new TMessage('info', 'Inventário de BECK (BDI) Cadastrada com Sucesso!');
                    
                     TTransaction::close();
        
                }
                catch (Exception $e)
                {
                    new TMessage('error', $e->getMessage());

                    TTransaction::rollback();
                }
        }else{
            
         new TMessage('info', 'Erro ao gravar!');
        }
    
    }
    
      
    
    function onReload($param = NULL)
    {
        try
        {
            TTransaction::open('permission');
            
            $repository = new TRepository('AvaliacaoBDI');
            //Caso eu queira exibir os registros de exame em um relatorio
            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codBDI';
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
            new TMessage('error', '<b>Error ao salvar Inventário de Beck</b> ' . $e->getMessage());
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


