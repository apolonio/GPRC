<?php
/**
 * @class:     TreinamentoResistido 
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TreinamentoResistido extends TStandardForm
{
    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
          
        $this->form = new TQuickForm('form_tr');
        $this->form->class = 'tform';
        $this->form->style = 'width: 900px';
        $this->form->setFormTitle('Evolução Treinamento Resistido do Paciente');
        
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoTreinamentoResistido');
        
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codPaciente->setSize(800);
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $codAvaliador->setSize(800);
        $dataTr= new TDate('dataTr');
        $dataTr->setMask('dd/mm/yyyy');
        $dataTr->setDatabaseMask('yyyy-mm-dd');
        $parecer = new TText('parecer');
        $sessao = new TCombo('sessao');
        
        $se = array();
        $se['1'] = '1';
        $se['2'] = '2';
        $se['3'] = '3';
        $se['4'] = '4';
        $se['5'] = '5';
        $se['6'] = '6';
        $se['7'] = '7';
        $se['8'] = '8';
        $se['9'] = '9';
        $se['10'] = '10';
        $se['11'] = '11';
        $se['12'] = '12';
        $se['13'] = '13';
        $se['14'] = '14';
        $se['15'] = '15';
        $se['16'] = '16';
        $se['17'] = '17';
        $se['18'] = '18';
        $se['19'] = '19';
        $se['20'] = '20';
        $se['21'] = '21';
        $se['22'] = '22';
        $se['23'] = '23';
        $se['24'] = '24';
        $se['25'] = '25';
        $se['26'] = '26';
        $se['27'] = '27';
        $se['28'] = '28';
        $se['29'] = '29';
        $se['30'] = '30';
        $se['31'] = '31';
        $se['32'] = '32';
        $se['33'] = '33';
        $se['34'] = '34';
        $se['35'] = '35';
        $se['36'] = '36';
        $sessao->addItems($se);
        
        //Frequencia Intervalar
        $bdi1 = new TEntry('bdi1');
        $bdi1->setSize(80);
        $bdi2 = new TEntry('bdi2');
        $bdi2->setSize(80);
        $bei1 = new TEntry('bei1');
        $bei1->setSize(80);
        $bei2 = new TEntry('bei2');
        $bei2->setSize(80);
        $bdf1 = new TEntry('bdf1');
        $bdf1->setSize(80);
        $bdf2 = new TEntry('bdf2');
        $bdf2->setSize(80);
        $bef1 = new TEntry('bef1');
        $bef1->setSize(80);
        $bef2 = new TEntry('bef2');
        $bef2->setSize(80);
        
        $lbl_bdi2= new TLabel('X');
        $lbl_bdi2->setSize(30);
        $lbl_bei1= new TLabel('Braço Esquerdo');
        $lbl_bei1->setSize(150);
        $lbl_bei2= new TLabel('X');
        $lbl_bei2->setSize(30);
        $lbl_bdf2= new TLabel('X');
        $lbl_bdf2->setSize(30);
        $lbl_bef1= new TLabel('Braço Esquerdo');
        $lbl_bef1->setSize(150);
        $lbl_bef2= new TLabel('X');
        $lbl_bef2->setSize(30);
                
        //Frequencia Cardiaca
        $fci = new TEntry('fci');
        $fci->setSize(100);
        $fcfim= new TEntry('fcfim');
        $fcfim->setSize(100);

        $lbl_fcfim= new TLabel('Fim de Treino');
        $lbl_fcfim->setSize(100);
        
        //Saturação
        $sati = new TEntry('sati');
        $sati->setSize(100);
        $satfim = new TEntry('satfim');
        $satfim->setSize(100);
        $lbl_satfim = new TLabel('Fim de Treino');
        $lbl_satfim->setSize(100);
                
        //Frequencia Intervalar
        $fcinf = new TEntry('fcinf');
        $fcinf->setSize(80);
        $fcinf2 = new TEntry('fcinf2');
        $fcinf2->setSize(80);
        $fcalta = new TEntry('fcalta');
        $fcalta->setSize(80);
        $fcalta2 = new TEntry('fcalta2');
        $fcalta2->setSize(80);

        $lbl_inf2= new TLabel('bpm a');
        $lbl_inf2->setSize(60);
        $lbl_fcalta = new TLabel('FC Superior');
        $lbl_fcalta->setSize(100);
        $lbl_fcalta2 = new TLabel('bpm a');
        $lbl_fcalta2->setSize(60);
        
        // Campos que aparecem no Formulário
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        $this->form->addQuickField('Sessão',$sessao,150);   
   
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Sinais  Vitais'))->colspan = 2;
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Pressão Aterial (PA) mmHg'))->colspan = 2;
        $this->form->addQuickFields('Início Treino - Braço Direito', array($bdi1, $lbl_bdi2, $bdi2,$lbl_bei1, $bei1,$lbl_bei2, $bei2));
        $this->form->addQuickFields('Fim  Treino - Braço Direito ', array($bdf1, $lbl_bdf2, $bdf2,$lbl_bef1, $bef1,$lbl_bef2, $bef2));
        $this->form->addQuickFields('Frequência Cardíaca - Início Treino ', array($fci, $lbl_fcfim, $fcfim));
        $this->form->addQuickFields('Saturação de O2 - Início Treino ', array($sati, $lbl_satfim, $satfim));
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Frequência Cardíaca (FC) de Referência para este(a) paciente com base no Teste de Exercício Cardiopulmonar'))->colspan = 2;
        $this->form->addQuickFields('FC Inferior',array($fcinf, $lbl_inf2, $fcinf2, $lbl_fcalta, $fcalta, $lbl_fcalta2, $fcalta2));
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('TREINAMENTO RESISTIDO'))->colspan = 2;
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Frequência'))->colspan = 2;
        
        $periodicidade = new TEntry('periodicidade');
        $periodicidade->setSize(60);
        $tempoD = new TEntry('tempoD');
        $tempoD->setSize(60);
        $minutos = new TEntry('minutos');
        $minutos->setSize(60);
        $lbl_tempoD = new TLabel('Tempo no Dispositivo');
        $lbl_tempoD->setSize(150);
        $lbl_minutos = new TLabel('Minutos por Sessão');
        $lbl_minutos->setSize(150);
        $lbl_periodicidade = new TLabel('Periodicidade');
        $lbl_periodicidade->setSize(100);
        
        //Treinamento Resistido
        $this->form->addQuickFields('-',array($lbl_periodicidade,$periodicidade, $lbl_tempoD, $tempoD, $lbl_minutos, $minutos));
        
         /*
         * Treinamento Resistido: Carga
         */
        $lowback = new TEntry('lowback');
        $lowback->setSize(50);
        $abdominal = new TEntry('abdominal');
        $abdominal->setSize(50);
        $chestpress = new TEntry('chestpress');
        $chestpress->setSize(50);
        $pulldown = new TEntry('pulldown');
        $pulldown->setSize(50);
        $shoulderpress = new TEntry('shoulderpress');
        $shoulderpress->setSize(50);
        $tricepsdips = new TEntry('tricepsdips');
        $tricepsdips->setSize(50);
        $totalhip = new TEntry('totalhip');
        $totalhip->setSize(50);
        $legextension = new TEntry('legextension');
        $legextension->setSize(50);
        $abduction = new TEntry('abduction');
        $abduction->setSize(50);
        $adduction = new TEntry('adduction');
        $adduction->setSize(50);
        $seatedlegcurl = new TEntry('seatedlegcurl');
        $seatedlegcurl->setSize(50);
        $seatedlegpress = new TEntry('seatedlegpress');
        $seatedlegpress->setSize(50);
        $squat = new TEntry('squat');
        $squat->setSize(50);
        
        $lbl_lowback =  new TLabel('Lowback');
        $lbl_lowback->setSize(130); 
        $lbl_abdominal =  new TLabel('Abdominal');
        $lbl_abdominal->setSize(130); 
        $lbl_chestpress =  new TLabel('Chest Press');
        $lbl_chestpress->setSize(130); 
        $lbl_pulldown =  new TLabel('Pull Down');
        $lbl_pulldown->setSize(130); 
        $lbl_shoulderpress =  new TLabel('Shoulder Press');
        $lbl_shoulderpress->setSize(130); 
        $lbl_tricepsdips =  new TLabel('Triceps Dips');
        $lbl_tricepsdips->setSize(130); 
        $lbl_totalhip =  new TLabel('Total Hip');
        $lbl_totalhip->setSize(130); 
        $lbl_legextension =  new TLabel('Leg Extension');
        $lbl_legextension->setSize(130); 
        $lbl_abduction =  new TLabel('Abduction');
        $lbl_abduction->setSize(130); 
        $lbl_adduction =  new TLabel('Adduction');
        $lbl_adduction->setSize(130); 
        $lbl_seatedlegcurl =  new TLabel('Seated Leg Press');
        $lbl_seatedlegcurl->setSize(130); 
        $lbl_seatedlegpress =  new TLabel('Seated Leg Press');
        $lbl_seatedlegpress->setSize(130); 
        $lbl_squat =  new TLabel('Squat');
        $lbl_squat->setSize(130); 
        
          /*
         * Treinamento Resistido: Percentual
         */
        
        $lowback2 = new TEntry('lowback2');
        $lowback2->setSize(50);
        $abdominal2 = new TEntry('abdominal2');
        $abdominal2->setSize(50);
        $chestpress2 = new TEntry('chestpress2');
        $chestpress2->setSize(50);
        $pulldown2 = new TEntry('pulldown2');
        $pulldown2->setSize(50);
        $shoulderpress2 = new TEntry('shoulderpress2');
        $shoulderpress2->setSize(50);
        $tricepsdips2 = new TEntry('tricepsdips2');
        $tricepsdips2->setSize(50);
        $totalhip2 = new TEntry('totalhip2');
        $totalhip2->setSize(50);
        $legextension2 = new TEntry('legextension2');
        $legextension2->setSize(50);
        $abduction2 = new TEntry('abduction2');
        $abduction2->setSize(50);
        $adduction2 = new TEntry('adduction2');
        $adduction2->setSize(50);
        $seatedlegcurl2 = new TEntry('seatedlegcurl2');
        $seatedlegcurl2->setSize(50);
        $seatedlegpress2 = new TEntry('seatedlegpress2');
        $seatedlegpress2->setSize(50);
        $squat2 = new TEntry('squat2');
        $squat2->setSize(50);
        
        
        //Treinamento Resistido Repetição
        $lowbackR = new TEntry('lowbackR');
        $lowbackR->setSize(50);
        $abdominalR = new TEntry('abdominalR');
        $abdominalR->setSize(50);
        $chestpressR = new TEntry('chestpressR');
        $chestpressR->setSize(50);
        $pulldownR = new TEntry('pulldownR');
        $pulldownR->setSize(50);
        $shoulderpressR = new TEntry('shoulderpressR');
        $shoulderpressR->setSize(50);
        $tricepsdipsR = new TEntry('tricepsdipsR');
        $tricepsdipsR->setSize(50);
        $totalhipR = new TEntry('totalhipR');
        $totalhipR->setSize(50);
        $legextensionR = new TEntry('legextensionR');
        $legextensionR->setSize(50);
        $abductionR = new TEntry('abductionR');
        $abductionR->setSize(50);
        $adductionR = new TEntry('adductionR');
        $adductionR->setSize(50);
        $seatedlegcurlR = new TEntry('seatedlegcurlR');
        $seatedlegcurlR->setSize(50);
        $seatedlegpressR = new TEntry('seatedlegpressR');
        $seatedlegpressR->setSize(50);
        $squatR = new TEntry('squatR');
        $squatR->setSize(50);
         /*
         * Treinamento Resistido: Carga
         */
        $lowbackI = new TEntry('lowbackI');
        $lowbackI->setSize(50);
        $abdominalI = new TEntry('abdominalI');
        $abdominalI->setSize(50);
        $chestpressI = new TEntry('chestpressI');
        $chestpressI->setSize(50);
        $pulldownI = new TEntry('pulldownI');
        $pulldownI->setSize(50);
        $shoulderpressI = new TEntry('shoulderpressI');
        $shoulderpressI->setSize(50);
        $tricepsdipsI = new TEntry('tricepsdipsI');
        $tricepsdipsI->setSize(50);
        $totalhipI = new TEntry('totalhipI');
        $totalhipI->setSize(50);
        $legextensionI = new TEntry('legextensionI');
        $legextensionI->setSize(50);
        $abductionI = new TEntry('abductionI');
        $abductionI->setSize(50);
        $adductionI = new TEntry('adductionI');
        $adductionI->setSize(50);
        $seatedlegcurlI = new TEntry('seatedlegcurlI');
        $seatedlegcurlI->setSize(50);
        $seatedlegpressI = new TEntry('seatedlegpressI');
        $seatedlegpressI->setSize(50);
        $squatI = new TEntry('squatI');
        $squatI->setSize(50);
         /*
         * Treinamento Resistido: Carga
         */
        $lowbackS = new TEntry('lowbackS');
        $lowbackS->setSize(50);
        $abdominalS = new TEntry('abdominalS');
        $abdominalS->setSize(50);
        $chestpressS = new TEntry('chestpressS');
        $chestpressS->setSize(50);
        $pulldownS = new TEntry('pulldownS');
        $pulldownS->setSize(50);
        $shoulderpressS = new TEntry('shoulderpressS');
        $shoulderpressS->setSize(50);
        $tricepsdipsS = new TEntry('tricepsdipsS');
        $tricepsdipsS->setSize(50);
        $totalhipS = new TEntry('totalhipS');
        $totalhipS->setSize(50);
        $legextensionS = new TEntry('legextensionS');
        $legextensionS->setSize(50);
        $abductionS = new TEntry('abductionS');
        $abductionS->setSize(50);
        $adductionS = new TEntry('adductionS');
        $adductionS->setSize(50);
        $seatedlegcurlS = new TEntry('seatedlegcurlS');
        $seatedlegcurlS->setSize(50);
        $seatedlegpressS = new TEntry('seatedlegpressS');
        $seatedlegpressS->setSize(50);
        $squatS = new TEntry('squatS');
        $squatS->setSize(50);
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('TREINAMENTO RESISTIDO ---------------- Dispositivo ------------- Carga|--  (%)  --- Repetição --- FCi--FCs'))->colspan = 2;
        $this->form->addQuickFields('', array($lbl_lowback, $lowback, $lowback2,$lowbackR, $lowbackI, $lowbackS)); 
        $this->form->addQuickFields('', array($lbl_abdominal, $abdominal, $abdominal2, $abdominalR,$abdominalI, $abdominalS)); 
        $this->form->addQuickFields('', array($lbl_chestpress, $chestpress, $chestpress2, $chestpressR, $chestpressI, $chestpressS)); 
        $this->form->addQuickFields('', array($lbl_pulldown, $pulldown, $pulldown2, $pulldownR, $pulldownI, $pulldownS)); 
        $this->form->addQuickFields('', array($lbl_shoulderpress, $shoulderpress,$shoulderpress2, $shoulderpressR, $shoulderpressI, $shoulderpressS)); 
        $this->form->addQuickFields('Treinamento Resistido', array($lbl_tricepsdips, $tricepsdips, $tricepsdips2, $tricepsdipsR, $tricepsdipsI, $tricepsdipsS)); 
        $this->form->addQuickFields('', array($lbl_totalhip, $totalhip, $totalhip2, $totalhipR, $totalhipI, $totalhipS)); 
        $this->form->addQuickFields('', array($lbl_legextension, $legextension, $legextension2, $legextensionR, $legextensionI, $legextensionS)); 
        $this->form->addQuickFields('', array($lbl_abduction, $abduction, $abduction2, $abductionR, $abductionI, $abductionS));
        $this->form->addQuickFields('', array($lbl_adduction, $adduction, $adduction2, $adductionR, $adductionI, $adductionS )); 
        $this->form->addQuickFields('', array($lbl_seatedlegcurl, $seatedlegcurl, $seatedlegcurl2, $seatedlegcurlR, $seatedlegcurlI, $seatedlegcurlS)); 
        $this->form->addQuickFields('', array($lbl_seatedlegpress, $seatedlegpress, $seatedlegpress2, $seatedlegpressR, $seatedlegpressI, $seatedlegpressS)); 
        $this->form->addQuickFields('', array($lbl_squat, $squat,$squat2, $squatR, $squatI, $squatS)); 

        //Final Formualario
        $this->form->addQuickField('Parecer',$parecer);   
        $this->form->addQuickField('Data T. Resistido',$dataTr,100);
        $parecer->setSize(400, 70);
   
        //Acoes do Botao 
        $this->form->addQuickAction( 'Salvar', new TAction(array($this, 'onSave')), 'ico_save.png' );
             
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'TreinamentoResistido'));
        $vbox->add($this->form);
     
        parent::add($vbox);
        
    }
      /**
     * Salvando a Avaliacao Treinamento Resistido
     */
    public function onSave()
    {
        try
        {
            TTransaction::open('permission');
            
            $category = $this->form->getData('AvaliacaoTreinamentoResistido');
            
            $category->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Avaliação Treinamento Resistido cadastrada com Sucesso!');

        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            
            TTransaction::rollback();
        }
    }
    

   
}//fim da classe

?>



