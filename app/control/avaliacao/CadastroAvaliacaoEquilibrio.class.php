<?php
/**
 * @class:     CadastroAvaliacaoEquilibrio
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CadastroAvaliacaoEquilibrio extends TStandardForm
{
    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
        
        $this->form = new TQuickForm('forme_Avaliacao');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Cadastro Avaliação Equilíbrio');
        $this->form->style = 'width: 900px';
        
        // Bancos de dados e Active Record
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoEquilibrio');

        //Campos do Formulario          //origem      //banco       //model    //gravaBanco  // aparece na caixa
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'codigoPaciente', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','codigoAvaliador','nomeAvaliador');
        $dataAvaliacao= new TDate('dataAvaliacao');
        $media = new TEntry('media');
        $conclusao = new TCombo('conclusao');
        $parecer = new TText('parecer');
         
        $dataAvaliacao->setMask('dd/mm/yyyy');
        $dataAvaliacao->setDatabaseMask('yyyy-mm-dd');//$dataAvaliacao->setMask('dd/mm/yyyy');
        
        $cb = array();
        $cb['1'] = 'A - Baixo risco para quedas';
        $cb['2'] = 'B - Médio risco para quedas';
        $cb['3'] = 'C - Alto risco para quedas';
        $conclusao->addItems($cb);
        
        die();

        $this->form->addQuickField('Paciente',$codPaciente,250);
        $this->form->addQuickField('Avaliador',$codAvaliador,250);   
        $this->form->addQuickField('Data Avaliação',$dataAvaliacao,150);     
        $this->form->addQuickField('Média Alcançada',$media,150);     
        $this->form->addQuickField('Conclusão',$conclusao,200);     
        $this->form->addQuickField('Parecer',$parecer,200);  
        $parecer->setSize(400,70);

        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
       
        // Aplicando css na pagina view
      //  TPage::include_css('app/resources/styles.css');
    //    $html1 = new THtmlRenderer('app/resources/avaliacaoEquilibrio.html');

     //   $html1->enableSection('main', array());
        
      //  $panel1 = new TPanelGroup('INSTRUÇOES!');
    //    $panel1->add($html1);

        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'CadastroAvaliacaoEquilibrio'));
       // parent::add( TVBox::pack($panel1) );
        $vbox->add($this->form);

        parent::add($vbox);
    }

    public function onSave()
    {
        $object = parent::onSave();
        try
            {

            if ($object instanceof AvaliacaoEquilibrio)
            {

                TTransaction::open($this->database);

                $object->store();
                $this->onClear();

                new TMessage('info', 'Avaliação  Equilíbrio Cadastrada com Sucesso!');

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
            
            $repository = new TRepository('AvaliacaoEquilibrio');

            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codAvaliacaoEquilibrio';
            $criteria->setProperty('order', $order);
        //    $criteria->add(new TFilter('situacao','!=','Finalizado');
            $categories = $repository->load($criteria);
            //$this->datagrid->onClear();
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
        catch (Exception $e) /
        {
            new TMessage('error', '<b>Error ao salvar Avaliação</b> ' . $e->getMessage());
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

