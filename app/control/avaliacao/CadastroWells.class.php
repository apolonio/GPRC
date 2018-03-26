<?php
/**
 * @class:     CadastroWells
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CadastroWells extends TPage
{
    private $form;     
    private $datagrid;  
    private $loaded;

    public function __construct()
    {
        parent::__construct();
        
          
        $this->form = new TQuickForm('form_Wells');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Avaliação Banco de Wells');
        $this->form->style = 'width: 900px';
        
          $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'codigoPaciente', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','codigoAvaliador','nomeAvaliador');
        
        $dataAvaliacao= new TDate('dataAvaliacao');
        $media = new TEntry('media');
        $media->setMaxLength(4);
        $conclusao = new TCombo('conclusao');
      
        $parecer = new TText('parecer');
        
        $dataAvaliacao->setMask('dd/mm/yyyy');
        $dataAvaliacao->setDatabaseMask('yyyy-mm-dd');
       
        $cb = array();
        $cb['0'] = 'Excelente';
        $cb['1'] = 'Acima da Média';
        $cb['2'] = 'Média';
        $cb['3'] = 'Abaixo da Média';
        $cb['4'] = 'Fraco';
        $conclusao->addItems($cb);

       
        $this->form->addQuickField('Paciente',$codPaciente,250);
        $this->form->addQuickField('Avaliador',$codAvaliador,250);   
        $this->form->addQuickField('Data Avaliação',$dataAvaliacao,100);     
        $this->form->addQuickField('Pontuação',$media,50);     
        $this->form->addQuickField('Conclusão',$conclusao,200);     
        $this->form->addQuickField('Parecer',$parecer,200);  
        $parecer->setSize(350,70);
         
        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
  
                
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'CadastroWells'));
        $vbox->add($this->form);
     
        parent::add($vbox);
  
        
    }
    
    public function onSave()
    {
        try
        {
            TTransaction::open('permission');
            
            $category = $this->form->getData('AvaliacaoWells');
            
            $category->store();
            
            TTransaction::close();
            
            new TMessage('info', ' Avaliação Banco de WellS cadastrada com Sucesso!');

        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            
            TTransaction::rollback();
        }
    }
   
}//fim da classe

?>


