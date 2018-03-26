<?php
/**
 * @class:     CadastroVentilatoria
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CadastroVentilatoria extends TStandardForm
{
    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
          
        $this->form = new TQuickForm('form_Ventilatoria');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Avaliação Ventilatória');
        $this->form->style = 'width: 900px';
        
            
        // Bancos de dados e Active Record
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoVentilatoria');
        
        //Campos do Formulario          //origem      //banco       //model    //gravaBanco  // aparece na caixa
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $dataVent= new TDate('dataVent');
        $dataVent->setMask('dd/mm/yyyy');
        $dataVent->setDatabaseMask('yyyy-mm-dd');
        $conclusao = new TEntry('conclusao');
        $parecer = new TText('parecer');
        
        //Basico
        $fc = new TEntry('fc');
        $fc->setSize(70);
        $sat = new TEntry('sat');
        $sat->setSize(70);
        $pa1 = new TEntry('pa1');
        $pa2 = new TEntry('pa2');
        
        //Manovacultura
        $sindex = new TEntry('sindex');
        $sindex->setSize(70);
        $pimax = new TEntry('pimax');
        $pimax->setSize(70);
        $pinasd = new TEntry('pinasd');
        $pinasd->setSize(70);
        $pinase = new TEntry('pinase');
        $pinase->setSize(70);
        $PEmax = new TEntry('PEmax');
        $PEmax->setSize(70);
        $PImax = new TEntry('PImaxm');
        $PImax->setSize(70);
        
        //Espirometria
        $cv = new TEntry('cv');
        $cv->setSize(70);
        $cpt = new TEntry('cpt');
        $cpt->setSize(70);
        $cvf = new TEntry('cvf');
        $cvf->setSize(70);
        $vef1 = new TEntry('vef1');
        $vef1->setSize(70);
        $vef2 = new TEntry('vef2');
        $vef2->setSize(70);
        $petco2 = new TEntry('petco2');
        $petco2->setSize(70);
        
         //Configuração
        $pa1->setMaxLength(4);
        $pa2->setMaxLength(4);
        $cvf->setTip('Capacidade Vital');
        $lbl_cv =  new TLabel('Capacidade Vital - CV');
        $lbl_cv->setSize(150);  // Aqui voce controla o tamanho dos Labels
        $lbl_cpt =  new TLabel('Capacidade Pulmonar Total- CPT');
        $lbl_cpt->setSize(150);  // Aqui voce controla o tamanho dos Labels
        $lbl_cvf =  new TLabel('Capacidade Vital Forçada - CVF');
        $lbl_cvf->setSize(150);  // Aqui voce controla o tamanho dos Labels
        
         $lbl_sat =  new TLabel('Saturação'); //('Frequencia', array($fc, $lbl_sat, $sat));
         $lbl_pa1 =  new TLabel('Pressão Arterial'); //('Frequencia', array($fc, $lbl_sat, $sat));
         $lbl_pa2 =  new TLabel('x'); //('Frequencia', array($fc, $lbl_sat, $sat));
         $lbl_pimax =  new TLabel('PImáx');
         $lbl_pinasd =  new TLabel('PINas-D');
         $lbl_pinase =  new TLabel('PINas-E');
    
        // Campos que aparecem no Formulário
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        
        $this->form->addQuickFields('Frequência Cardíaca', array($fc,$lbl_sat, $sat, $lbl_pa1, $pa1, $lbl_pa2, $pa2));     
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Avaliação PowerBreath'))->colspan = 2;
        
        $this->form->addQuickFields('S-Index', array($sindex,$lbl_pimax, $pimax, $lbl_pinasd, $pinasd, $lbl_pinase, $pinase));     
        $this->form->addQuickFields('PEmáx ', array($PEmax, new TLabel('PImáx'), $PImax));
        //$this->form->
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Espirometria'))->colspan = 4;
 
        
        $this->form->addQuickField('Capacidade Vital - CV',$cv,100);     
        $this->form->addQuickField('Capacidade Pulmonar Total - CPT',$cpt,100);     
        $this->form->addQuickField('Capacidade Vital Forçada - CVF',$cvf,100);     
        $this->form->addQuickField('V. Expiratório Forçado no 1º(s) - VEF1',$vef1,100);     
        $this->form->addQuickField('Índice de Tiffenau - VEF1/CVF',$vef2,100);     
        $this->form->addQuickField('PETCO2',$petco2,100);     
        $this->form->addQuickField('Conclusão',$conclusao,400);     
        $this->form->addQuickField('Parecer',$parecer);   
        $this->form->addQuickField('Data Exame',$dataVent,100);
       
        $pa1->setSize(50);
        $pa2->setSize(50);
        $parecer->setSize(400, 70);
        
        // Ações dos botões do formulário
       $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
     //   $this->form->addQuickAction(_t('List'), new TAction(array('ExameList', 'onReload')), 'fa:table blue');
                
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'CadastroVentilatoria'));
        $vbox->add($this->form);
        $vbox->add($this->form2);
     
        parent::add($vbox);
        
    }
      /**
     * Salvando o Cadastro da Avaliação Ventilatória
     */
    public function onSave()
    {
        $object = parent::onSave();
        if ($object instanceof AvaliacaoVentilatoria)
        {
                try
                {
                    TTransaction::open($this->database);
                    
                    $object->store();
                    $this->onClear();
                    
                    new TMessage('info', 'Avaliação Ventilatória Cadastrada com Sucesso!');
                    
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
            
            $repository = new TRepository('AvaliacaoVentilatoria');
            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codVent';
            $criteria->setProperty('order', $order);
            $categories = $repository->load($criteria);
            //$this->datagrid->onClear();
            if ($categories)
            {
                foreach ($categories as $category)
                {
                }
            }
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) 
        {
            new TMessage('error', '<b>Error ao salvar Exame</b> ' . $e->getMessage());
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

