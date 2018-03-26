<?php
/**
 * @class:     Formulário de Edição da Avaliação Muscoesqueletica
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriações
 * @license    http://www.adianti.com.br/framework-license
 */
class AvaliacaoMuscoesqueleticaForm extends TStandardForm {

    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
          
        $this->form = new TQuickForm('form_tr');
        $this->form->class = 'tform';
        $this->form->style = 'width: 900px';
        $this->form->setFormTitle('Avaliação de Força Muscoesquelética');
        
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoMuscoesqueletica');
        
        $id = new TEntry('codFM');
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codPaciente->setSize(800);
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $codAvaliador->setSize(800);
        $dataFM= new TDate('dataFM');
        $dataFM->setMask('dd/mm/yyyy');
        $dataFM->setDatabaseMask('yyyy-mm-dd');
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
        $se['37'] = '37';
        $se['38'] = '38';
        $se['39'] = '39';
        $se['40'] = '40';
        $se['41'] = '41';
        $se['42'] = '42';
        $se['43'] = '43';
        $se['44'] = '44';
        $se['45'] = '45';
        $se['46'] = '46';
        $se['47'] = '47';
        $se['48'] = '48';
        $se['49'] = '49';
        $se['50'] = '50';
        $se['51'] = '51';
        $se['52'] = '52';
        $sessao->addItems($se);
        
        //Frequencia Intervalar
        $pamsd1 = new TEntry('pamsd1');
        $pamsd1->setSize(60);
        $pamsd2 = new TEntry('pamsd2');
        $pamsd2->setSize(60);
        $pamse1 = new TEntry('pamse1');
        $pamse1->setSize(60);
        $pamse2 = new TEntry('pamse2');
        $pamse2->setSize(60);
     
        
        $lbl_pamsd= new TLabel('Sup. Direito');
        $lbl_pamsd->setSize(100);
        $lbl_x= new TLabel('X');
        $lbl_x->setSize(20);
        $lbl_xe= new TLabel('X');
        $lbl_xe->setSize(20);
        $lbl_pamse= new TLabel('Sup. Esquerdo');
        $lbl_pamse->setSize(120);
   
                
        //Frequencia Cardiaca
        $fc = new TEntry('fc');
        $fc->setSize(100);
      

        $lbl_fc= new TLabel('Freq. Cardíaca');
        $lbl_fc->setSize(150);
        
        //Saturação
        $sat = new TEntry('sat');
        $sat->setSize(100);
       
        $lbl_sat = new TLabel('Saturação');
        $lbl_sat->setSize(100);
                
       
        
        // Campos que aparecem no Formulário
       
        $this->form->addQuickField('ID',$id,50);
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        $this->form->addQuickField('Sessão',$sessao,150);   
   
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Sinais  Vitais'))->colspan = 2;
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Pressão Aterial (PA) mmHg'))->colspan = 2;
        $this->form->addQuickFields('Pressão Arterial', array( $lbl_pamsd, $pamsd1,$lbl_x, $pamsd2, $lbl_pamse, $pamse1, $lbl_xe,$pamse2));
        $this->form->addQuickFields('Frequência e Saturação ', array($lbl_fc, $fc, $lbl_sat, $sat));
        
        // Variaveis de Cicloergometros e Formularios
      
        $assento = new TEntry('assento');
        $assento->setSize(70);
        $manivela = new TEntry('manivela');
        $manivela->setSize(70);
        $assento2 = new TEntry('assento2');
        $assento2->setSize(70);

        $lbl_assento = new TLabel('Assento');
        $lbl_assento->setSize(70);
        $lbl_manivela = new TLabel('Manivela');
        $lbl_manivela->setSize(70);
        $lbl_assento2 = new TLabel('Assento');
        $lbl_assento2->setSize(70);
        
        $cargaS1 = new TEntry('cargaS1');
        $cargaS1->setSize(70);
        $cargaS2 = new TEntry('cargaS2');
        $cargaS2->setSize(70);
        $cargaS3 = new TEntry('cargaS3');
        $cargaS3->setSize(70);
        $MediaS = new TEntry('mediaS');
        $MediaS->setSize(70);
        
        $cargaI1 = new TEntry('cargaI1');
        $cargaI1->setSize(70);
        $cargaI2 = new TEntry('cargaI2');
        $cargaI2->setSize(70);
        $cargaI3 = new TEntry('cargaI3');
        $cargaI3->setSize(70);
        $MediaI = new TEntry('mediaI');
        $MediaI->setSize(70);  
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('CARACTERÍSTICAS DO CICLOERGÔMETROS'))->colspan = 2;
        $row = $this->form->addRow();
        
        $row->addCell( new TLabel('----------------------------------------------------------- Assento ---- Manivela -- Carga 1 ---  Carga 2 ----  Carga 3  -- Média'))->colspan = 2;
        
        $this->form->addQuickFields('Membro Superior ',array($assento, $manivela, $cargaS1, $cargaS2, $cargaS3, $MediaS));
        $this->form->addQuickFields('Membro Inferior ',array($lbl_assento, $assento2, $cargaI1, $cargaI2, $cargaI3, $MediaI));
        
     
        /*
         * Muscoesqueletica: Carga
         */
        $lowback = new TEntry('lowback');
        $lowback->setSize(100);
        $abdominal = new TEntry('abdominal');
        $abdominal->setSize(100);
        $chestpress = new TEntry('chestpress');
        $chestpress->setSize(100);
        $pulldown = new TEntry('pulldown');
        $pulldown->setSize(100);
        $shoulderpress = new TEntry('shoulderpress');
        $shoulderpress->setSize(100);
        $tricepsdips = new TEntry('tricepsdips');
        $tricepsdips->setSize(100);
        $totalhip = new TEntry('totalhip');
        $totalhip->setSize(100);
        $legextension = new TEntry('legextension');
        $legextension->setSize(100);
        $abduction = new TEntry('abduction');
        $abduction->setSize(100);
        $adduction = new TEntry('adduction');
        $adduction->setSize(100);
        $seatedlegcurl = new TEntry('seatedlegcurl');
        $seatedlegcurl->setSize(100);
        $seatedlegpress = new TEntry('seatedlegpress');
        $seatedlegpress->setSize(100);
        $squat = new TEntry('squat');
        $squat->setSize(100);
        
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
         * Muscoesqueletica: Frequencia
         */
        $lowbackR = new TEntry('lowbackR');
        $lowbackR->setSize(100);
        $abdominalR = new TEntry('abdominalR');
        $abdominalR->setSize(100);
        $chestpressR = new TEntry('chestpressR');
        $chestpressR->setSize(100);
        $pulldownR = new TEntry('pulldownR');
        $pulldownR->setSize(100);
        $shoulderpressR = new TEntry('shoulderpressR');
        $shoulderpressR->setSize(100);
        $tricepsdipsR = new TEntry('tricepsdipsR');
        $tricepsdipsR->setSize(100);
        $totalhipR = new TEntry('totalhipR');
        $totalhipR->setSize(100);
        $legextensionR = new TEntry('legextensionR');
        $legextensionR->setSize(100);
        $abductionR = new TEntry('abductionR');
        $abductionR->setSize(100);
        $adductionR = new TEntry('adductionR');
        $adductionR->setSize(100);
        $seatedlegcurlR = new TEntry('seatedlegcurlR');
        $seatedlegcurlR->setSize(100);
        $seatedlegpressR = new TEntry('seatedlegpressR');
        $seatedlegpressR->setSize(100);
        $squatR = new TEntry('squatR');
        $squatR->setSize(100);
         /*
         * TMuscoesqueletica: Escala
         */
        $lowbackI = new TEntry('lowbackI');
        $lowbackI->setSize(100);
        $abdominalI = new TEntry('abdominalI');
        $abdominalI->setSize(100);
        $chestpressI = new TEntry('chestpressI');
        $chestpressI->setSize(100);
        $pulldownI = new TEntry('pulldownI');
        $pulldownI->setSize(100);
        $shoulderpressI = new TEntry('shoulderpressI');
        $shoulderpressI->setSize(100);
        $tricepsdipsI = new TEntry('tricepsdipsI');
        $tricepsdipsI->setSize(100);
        $totalhipI = new TEntry('totalhipI');
        $totalhipI->setSize(100);
        $legextensionI = new TEntry('legextensionI');
        $legextensionI->setSize(100);
        $abductionI = new TEntry('abductionI');
        $abductionI->setSize(100);
        $adductionI = new TEntry('adductionI');
        $adductionI->setSize(100);
        $seatedlegcurlI = new TEntry('seatedlegcurlI');
        $seatedlegcurlI->setSize(100);
        $seatedlegpressI = new TEntry('seatedlegpressI');
        $seatedlegpressI->setSize(100);
        $squatI = new TEntry('squatI');
        $squatI->setSize(100);
        
         /*
         * Muscoesqueletica: Observacao
         */
        $lowbackS = new TEntry('lowbackS');
        $lowbackS->setSize(250);
        $abdominalS = new TEntry('abdominalS');
        $abdominalS->setSize(250);
        $chestpressS = new TEntry('chestpressS');
        $chestpressS->setSize(250);
        $pulldownS = new TEntry('pulldownS');
        $pulldownS->setSize(250);
        $shoulderpressS = new TEntry('shoulderpressS');
        $shoulderpressS->setSize(250);
        $tricepsdipsS = new TEntry('tricepsdipsS');
        $tricepsdipsS->setSize(250);
        $totalhipS = new TEntry('totalhipS');
        $totalhipS->setSize(250);
        $legextensionS = new TEntry('legextensionS');
        $legextensionS->setSize(250);
        $abductionS = new TEntry('abductionS');
        $abductionS->setSize(250);
        $adductionS = new TEntry('adductionS');
        $adductionS->setSize(250);
        $seatedlegcurlS = new TEntry('seatedlegcurlS');
        $seatedlegcurlS->setSize(250);
        $seatedlegpressS = new TEntry('seatedlegpressS');
        $seatedlegpressS->setSize(250);
        $squatS = new TEntry('squatS');
        $squatS->setSize(250);
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Dispositivos EN-DYNAMIC -------------------- Carga 1 RM (Joule) -- FC Pico -- Escala OMNI-RES --- Observação'))->colspan = 2;
        $this->form->addQuickFields('LowBack', array( $lowback,$lowbackR, $lowbackI, $lowbackS)); 
        $this->form->addQuickFields('Abdominal', array( $abdominal,  $abdominalR,$abdominalI, $abdominalS)); 
        $this->form->addQuickFields('Chestpress', array( $chestpress, $chestpressR, $chestpressI, $chestpressS)); 
        $this->form->addQuickFields('PullDown', array( $pulldown, $pulldownR, $pulldownI, $pulldownS)); 
        $this->form->addQuickFields('ShoulderPress', array( $shoulderpress, $shoulderpressR, $shoulderpressI, $shoulderpressS)); 
        $this->form->addQuickFields('TricepsDips', array($tricepsdips, $tricepsdipsR, $tricepsdipsI, $tricepsdipsS)); 
        $this->form->addQuickFields('TotalHip', array($totalhip, $totalhipR, $totalhipI, $totalhipS)); 
        $this->form->addQuickFields('LegExtension', array($legextension, $legextensionR, $legextensionI, $legextensionS)); 
        $this->form->addQuickFields('Abduction', array( $abduction, $abductionR, $abductionI, $abductionS));
        $this->form->addQuickFields('Adduction', array( $adduction, $adductionR, $adductionI, $adductionS )); 
        $this->form->addQuickFields('SeatedLegCurl', array( $seatedlegcurl, $seatedlegcurlR, $seatedlegcurlI, $seatedlegcurlS)); 
        $this->form->addQuickFields('SeatedLegPress', array($seatedlegpress, $seatedlegpressR, $seatedlegpressI, $seatedlegpressS)); 
        $this->form->addQuickFields('Squat', array( $squat, $squatR, $squatI, $squatS)); 

        
        // DINAMOMETRO ISOCINÉTICO
      
        $midposicao = new TEntry('midposicao');
        $midposicao->setSize(70);
        $midveloc = new TEntry('midveloc');
        $midveloc->setSize(70);
        $midflex = new TEntry('midflex');
        $midflex->setSize(70);
        $midext = new TEntry('midext');
        $midext->setSize(70);
        $midadmflex = new TEntry('midadmflex');
        $midadmflex->setSize(70);
        $midadmext = new TEntry('midadmext');
        $midadmext->setSize(70);
        $middefflex = new TEntry('middefflex');
        $middefflex->setSize(70);
        $middefext = new TEntry('middefext');
        $middefext->setSize(70);

        
        $mieposicao = new TEntry('mieposicao');
        $mieposicao->setSize(70);
        $mieveloc = new TEntry('mieveloc');
        $mieveloc->setSize(70);
        $mieflex = new TEntry('mieflex');
        $mieflex->setSize(70);
        $mieext = new TEntry('mieext');
        $mieext->setSize(70);
        $mieadmflex = new TEntry('mieadmflex');
        $mieadmflex->setSize(70);
        $mieadmext = new TEntry('mieadmext');
        $mieadmext->setSize(70);
        $miedefflex = new TEntry('miedefflex');
        $miedefflex->setSize(70);
        $miedefext = new TEntry('miedefext');
        $miedefext->setSize(70);
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Dinamômetro Isocinético'))->colspan = 2;
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Região Corporal ----------------------------------------------------------------------------- Torque  ------------------- ADM (graus) --------------  Déficit (%)'))->colspan = 2;
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('----------------------------------------------------------- Posção --- Velocidade  ---  Flexão -- Extensão --- Flexão -- Extensão ---- Flexão -- Extensão '))->colspan = 2;
        
        $this->form->addQuickFields('Membro Inferior Direito ',array($midposicao, $midveloc, $midflex, $midext, $midadmext, $midadmflex,$middefflex,$middefext));
        $this->form->addQuickFields('Membro Inferior Esquerdo ',array($mieposicao, $mieveloc, $mieflex, $mieext, $mieadmext, $mieadmflex,$miedefflex,$miedefext));
        
        // DINAMOMETRO ISOCINÉTICO
      
        $msdsegundos = new TEntry('msdsegundos');
        $msdsegundos->setSize(70);
        $msdp1 = new TEntry('msdp1');
        $msdp1->setSize(70);
        $msdp2 = new TEntry('msdp2');
        $msdp2->setSize(70);
        $msdp3 = new TEntry('msdp3');
        $msdp3->setSize(70);
        $msdmedia = new TEntry('msdmedia');
        $msdmedia->setSize(70);
        
        $msesegundos = new TEntry('msesegundos');
        $msesegundos->setSize(70);
        $msep1 = new TEntry('msep1');
        $msep1->setSize(70);
        $msep2 = new TEntry('msep2');
        $msep2->setSize(70);
        $msep3 = new TEntry('msep3');
        $msep3->setSize(70);
        $msemedia = new TEntry('msemedia');
        $msemedia->setSize(70);
        
        $lbl_tp1 = new TLabel('Tempo(s)');
        $lbl_tp1->setSize(80);
        $lbl_tp2 = new TLabel('Tempo(s)');
        $lbl_tp2->setSize(80);
      
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Avaliação de Força de Preensão Manual (FPM) (Hand Grip)*'))->colspan = 2;
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Região Corporal --------------------------------- Tempo de Preensão (Segundos) ----------- Pico de Força Máximo -----'))->colspan = 2;
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('-------------------------------------------------------------------------------------------------- 1 ------------ 2 ----------- 3  ---------- Média '))->colspan = 2;
        $this->form->addQuickFields('Membro Superior Direito ',array($lbl_tp1,$msdsegundos, $msdp1, $msdp2, $msdp3, $msdmedia));
        $this->form->addQuickFields('Membro Superior Esquerdo ',array($lbl_tp2,$msesegundos, $msep1, $msep2, $msep3, $msemedia));
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('*Fonte: Lica Cristiane Ovando, Wladymir Kulkamp, Noé Gomes Borges Júnior. Força de preensão palmar: métodos de avaliação e fatores que influenciam a medida. Rev Bras Cineantropom e Desempenho Hum, v.12, n.3, p.:209-216, sine loco, 2010'))->colspan = 2;
        
        
        $this->form->addQuickField('Observações',$parecer);   
        $this->form->addQuickField('Data',$dataFM,100);
        $parecer->setSize(400, 70);
   
        //Acoes do Botao 
        $this->form->addQuickAction( 'Salvar', new TAction(array($this, 'onSave')), 'ico_save.png' );
        $this->form->addQuickAction('Voltar', new TAction(array('PesquisaAvaliacaoMuscoesqueletica', 'onReload')), 'ico_back.png');
              
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'Muscoesqueletica'));
        $vbox->add($this->form);
     
        parent::add($vbox);
    }
      /**
     * Salvando a Avaliacao Clinica
     */
    public function onSave()
    {
        try
        {
            TTransaction::open('permission');
            
            $avaliacao = $this->form->getData('AvaliacaoMuscoesqueletica');
            
            $avaliacao->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Avaliação Muscoesquelética atualizada com Sucesso!');

        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            
            TTransaction::rollback();
        }
    }
    

   
}//fim da classe

?>




