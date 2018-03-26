<?php
/**
 * @class:     CadastroTesteOmbros
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CadastroTesteOmbros extends TPage
{
    private $form;     
    private $datagrid;  
    private $loaded;

    public function __construct()
    {
        parent::__construct();
        
          
        $this->form = new TQuickForm;
        $notebook = new TNotebook(200, 200);
        $notebook->appendPage('Avaliação de Flexibilidade dos Ombros!', $this->form);

        //Campos do Formulario
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'codigoPaciente', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','codigoAvaliador','nomeAvaliador');
        $dataAvaliacao= new TDate('dataAvaliacao');
        $media = new TEntry('media');
        $media->setMaxLength(4);
        $media->setTip('Digite em cm');
        $maoDominante = new TCombo('maoDominante');
        $conclusao = new TCombo('conclusao');
        $parecer = new TText('parecer');
        $parecer->setTip('Digite no máximo 250 caracteres');
    
        //Formatação
        $dataAvaliacao->setMask('dd/mm/yyyy');
        $dataAvaliacao->setDataBaseMask('yyyy-mm-dd');
        //Caixa de Seleção
        $cb = array();
        $cb['1'] = 'Muito Fraco';
        $cb['2'] = 'Fraco';
        $cb['3'] = 'Regular';
        $cb['4'] = 'Bom';
        $cb['5'] = 'Muito Bom';
        $conclusao->addItems($cb);
        
        $mao = array();
        $mao['1'] = 'Direita';
        $mao['2'] = 'Esquerda';
        $maoDominante->addItems($mao);
       
     
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        $this->form->addQuickField('Data Avaliação',$dataAvaliacao,200);     
        $this->form->addQuickField('Media',$media,150);     
        $this->form->addQuickField('Mão Dominante',$maoDominante,200);   
       
              
        $this->form->addQuickField('Conclusão',$conclusao,200);     
        $this->form->addQuickField('Parecer',$parecer,200);   
        $parecer->setSize(400,70);
         

        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
        
                
        TPage::include_css('app/resources/styles.css');
        $html1 = new THtmlRenderer('app/resources/avaliacaoOmbros.html');

        // replace the main section variables
        $html1->enableSection('main', array());
        
        
        $img = new \Adianti\Widget\Util\TImage('app/images/testeOmbros.png');
              //$img->setStyle='center';
        
        $panel1 = new TPanelGroup('TESTE DE FLEXIBILIDADE DE OMBROS!');
        $panel1->add($html1);
        
     
        
        // add the template to the page
        //parent::add( TVBox::pack($panel1,$img) );
        parent::add( TVBox::pack() );
        
        parent::add($notebook);
        
    }
    
    public function onSave()
    {
        try
        {
            TTransaction::open('permission');
            
            $category = $this->form->getData('AvaliacaoOmbros');
            
            $category->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Avaliação de Flexibilidade dos Ombros Cadastrada com Sucesso!');

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
            
            $repository = new TRepository('AvaliacaoOmbros');

            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codAvaliacaoOmbros';
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
            new TMessage('error', '<b>Error ao salvar Teste de Ombros</b> ' . $e->getMessage());
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

