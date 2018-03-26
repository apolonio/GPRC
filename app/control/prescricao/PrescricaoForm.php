<?php
/**
 * @class: PesquisaPrescricao
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PrescricaoForm extends TStandardForm
{
    protected $form;
    
    function __construct()
    {
        parent::__construct();
        $this->form = new TQuickForm('form_Prescricao');
        $this->form->class = 'tform'; // CSS class
        $this->form->style = 'width: 700px;';
        $this->form->setFormTitle('Prescriação e Avaliação');
        parent::setDatabase('permission'); //banco
        parent::setActiveRecord('Prescricao'); //tabela
        
        $id                              = new TEntry('id');
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $dataPresc= new TDate('dataPresc');
        $dataPresc->setMask('dd/mm/yyyy');
        $dataPresc->setDatabaseMask('yyyy-mm-dd');
        
        $diagnostico = new TEntry('diagnostico');
        $parecer = new \Adianti\Widget\Form\TText('parecer');
        
        $id->setEditable( FALSE );
       
        //Objetivos: Clinicos e Funcionais
        $hiperArterial = new TCombo('hiperArterial');
        $hiperArterial->setValue('1');
        $hp = array();
        $hp['0'] = 'Não';
        $hp['1'] = 'Sim';
        $hiperArterial->addItems($hp);
        
        $angina= new TCombo('angina');
        $angina->setValue('1');
        $an = array();
        $an['0'] = 'Não';
        $an['1'] = 'Sim';
        $angina->addItems($an);
        
        $dispineia = new TCombo('dispineia');
        $dispineia->setValue('1');
        $disp = array();
        $disp['0'] = 'Não';
        $disp['1'] = 'Sim';
        $dispineia->addItems($disp);
      
        $dislipidemia = new TCombo('dislipidemia');
        $dislipidemia->setValue('1');
        $dp = array();
        $dp['0'] = 'Não';
        $dp['1'] = 'Sim';
        $dislipidemia->addItems($dp);

        $tabagismo = new TCombo('tabagismo');
        $tabagismo->setValue('1');
        $tb = array();
        $tb['0'] = 'Não';
        $tb['1'] = 'Sim';
        $tabagismo->addItems($tb);
        
        $depressao = new TCombo('depressao');
        $depressao->setValue('1');
        $dep = array();
        $dep['0'] = 'Sim';
        $dep['1'] = 'Não';
        $depressao->addItems($dep);
       
        $obesidade= new TCombo('obesidade');
        $obesidade->setValue('1');
        $ob = array();
        $ob['0'] = 'Sim';
        $ob['1'] = 'Não';
        $obesidade->addItems($ob);
        
        $estresse= new TCombo('estresse');
        $estresse->setValue('1');
        $es = array();
        $es['0'] = 'Sim';
        $es['1'] = 'Não';
        $estresse->addItems($es);
        
        $lbl_angina = new TLabel('Angina');
        $lbl_angina->setSize(90);
        $lbl_tabagismo = new TLabel('Tabagismo');
        $lbl_tabagismo->setSize(90);
        $lbl_dislipidemia = new TLabel('Dislipidemia');
        $lbl_dislipidemia->setSize(90);
        $lbl_dispineia = new TLabel('Dispineia');
        $lbl_dispineia->setSize(90);
        $lbl_hiperArterial = new TLabel('HiperArterial');
        $lbl_hiperArterial->setSize(90);
        $lbl_obesidade = new TLabel('Obesidade');
        $lbl_obesidade->setSize(90);
        $lbl_estresse = new TLabel('Estresse');
        $lbl_estresse->setSize(90);
        $lbl_depressao = new TLabel('Depressão');
        $lbl_depressao->setSize(90);
        
        // Objetivos Funcionais
        $cardio = new TCombo('cardio');
        $cardio->setValue('1');
        $c = array();
        $c['0'] = 'Não';
        $c['1'] = 'Sim';
        $cardio->addItems($c);
      
        $fmr = new TCombo('fmr');
        $fmr->setValue('1');
        $f = array();
        $f['0'] = 'Não';
        $f['1'] = 'Sim';
        $fmr->addItems($f);

        $dlv = new TCombo('dlv');
        $dlv->setValue('1');
        $v = array();
        $v['0'] = 'Não';
        $v['1'] = 'Sim';
        $dlv->addItems($v);
        
        $ddo = new TCombo('ddo');
        $ddo->setValue('1');
        $o = array();
        $o['0'] = 'Não';
        $o['1'] = 'Sim';
        $ddo->addItems($dep);
       
        $afme= new TCombo('afme');
        $afme->setValue('1');
        $afm = array();
        $afm['0'] = 'Não';
        $afm['1'] = 'Sim';
        $afme->addItems($afm);
        
        $af= new TCombo('af');
        $af->setValue('1');
        $f = array();
        $f['0'] = 'Não';
        $f['1'] = 'Sim';
        $af->addItems($f);
        
        $me= new TCombo('me');
        $me->setValue('1');
        $m = array();
        $m['0'] = 'Não';
        $m['1'] = 'Sim';
        $me->addItems($m);
       
        //Objetivo Funcional

        $lbl_fmr = new TLabel('Aumentar a força Muscular Respiratória');
        $lbl_fmr->setSize(350);
        $lbl_ddo = new TLabel('Diminuir o Déficit Oxigenação');
        $lbl_ddo->setSize(350);
        $lbl_me = new TLabel('Melhorar Equilíbrio');
        $lbl_me->setSize(350);
        
        //Exercício Aerobico
        $frequencia = new TEntry('frequencia');
        
        $lbl_frequencia = new TLabel('Frequência');
        $lbl_frequencia->setSize(90);
        
        $tempoBaixa = new TEntry('tempoBaixa');
        $tempoBaixa->setSize(90);
        $tempoAlta = new TEntry('tempoAlta');
        $tempoAlta->setSize(90);
        $tempoBaixa->setMask('99:99');
        $tempoAlta->setMask('99:99');
        
        $lbl_tempoB =  new TLabel('Tempo Baixa');
        $lbl_tempoB->setSize(100); 
        $lbl_tempoA =  new TLabel('Tempo Alta');
        $lbl_tempoA->setSize(100); 
        
        $fcinfB = new TEntry('fcinfB');
        $fcinfB->setSize(90);
        $fcsupB = new TEntry('fcsupB');
        $fcsupB->setSize(90);
        $fcinfA = new TEntry('fcinfA');
        $fcinfA->setSize(90);
        $fcsupA = new TEntry('fcsupA');
        $fcsupA->setSize(90);
        
        $lbl_fcinferiorB =  new TLabel('FC Inferior');
        $lbl_fcinferiorB->setSize(90); 
        $lbl_fcsuperiorB =  new TLabel('FC Superior');
        $lbl_fcsuperiorB->setSize(90); 
        
        $lbl_fcinferiorA =  new TLabel('FC Inferior');
        $lbl_fcinferiorA->setSize(90); 
        $lbl_fcsuperiorA =  new TLabel('FC Superior');
        $lbl_fcsuperiorA->setSize(90); 

        /*
         * Treinamento Resistido de Intensidade Moderada
         */
        $tempo = new TEntry('tempo');
        $tempo->setSize(90);
        $tempo->setMask('99:99');
        $fcinf = new TEntry('fcinf');
        $fcinf->setSize(90);
        $fcsup = new TEntry('fcsup');
        $fcsup->setSize(90);
        
        $lbl_tempo =  new TLabel('Tempo');
        $lbl_tempo->setSize(100); 
        $lbl_fcinferior =  new TLabel('FC Inferior');
        $lbl_fcinferior->setSize(90); 
        $lbl_fcsuperior =  new TLabel('FC Superior');
        $lbl_fcsuperior->setSize(90); 
        
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

        /*
         * Força Muscular
         */
        $cargapi = new TEntry('cargapi');
        $cargapi->setSize(60);
        $cargapi2 = new TEntry('cargapi2');
        $cargapi2->setSize(60);
        $tempopi = new TEntry('tempopi');
        $tempopi->setSize(60);
        $tempopi->setMask('99:99');
        $seriepi = new TEntry('seriepi');
        $seriepi->setSize(60);
        $repeticaopi = new TEntry('repeticaopi');
        $repeticaopi->setSize(60);
        $fspi = new TEntry('fspi');
        $fspi->setSize(60);
  
        $lbl_cargapi =  new TLabel('');
        $lbl_cargapi->setSize(10);  
        $lbl_cargapi2 =  new TLabel('');
        $lbl_cargapi2->setSize(10); 
        $lbl_tempopi=  new TLabel('');
        $lbl_tempopi->setSize(10); 
        $lbl_seriepi =  new TLabel('');
        $lbl_seriepi->setSize(10);  
        $lbl_repeticaopi=  new TLabel('');
        $lbl_repeticaopi->setSize(10);  
        $lbl_fspi =  new TLabel('');
        $lbl_fspi->setSize(10);  
       
        $cargasi = new TEntry('cargasi');
        $cargasi->setSize(60);
        $cargasi2 = new TEntry('cargasi2');
        $cargasi2->setSize(60);
        $temposi = new TEntry('temposi');
        $temposi->setSize(60);
        $temposi->setMask('99:99');
        $seriesi = new TEntry('seriesi');
        $seriesi->setSize(60);
        $repeticaosi = new TEntry('repeticaosi');
        $repeticaosi->setSize(60);
        $fssi = new TEntry('fssi');
        $fssi->setSize(60);
        
        $lbl_cargasi =  new TLabel('');
        $lbl_cargasi->setSize(10);  
        $lbl_cargasi2 =  new TLabel('');
        $lbl_cargasi2->setSize(10); 
        $lbl_temposi=  new TLabel('');
        $lbl_temposi->setSize(10); 
        $lbl_seriesi =  new TLabel('');
        $lbl_seriesi->setSize(10);  
        $lbl_repeticaosi=  new TLabel('');
        $lbl_repeticaosi->setSize(10);  
        $lbl_fssi =  new TLabel('');
        $lbl_fssi->setSize(10);  


        /**
         * Características Cicloergometros
         */

        $duracaos = new TEntry('duracaos');
        $duracaos->setSize(50);
        $duracaos->setMask('99:99');
        $cargas = new TEntry('cargas');
        $cargas->setSize(50);
        $rpms = new TEntry('rpms');
        $rpms->setSize(50);
        $manivela = new TEntry('manivela');
        $manivela->setSize(50);
        $assento = new TEntry('assento');
        $assento->setSize(50);
      
        $duracaoi = new TEntry('duracaoi');
        $duracaoi->setSize(50);
        $duracaoi->setMask('99:99');
        $cargai = new TEntry('cargai');
        $cargai->setSize(50);
        $rpmi = new TEntry('rpmi');
        $rpmi->setSize(50);
        $posicaoi = new TEntry('posicaoi');
        $posicaoi->setSize(50);
  
        $esteiraV = new TEntry('esteiraV');
        $esteiraV->setSize(60);
        $esteiraI = new TEntry('esteiraI');
        $esteiraI->setSize(60);
  
        $lbl_duracaos =  new TLabel('Duração');
        $lbl_duracaos->setSize(60);  
        $lbl_cargas =  new TLabel('Carga');
        $lbl_cargas->setSize(50); 
        $lbl_rpms =  new TLabel('RPM');
        $lbl_rpms->setSize(50);  
        $lbl_manivela =  new TLabel('Manivela');
        $lbl_manivela->setSize(70); 
        $lbl_assento=  new TLabel('Assento');
        $lbl_assento->setSize(60);  
        $lbl_duracaoi =  new TLabel('Duração');
        $lbl_duracaoi->setSize(60);  
        $lbl_cargai =  new TLabel('Carga');
        $lbl_cargai->setSize(50);  
        $lbl_rpmi =  new TLabel('RPM');
        $lbl_rpmi->setSize(50); 
        $lbl_posicaoi =  new TLabel('Posição');
        $lbl_posicaoi->setSize(70);  
       
        $lbl_esteiraV =  new TLabel('Velocidade');
        $lbl_esteiraV->setSize(80); 
        $lbl_esteiraI =  new TLabel('Inclinação');
        $lbl_esteiraI->setSize(80); 

        // Campos que aparecem no Formulário
        $this->form->addQuickField('ID',$id,300);
        $this->form->addQuickField('Paciente',$codPaciente,300);
        $this->form->addQuickField('Avaliador',$codAvaliador,300);   
        $this->form->addQuickField('Diagnóstico Clínico ', $diagnostico,300);   
          
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Objetivo Clínico'))->colspan = 2;
        
        $this->form->addQuickFields('- ', array($lbl_angina, $angina, $lbl_tabagismo, $tabagismo, $lbl_dislipidemia, $dislipidemia, $lbl_dispineia, $dispineia ));
        $this->form->addQuickFields('- ', array($lbl_hiperArterial, $hiperArterial, $lbl_obesidade, $obesidade, $lbl_estresse, $estresse, $lbl_depressao, $depressao));
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Objetivo Funcional'))->colspan = 2;

        $this->form->addQuickFields('Melhorar a Capacidade Cardiorespiratória', array($cardio, $lbl_fmr, $fmr));
        $this->form->addQuickFields('Diminuir a Limitação Ventilatória', array($dlv,$lbl_ddo,$ddo));
        $this->form->addQuickFields('Aumentar a Força Muscular Esquelética', array($afme,$lbl_me,$me));
        $this->form->addQuickFields('Aumentar a Flexibilidade', array( $af));
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Prescrições - Exercícios Aeróbico'))->colspan = 2;
        
        $this->form->addQuickFields('-', array($lbl_frequencia, $frequencia));  
        $this->form->addQuickFields('Treinamento Intervalado de Alta Intensidade', array($lbl_tempoB, $tempoBaixa, $lbl_fcinferiorB, $fcinfB, $lbl_fcsuperiorB, $fcsupB));  
        $this->form->addQuickFields('-', array($lbl_tempoA, $tempoAlta, $lbl_fcinferiorA, $fcinfA, $lbl_fcsuperiorA, $fcsupA));  
        $this->form->addQuickFields('Treinamento Contínuo de Intensidade Moderada', array($lbl_tempo,$tempo, $lbl_fcinferior, $fcinf, $lbl_fcsuperior, $fcsup)); 
       
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('TREINAMENTO RESISTIDO ---------------------------------------------------------- Carga|--  (%)  -- Repetição -- FCi--FCs'))->colspan = 2;
        
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
         
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('FORÇA MUSCULAR -------------------------------------- Carga       |  ------  (%)  --------- Tempo ----- Séries ------ Repetições --- Frequência'))->colspan = 2;
        $this->form->addQuickFields('Pressão Inspiratória Máxima', array( $lbl_cargapi,  $cargapi, $lbl_cargapi2,$cargapi2, $lbl_tempopi, $tempopi, $lbl_seriepi, $seriepi,$lbl_repeticaopi, $repeticaopi, $lbl_fspi, $fspi )); 
        $this->form->addQuickFields('S Index', array( $lbl_cargasi,  $cargasi, $lbl_cargasi2, $cargasi2, $lbl_temposi, $temposi, $lbl_seriesi, $seriesi,$lbl_repeticaosi, $repeticaosi, $lbl_fssi, $fssi )); 
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('CARACTERÍSTICAS DO CICLOERGÔMETROS'))->colspan = 2;
        $this->form->addQuickFields('Cicloergômetro M. Superiores', array( $lbl_duracaos,  $duracaos, $lbl_cargas,$cargas, $lbl_rpms, $rpms, $lbl_manivela, $manivela,$lbl_assento, $assento )); 
        $this->form->addQuickFields('Cicloergômetro M. Inferiores', array( $lbl_duracaoi,  $duracaoi, $lbl_cargai,$cargai, $lbl_rpmi, $rpmi, $lbl_posicaoi, $posicaoi )); 
        $this->form->addQuickFields('Esteira', array( $lbl_esteiraV,  $esteiraV,$lbl_esteiraI, $esteiraI)); 
        $this->form->addQuickField('Parecer',$parecer,200);   
        $this->form->addQuickField('Data',$dataPresc,100);
        $parecer->setSize(650,70);
        // add the actions
        $this->form->addQuickAction(_t('Save'), new TAction(array($this, 'onSave')), 'ico_save.png');
     //   $this->form->addQuickAction(_t('New'), new TAction(array($this, 'onEdit')), 'ico_new.png');
        $this->form->addQuickAction(_t('Find'), new TAction(array('PesquisaPrescricao', 'onReload')), 'ico_back.png');

        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', 'PesquisaPrescricao'));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Overloaded method onSave()
     * Executed whenever the user clicks at the save button
     */
    public function onSave()
    {
        $object = parent::onSave();
        
    }
  
}
?>

