<?php
/**
 * @class: Hiit
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class HIIT extends TStandardForm
{
    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
          
        $this->form = new TQuickForm('form_Hit');
        $this->form->class = 'tform';
        $this->form->style = 'width: 900px';
        $this->form->setFormTitle('Evolução HIIT do Paciente');
        
         // Bancos de dados
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoHiit');
        
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codPaciente->setSize(800);
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $codAvaliador->setSize(800);
        $dataH= new TDate('dataHiit');
        $dataH->setMask('dd/mm/yyyy');
        $dataH->setDatabaseMask('yyyy-mm-dd');
        $parecer = new TText('parecer');
        
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
                
        //Saturação )2
        $sati = new TEntry('sati');
        $sati->setSize(100);
        $satfim = new TEntry('satfim');
        $satfim->setSize(100);
        $lbl_satfim = new TLabel('Fim de Treino');
        $lbl_satfim->setSize(100);
                
        //Frequencia Intervalar
        $fcintervalar = new TEntry('fcintervalar');
        $fcintervalar->setSize(80);
        $fcintervalar2 = new TEntry('fcintervalar2');
        $fcintervalar2->setSize(80);
        $fcalta1 = new TEntry('fcalta1');
        $fcalta1->setSize(80);
        $fcalta2 = new TEntry('fcalta2');
        $fcalta2->setSize(80);

        $lbl_intervalar2= new TLabel('bpm a');
        $lbl_intervalar2->setSize(60);
        $lbl_fcalta1 = new TLabel('Alta');
        $lbl_fcalta1->setSize(80);
        $lbl_fcalta2 = new TLabel('bpm a');
        $lbl_fcalta2->setSize(60);
     
        //Frequencia Cardiaca
        $fci = new TEntry('fci');
        $fci->setSize(100);
        $fcfim= new TEntry('fcfim');
        $fcfim->setSize(100);

        $lbl_fcfim= new TLabel('Fim de Treino');
        $lbl_fcfim->setSize(100);
        //CICLOERGOMETROS
        
        $duracao = new TEntry('duracao');
        $duracao->setSize(70);
        $velocidade = new TEntry('velocidade');
        $velocidade->setSize(70);
        $assento = new TEntry('assento');
        $assento->setSize(70);
        $manivela = new TEntry('manivela');
        $manivela->setSize(70);

        $lbl_velocidade= new TLabel('Velocidade');
        $lbl_velocidade->setSize(75);
        $lbl_assento = new TLabel('Assento');
        $lbl_assento->setSize(70);
        $lbl_manivela = new TLabel('Manivela');
        $lbl_manivela->setSize(70);
        
        $duracao2 = new TEntry('duracao2');
        $duracao2->setSize(70);
        $velocidade2 = new TEntry('velocidade2');
        $velocidade2->setSize(70);
        $assento2 = new TEntry('assento2');
        $assento2->setSize(70);

        $lbl_velocidade2= new TLabel('Velocidade');
        $lbl_velocidade2->setSize(75);
        $lbl_assento2 = new TLabel('Assento');
        $lbl_assento2->setSize(70);
        
        //Aquecimento
        $cicloergometro = new TCombo('cicloergometro');
        $cicloergometro->setSize(80);
        $ciclo = array();
        $ciclo[0] = 'Sim';
        $ciclo[1] = 'Não';
        $cicloergometro->addItems($ciclo);
        
        $tempoa = new TEntry('tempoa');
        $tempoa->setSize(50);
        $rotacao = new TEntry('rotacao');
        $rotacao->setSize(50);
        $fcinicial = new TEntry('fcinicial');
        $fcinicial->setSize(50);
        $fcfinal = new TEntry('fcfinal');
        $fcfinal->setSize(50);
        
        $lbl_cicloergometro = new TLabel('Ciclo.');
        $lbl_cicloergometro->setSize(50);
        $lbl_rotacao= new TLabel('Rotação');
        $lbl_rotacao->setSize(60);
        $lbl_fcinicial = new TLabel('FCInicial');
        $lbl_fcinicial->setSize(60);
        $lbl_fcfinal = new TLabel('FCFinal');
        $lbl_fcfinal->setSize(60);
        
        // Campos que aparecem no Formulário
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
   
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
        $row->addCell( new TLabel('Frequência Cardíaca (FC) de Referência para este paciente com base na ergoespirometria'))->colspan = 2;
        $this->form->addQuickFields('FC em fase Intervalar',array($fcintervalar, $lbl_intervalar2, $fcintervalar2, $lbl_fcalta1, $fcalta1, $lbl_fcalta2, $fcalta2));
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('CARACTERÍSTICAS DO CICLOERGÔMETROS'))->colspan = 2;
        $this->form->addQuickFields('Membro Superior - Duração',array($duracao, $lbl_velocidade, $velocidade, $lbl_assento, $assento, $lbl_manivela, $manivela));
        $this->form->addQuickFields('Membro Inferior - Duração',array($duracao2, $lbl_velocidade2, $velocidade2, $lbl_assento2, $assento2));
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('AQUECIMENTO'))->colspan = 2;
         $this->form->addQuickFields('Aquecimento - Duração',array($tempoa, $lbl_cicloergometro,$cicloergometro,$lbl_rotacao, $rotacao, $lbl_fcinicial, $fcinicial, $lbl_fcfinal, $fcfinal));
        
        //Tempo Baixa 1
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Dados HIIT Cicloergonômetro de Membros Superiores'))->colspan = 2;
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Baixa 1'))->colspan = 2;
        
        $periodicidade = new TEntry('periodicidade');
        $periodicidade->setSize(60);
        $tempott = new TEntry('tempott');
        $tempott->setSize(60);
        $lbl_tt = new TLabel('Tempo Total');
        $lbl_tt->setSize(90);
        $lbl_periodicidade = new TLabel('Periodicidade');
        $lbl_periodicidade->setSize(100);
        
        $fc1i = new TEntry('fc1i');
        $fc1i->setSize(60);
        $fc1f = new TEntry('fc1f');
        $fc1f->setSize(60);
        $tpb1 =  new TEntry('tpb1');
        $tpb1->setSize(60);
        
        $lbl_tpb1 = new TLabel('Tempo Baixa 1');
        $lbl_tpb1->setSize(100);
        $lbl_fc1i = new TLabel('FC Inicial');
        $lbl_fc1i->setSize(90);
        $lbl_fc1f = new TLabel('FC Final');
        $lbl_fc1f->setSize(90);
        
        $fc1min = new TEntry('fc1min');
        $fc1min->setSize(60);
        $fc2min = new TEntry('fc2min');
        $fc2min->setSize(60);
        $fc3min = new TEntry('fc3min');
        $fc3min->setSize(60);
        
        $lbl_fc1min = new TLabel('FC1 Min');
        $lbl_fc1min->setSize(100);
        $lbl_fc2min = new TLabel('FC2 Min');
        $lbl_fc2min->setSize(90);
        $lbl_fc3min = new TLabel('FC3 Min');
        $lbl_fc3min->setSize(90);
        
        $this->form->addQuickFields('-',array($lbl_periodicidade,$periodicidade, $lbl_tt, $tempott));
        $this->form->addQuickFields('-',array($lbl_tpb1, $tpb1, $lbl_fc1i,$fc1i,$lbl_fc1f ,$fc1f));
        $this->form->addQuickFields('-',array($lbl_fc1min, $fc1min, $lbl_fc2min,$fc2min,$lbl_fc3min,$fc3min));
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Alta 1'))->colspan = 2;
        
         // Tempo Alta 1
         $fc2i = new TEntry('fc2i');
        $fc2i->setSize(60);
        $fc2f = new TEntry('fc2f');
        $fc2f->setSize(60);
        $tpa1 =  new TEntry('tpa1');
        $tpa1->setSize(60);
        
        $lbl_tpa1 = new TLabel('Tempo Alta 1');
        $lbl_tpa1->setSize(100);
        $lbl_fc2i = new TLabel('FC Inicial');
        $lbl_fc2i->setSize(60);
        $lbl_fc2f = new TLabel('FC Final');
        $lbl_fc2f->setSize(60);
        
        $fc4min = new TEntry('fc4min');
        $fc4min->setSize(60);
        $fc5min = new TEntry('fc5min');
        $fc5min->setSize(60);
        $fc6min = new TEntry('fc6min');
        $fc6min->setSize(60);
        $fc7min = new TEntry('fc7min');
        $fc7min->setSize(60);
               
        $lbl_fc4min = new TLabel('FC4 Min');
        $lbl_fc4min->setSize(100);
        $lbl_fc5min = new TLabel('FC5 Min');
        $lbl_fc5min->setSize(60);
        $lbl_fc6min = new TLabel('FC6 Min');
        $lbl_fc6min->setSize(60);
        $lbl_fc7min = new TLabel('FC7 Min');
        $lbl_fc7min->setSize(60);
        
        $this->form->addQuickFields('-',array($lbl_tpa1, $tpa1, $lbl_fc2i,$fc2i,$lbl_fc2f ,$fc2f));
        $this->form->addQuickFields('-',array($lbl_fc4min, $fc4min, $lbl_fc5min,$fc5min,$lbl_fc6min,$fc6min,$lbl_fc7min,$fc7min));
    
        //Tempo de Baixa 2
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Baixa 2'))->colspan = 2;
        
           // Tempo Baixa 2
        $fc3i = new TEntry('fc3i');
        $fc3i->setSize(60);
        $fc3f = new TEntry('fc3f');
        $fc3f->setSize(60);
        $tpb2 =  new TEntry('tpb2');
        $tpb2->setSize(60);
        
        $lbl_tpb2 = new TLabel('Tempo Baixa 2');
        $lbl_tpb2->setSize(100);
        $lbl_fc3i = new TLabel('FC Inicial');
        $lbl_fc3i->setSize(70);
        $lbl_fc3f = new TLabel('FC Final');
        $lbl_fc3f->setSize(70);
              
        $fc8min = new TEntry('fc8min');
        $fc8min->setSize(60);
        $fc9min = new TEntry('fc9min');
        $fc9min->setSize(60);
        $fc10min = new TEntry('fc10min');
        $fc10min->setSize(60);
                
        $lbl_fc8min = new TLabel('FC8 Min');
        $lbl_fc8min->setSize(100);
        $lbl_fc9min = new TLabel('FC9 Min');
        $lbl_fc9min->setSize(70);
        $lbl_fc10min = new TLabel('FC10 Min');
        $lbl_fc10min->setSize(70);
        
        $this->form->addQuickFields('-',array($lbl_tpb2, $tpb2, $lbl_fc3i,$fc3i,$lbl_fc3f ,$fc3f));
        $this->form->addQuickFields('-',array( $lbl_fc8min,$fc8min,$lbl_fc9min,$fc9min,$lbl_fc10min, $fc10min));
       
        //Tempo de Alta 2
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Alta 2'))->colspan = 2;
  
        $fc4i = new TEntry('fc4i');
        $fc4i->setSize(60);
        $fc4f = new TEntry('fc4f');
        $fc4f->setSize(60);
        $tpa2 =  new TEntry('tpa2');
        $tpa2->setSize(60);
        
        $lbl_tpa2 = new TLabel('Tempo Alta 2');
        $lbl_tpa2->setSize(100);
        $lbl_fc4i = new TLabel('FC Inicial');
        $lbl_fc4i->setSize(60);
        $lbl_fc4f = new TLabel('FC Final');
        $lbl_fc4f->setSize(60);
        
        $fc11min = new TEntry('fc11min');
        $fc11min->setSize(60);
        $fc12min = new TEntry('fc12min');
        $fc12min->setSize(60);
        $fc13min = new TEntry('fc13min');
        $fc13min->setSize(60);
        $fc14min = new TEntry('fc14min');
        $fc14min->setSize(60);
       
        $lbl_fc11min = new TLabel('FC11Min');
        $lbl_fc11min->setSize(100);
        $lbl_fc12min = new TLabel('FC12Min');
        $lbl_fc12min->setSize(60);
        $lbl_fc13min = new TLabel('FC13Min');
        $lbl_fc13min->setSize(60);
        $lbl_fc14min = new TLabel('FC14Min');
        $lbl_fc14min->setSize(60);
        
        $this->form->addQuickFields('-',array($lbl_tpa2, $tpa2, $lbl_fc4i,$fc4i,$lbl_fc4f ,$fc4f));
        $this->form->addQuickFields('-',array($lbl_fc11min,$fc11min, $lbl_fc12min,$fc12min,$lbl_fc13min, $fc13min,$lbl_fc14min, $fc14min));
                
        //Tempo de Baixa 3
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Baixa 3'))->colspan = 2;
  
        $fc5i = new TEntry('fc5i');
        $fc5i->setSize(60);
        $fc5f = new TEntry('fc5f');
        $fc5f->setSize(60);
        $tpb3 =  new TEntry('tpb3');
        $tpb3->setSize(60);
        
        $lbl_tpb3 = new TLabel('Tempo Baixa 3');
        $lbl_tpb3->setSize(100);
        $lbl_fc5i = new TLabel('FC Inicial');
        $lbl_fc5i->setSize(70);
        $lbl_fc5f = new TLabel('FC Final');
        $lbl_fc5f->setSize(70);
   
        $fc15min = new TEntry('fc15min');
        $fc15min->setSize(60);
        $fc16min = new TEntry('fc16min');
        $fc16min->setSize(60);
        $fc17min = new TEntry('fc17min');
        $fc17min->setSize(60);

        $lbl_fc15min = new TLabel('FC15 Min');
        $lbl_fc15min->setSize(100);
        $lbl_fc16min = new TLabel('FC16 Min');
        $lbl_fc16min->setSize(70);
        $lbl_fc17min = new TLabel('FC17 Min');
        $lbl_fc17min->setSize(70);
        
        $this->form->addQuickFields('-',array($lbl_tpb3, $tpb3, $lbl_fc5i,$fc5i,$lbl_fc5f ,$fc5f));
        $this->form->addQuickFields('-',array($lbl_fc15min, $fc15min, $lbl_fc16min, $fc16min, $lbl_fc17min, $fc17min ));
        
        //Tempo Baixa 1
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Dados HIIT Cicloergonômetro de Membros Inferiores'))->colspan = 2;
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Baixa Inferior 1'))->colspan = 2;
        
        // Tempo de Baixa Inferior 1
        $ifc1i = new TEntry('ifc1i');
        $ifc1i->setSize(60);
        $ifc1f = new TEntry('ifc1f');
        $ifc1f->setSize(60);
        $itpb1 =  new TEntry('itpb1');
        $itpb1->setSize(60);
        
        $lbl_itpb1 = new TLabel('Tempo Baixa 1');
        $lbl_itpb1->setSize(100);
        $lbl_ifc1i = new TLabel('FC Inicial');
        $lbl_ifc1i->setSize(90);
        $lbl_ifc1f = new TLabel('FC Final');
        $lbl_ifc1f->setSize(90);
        
        $fc18min = new TEntry('fc18min');
        $fc18min->setSize(60);
        $fc19min = new TEntry('fc19min');
        $fc19min->setSize(60);
        $fc20min = new TEntry('fc20min');
        $fc20min->setSize(60);
        
        $lbl_fc18min = new TLabel('FC18 Min');
        $lbl_fc18min->setSize(100);
        $lbl_fc19min = new TLabel('FC19 Min');
        $lbl_fc19min->setSize(90);
        $lbl_fc20min = new TLabel('FC20 Min');
        $lbl_fc20min->setSize(90);
        
        $this->form->addQuickFields('-',array($lbl_itpb1, $itpb1, $lbl_ifc1i,$ifc1i,$lbl_ifc1f ,$ifc1f));
        $this->form->addQuickFields('-',array($lbl_fc18min, $fc18min, $lbl_fc19min,$fc19min,$lbl_fc20min,$fc20min));
     
        //Tempo Alta Inferior 1
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Alta Inferior 1'))->colspan = 2;
        
        $ifc2i = new TEntry('ifc2i');
        $ifc2i->setSize(60);
        $ifc2f = new TEntry('ifc2f');
        $ifc2f->setSize(60);
        $itpa1 =  new TEntry('itpa1');
        $itpa1->setSize(60);
        
        $lbl_itpa1 = new TLabel('Tempo Alta 1');
        $lbl_itpa1->setSize(100);
        $lbl_ifc2i = new TLabel('FC Inicial');
        $lbl_ifc2i->setSize(90);
        $lbl_ifc2f = new TLabel('FC Final');
        $lbl_ifc2f->setSize(90);
       
        $fc21min = new TEntry('fc21min');
        $fc21min->setSize(60);
        $fc22min = new TEntry('fc22min');
        $fc22min->setSize(60);
        $fc23min = new TEntry('fc23min');
        $fc23min->setSize(60);
        $fc24min = new TEntry('fc24min');
        $fc24min->setSize(60);
        
        $lbl_fc21min = new TLabel('FC21 Min');
        $lbl_fc21min->setSize(100);
        $lbl_fc22min = new TLabel('FC22 Min');
        $lbl_fc22min->setSize(80);
        $lbl_fc23min = new TLabel('FC23 Min');
        $lbl_fc23min->setSize(80);
        $lbl_fc24min = new TLabel('FC24 Min');
        $lbl_fc24min->setSize(80);
        
        $this->form->addQuickFields('-',array($lbl_itpa1, $itpa1, $lbl_ifc2i,$ifc2i,$lbl_ifc2f ,$ifc2f));
        $this->form->addQuickFields('-',array($lbl_fc21min, $fc21min, $lbl_fc22min,$fc22min,$lbl_fc23min,$fc23min,$lbl_fc24min, $fc24min));
        
        //Tempo Baixa Inferior 2
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Baixa Inferior 2'))->colspan = 2;
        
        $ifc3i = new TEntry('ifc3i');
        $ifc3i->setSize(60);
        $ifc3f = new TEntry('ifc3f');
        $ifc3f->setSize(60);
        $itpb2 =  new TEntry('itpb2');
        $itpb2->setSize(60);
        
        $lbl_itpb2 = new TLabel('Tempo Baixa 2');
        $lbl_itpb2->setSize(100);
        $lbl_ifc3i = new TLabel('FC Inicial');
        $lbl_ifc3i->setSize(90);
        $lbl_ifc3f = new TLabel('FC Final');
        $lbl_ifc3f->setSize(90);
       
        $fc25min = new TEntry('fc25min');
        $fc25min->setSize(60);
        $fc26min = new TEntry('fc26min');
        $fc26min->setSize(60);
        $fc27min = new TEntry('fc27min');
        $fc27min->setSize(60);
        
        $lbl_fc25min = new TLabel('FC25 Min');
        $lbl_fc25min->setSize(100);
        $lbl_fc26min = new TLabel('FC26 Min');
        $lbl_fc26min->setSize(90);
        $lbl_fc27min = new TLabel('FC27 Min');
        $lbl_fc27min->setSize(90);

        $this->form->addQuickFields('-',array($lbl_itpb2, $itpb2, $lbl_ifc3i,$ifc3i,$lbl_ifc3f ,$ifc3f));
        $this->form->addQuickFields('-',array($lbl_fc25min, $fc25min, $lbl_fc26min,$fc26min,$lbl_fc27min,$fc27min));
        
        //Tempo Alta Inferior 2
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Alta Inferior 2'))->colspan = 2;
        
        $ifc4i = new TEntry('ifc4i');
        $ifc4i->setSize(60);
        $ifc4f = new TEntry('ifc4f');
        $ifc4f->setSize(60);
        $itpa2 =  new TEntry('itpa2');
        $itpa2->setSize(60);
        
        $lbl_itpa2 = new TLabel('Tempo Alta 2');
        $lbl_itpa2->setSize(100);
        $lbl_ifc4i = new TLabel('FC Inicial');
        $lbl_ifc4i->setSize(90);
        $lbl_ifc4f = new TLabel('FC Final');
        $lbl_ifc4f->setSize(90);
        
        $fc28min = new TEntry('fc28min');
        $fc28min->setSize(60);
        $fc29min = new TEntry('fc29min');
        $fc29min->setSize(60);
        $fc30min = new TEntry('fc30min');
        $fc30min->setSize(60);
        $fc31min = new TEntry('fc31min');
        $fc31min->setSize(60);
        
        $lbl_fc28min = new TLabel('FC28 Min');
        $lbl_fc28min->setSize(100);
        $lbl_fc29min = new TLabel('FC29 Min');
        $lbl_fc29min->setSize(80);
        $lbl_fc30min = new TLabel('FC30 Min');
        $lbl_fc30min->setSize(80);
        $lbl_fc31min = new TLabel('FC31 Min');
        $lbl_fc31min->setSize(80);
        
        $this->form->addQuickFields('-',array($lbl_itpa2, $itpa2, $lbl_ifc4i,$ifc4i,$lbl_ifc4f ,$ifc4f));
        $this->form->addQuickFields('-',array($lbl_fc28min, $fc28min, $lbl_fc29min,$fc29min,$lbl_fc30min,$fc30min,$lbl_fc31min, $fc31min));
        
         //Tempo Baixa Inferior 3
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Tempo Baixa Inferior 3'))->colspan = 2;
        
        $ifc5i = new TEntry('ifc5i');
        $ifc5i->setSize(60);
        $ifc5f = new TEntry('ifc5f');
        $ifc5f->setSize(60);
        $itpb3 =  new TEntry('itpb3');
        $itpb3->setSize(60);
        
        $lbl_itpb3 = new TLabel('Tempo Baixa 3');
        $lbl_itpb3->setSize(100);
        $lbl_ifc5i = new TLabel('FC Inicial');
        $lbl_ifc5i->setSize(90);
        $lbl_ifc5f = new TLabel('FC Final');
        $lbl_ifc5f->setSize(90);
       
        $fc32min = new TEntry('fc32min');
        $fc32min->setSize(60);
        $fc33min = new TEntry('fc33min');
        $fc33min->setSize(60);
        $fc34min = new TEntry('fc34min');
        $fc34min->setSize(60);
        
        $lbl_fc32min = new TLabel('FC32 Min');
        $lbl_fc32min->setSize(100);
        $lbl_fc33min = new TLabel('FC33 Min');
        $lbl_fc33min->setSize(90);
        $lbl_fc34min = new TLabel('FC34 Min');
        $lbl_fc34min->setSize(90);

        $this->form->addQuickFields('-',array($lbl_itpb3, $itpb3, $lbl_ifc5i,$ifc5i,$lbl_ifc5f ,$ifc5f));
        $this->form->addQuickFields('-',array($lbl_fc32min, $fc32min, $lbl_fc33min,$fc33min,$lbl_fc34min,$fc34min));
        
                
         // Esforço de  BORG
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('PERCEPÇÃO SUBJETIVA DE ESFORÇO DE BORG'))->colspan = 2;
        
        $borg = new TCombo('borg');
        $borg->setSize(300);
        
        $esforco = array();
        $esforco[6] = 'Nenhum Esforço';
        $esforco[7] = 'Extremamente Leve';
        $esforco[9] = 'Muito Leve';
        $esforco[11] = 'Leve';
        $esforco[13] = 'Um pouco Intenso';
        $esforco[15] = 'Intenso(pesado)';
        $esforco[17] = 'Muito Intenso';
        $esforco[19] = 'Extremamente Intenso';
        $esforco[20] = 'Máximo Esforço';
        $borg->addItems($esforco);

        $this->form->addQuickField('Esforço BORG',$borg,300);
        //Final Formualario
        $this->form->addQuickField('Parecer',$parecer);   
        $this->form->addQuickField('Data Avaliação Hiit',$dataH,100);
        $parecer->setSize(400, 70);
   
        //Acoes do Botao 
        $this->form->addQuickAction( 'Salvar', new TAction(array($this, 'onSave')), 'ico_save.png' );
             
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'HIIT'));
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
            
            $category = $this->form->getData('AvaliacaoHiit');
            
            $category->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Avaliação Hiit cadastrada com Sucesso!');

        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            
            TTransaction::rollback();
        }
    }
    

   
}//fim da classe

?>



