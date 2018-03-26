<?php
/**
 * @class:     Formulário de Edição da Avaliação Clínica
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriações
 * @license    http://www.adianti.com.br/framework-license
 */
     
class AvaliacaoClinicaForm extends TStandardForm
{
    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
          
        $this->form = new TQuickForm('form_Clinica');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Pesquisa de Avaliação Clínica do Paciente');
        
         // Bancos de dados e Active Record
       parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoClinica');
        
        $id = new TEntry('codAva');
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codPaciente->setSize(350);
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $codAvaliador->setSize(350);
        
        $dataAva= new TDate('dataAva');
        $dataAva->setMask('dd/mm/yyyy');
        $dataAva->setDatabaseMask('yyyy-mm-dd');
        $parecer = new TText('parecer');

        //Objetivos: Clinicos e Funcionais
        $hipoDiag = new TEntry('hipoDiag');
        $hipoClin = new TEntry('hipoClin');
        
        //Historico Clinico
        $clFuncional    = new TRadioGroup('clFuncional');
        $clFuncional->setLayout('horizontal');
        $items = array();
        $items['0'] ='I';
        $items['1'] ='II';
        $items['2'] ='III';
        $items['3'] ='IV';
        $clFuncional->addItems($items);
        $clFuncional->setValue('1');
        
        $clWeber   = new TRadioGroup('clWeber');
        $clWeber->setLayout('horizontal');
        $wb= array();
        $wb['0'] ='A';
        $wb['1'] ='B';
        $wb['2'] ='C';
        $wb['3'] ='D';
        $clWeber->addItems($wb);
        $clWeber->setValue('1');
        
        
        $anginah = new TRadioGroup('anginah');
        $anginah->setValue('1');
        $anginah->setLayout('horizontal');
        $ea = array();
        $ea['0'] = 'Tipíca';
        $ea['1'] = 'Atípica';
        $ea['2'] = 'Não-anginosa';
        $ea['3'] = 'Ausente';
        $anginah->addItems($ea);
        
        $diabetes = new TCombo('diabetes');
        $diabetes->setValue('1');
        $diab = array();
        $diab['0'] = 'Sim';
        $diab['1'] = 'Não';
        $diabetes->addItems($diab);
  
        $dislipidemia = new TCombo('dislipidemia');
        $dislipidemia->setValue('1');
        $dp = array();
        $dp['0'] = 'Sim';
        $dp['1'] = 'Não';
        $dislipidemia->addItems($dp);
        
        $hiperArterial = new TCombo('hiperArterial');
        $hiperArterial->setValue('1');
        $hp = array();
        $hp['0'] = 'Sim';
        $hp['1'] = 'Não';
        $hiperArterial->addItems($hp);

        $tabagismo = new TCombo('tabagismo');
        $tabagismo->setValue('1');
        $tb = array();
        $tb['0'] = 'Sim';
        $tb['1'] = 'Não';
        $tabagismo->addItems($tb);
        
        $icdac = new TCombo('icdac');
        $icdac->setValue('1');
        $ic = array();
        $ic['0'] = 'Sim';
        $ic['1'] = 'Não';
        $icdac->addItems($ic);
       
        $obesidade= new TCombo('obesidade');
        $obesidade->setValue('1');
        $ob = array();
        $ob['0'] = 'Sim';
        $ob['1'] = 'Não';
        $obesidade->addItems($ob);
       
        $angina= new TCombo('angina');
        $angina->setValue('1');
        $an = array();
        $an['0'] = 'Sim';
        $an['1'] = 'Não';
        $angina->addItems($an);
        
        $arritmia= new TCombo('arritmia');
        $arritmia->setValue('1');
        $ar = array();
        $ar['0'] = 'Sim';
        $ar['1'] = 'Não';
        $arritmia->addItems($ar);
        
        $chagas= new TCombo('chagas');
        $chagas->setValue('1');
        $ch = array();
        $ch['0'] = 'Sim';
        $ch['1'] = 'Não';
        $chagas->addItems($ch);

        $cansaco= new TCombo('cansaco');
        $cansaco->setValue('1');
        $ca = array();
        $ca['0'] = 'Sim';
        $ca['1'] = 'Não';
        $cansaco->addItems($ca);
        
        $febre= new TCombo('febre');
        $febre->setValue('1');
        $fb = array();
        $fb['0'] = 'Sim';
        $fb['1'] = 'Não';
        $febre->addItems($fb);
        
        $isCardiaca= new TCombo('isCardiaca');
        $isCardiaca->setValue('1');
        $isc = array();
        $isc['0'] = 'Sim';
        $isc['1'] = 'Não';
        $isCardiaca->addItems($isc);
        
        $acidenteVe= new TCombo('acidenteVe');
        $acidenteVe->setValue('1');
        $ave = array();
        $ave['0'] = 'Sim';
        $ave['1'] = 'Não';
        $acidenteVe->addItems($ave);
        
        $isMitral= new TCombo('isMitral');
        $isMitral->setValue('1');
        $isn = array();
        $isn['0'] = 'Sim';
        $isn['1'] = 'Não';
        $isMitral->addItems($isn);
        
        $doencaPulmonar= new TCombo('doencaPulmonar');
        $doencaPulmonar->setValue('1');
        $doen = array();
        $doen['0'] = 'Sim';
        $doen['1'] = 'Não';
        $doencaPulmonar->addItems($doen);
        
        $infarto= new TCombo('infarto');
        $infarto->setValue('1');
        $inf = array();
        $inf['0'] = 'Sim';
        $inf['1'] = 'Não';
        $infarto->addItems($inf);
        
        $cardiopatia= new TCombo('cardiopatia');
        $cardiopatia->setValue('1');
        $card = array();
        $card['0'] = 'Sim';
        $card['1'] = 'Não';
        $cardiopatia->addItems($card);
        
        $soproAsma= new TCombo('soproAsma');
        $soproAsma->setValue('1');
        $sp = array();
        $sp['0'] = 'Sim';
        $sp['1'] = 'Não';
        $soproAsma->addItems($sp);
        
        $miocardiopatia= new TCombo('miocardiopatia');
        $miocardiopatia->setValue('1');
        $mcard = array();
        $mcard['0'] = 'Sim';
        $mcard['1'] = 'Não';
        $miocardiopatia->addItems($mcard);
        
        $sincope= new TCombo('sincope');
        $sincope->setValue('1');
        $sc = array();
        $sc['0'] = 'Sim';
        $sc['1'] = 'Não';
        $sincope->addItems($sc);
        
        $outroac= new TEntry('outroac');
        $outroac->setSize(300);
      
        // Procedimentos realizados
        $checkup= new TCombo('checkup');
        $checkup->setValue('1');
        $checkup->setSize(60);
        $ck = array();
        $ck['0'] = 'Sim';
        $ck['1'] = 'Não';
        $checkup->addItems($ck);
        
        $preoperatorio= new TCombo('preoperatorio');
        $preoperatorio->setValue('1');
         $preoperatorio->setSize(60);
        $pre = array();
        $pre['0'] = 'Sim';
        $pre['1'] = 'Não';
        $preoperatorio->addItems($pre);
        
        $trocaValvula= new TCombo('trocaValvula');
        $trocaValvula->setValue('1');
        $trocaValvula->setSize(60); 
        $tv = array();
        $tv['0'] = 'Sim';
        $tv['1'] = 'Não';
        $trocaValvula->addItems($tv);
        
        $revascularizacao= new TCombo('revascularizacao');
        $revascularizacao->setValue('1');
        $revascularizacao->setSize(60); 
        $rv = array();
        $rv['0'] = 'Sim';
        $rv['1'] = 'Não';
        $revascularizacao->addItems($rv);
        
        $angioplastia= new TCombo('angioplastia');
        $angioplastia->setValue('1');
        $angioplastia->setSize(60); 
        $angio = array();
        $angio['0'] = 'Sim';
        $angio['1'] = 'Não';
        $angioplastia->addItems($angio);
        
        $transplante= new TCombo('transplante');
        $transplante->setValue('1');
        $transplante->setSize(60); 
        $tp = array();
        $tp['0'] = 'Sim';
        $tp['1'] = 'Não';
        $transplante->addItems($tp);
        
        $cateterismo= new TCombo('cateterismo');
        $cateterismo->setValue('1');
        $cateterismo->setSize(60); 
        $cate = array();
        $cate['0'] = 'Sim';
        $cate['1'] = 'Não';
        $cateterismo->addItems($cate);
        
        $posoperatorio= new TCombo('posoperatorio');
        $posoperatorio->setValue('1');
         $posoperatorio->setSize(60); 
        $oper = array();
        $oper['0'] = 'Sim';
        $oper['1'] = 'Não';
        $posoperatorio->addItems($oper);
       
        $marcaPasso= new TCombo('marcaPasso');
        $marcaPasso->setValue('1');
        $marcaPasso->setSize(60); 
        $mp = array();
        $mp['0'] = 'Sim';
        $mp['1'] = 'Não';
        $marcaPasso->addItems($mp);
        
        $outropr= new TEntry('outropr');
        $outropr->setSize(300);
        
        $data1 = new TDate('data1');
        $data1->setMask('dd/mm/yyyy');
        $data1->setValue('01/05/2017');
        $data1->setSize(80);
        $data1->setDatabaseMask('yyyy-mm-dd');
        $data2 = new TDate('data2');
        $data2->setMask('dd/mm/yyyy');
        $data2->setDatabaseMask('yyyy-mm-dd');
        $data2->setSize(80);
        $data3 = new TDate('data3');
        $data3->setMask('dd/mm/yyyy');
        $data3->setDatabaseMask('yyyy-mm-dd');
        $data3->setSize(80);
        $data4 = new TDate('data4');
        $data4->setMask('dd/mm/yyyy');
        $data4->setDatabaseMask('yyyy-mm-dd');
        $data4->setSize(80);
        $data5 = new TDate('data5');
        $data5->setMask('dd/mm/yyyy');
        $data5->setDatabaseMask('yyyy-mm-dd');
        $data5->setSize(80);
        $data6 = new TDate('data6');
        $data6->setMask('dd/mm/yyyy');
        $data6->setDatabaseMask('yyyy-mm-dd');
        $data6->setSize(80);
        $data7 = new TDate('data7');
        $data7->setMask('dd/mm/yyyy');
        $data7->setDatabaseMask('yyyy-mm-dd');
        $data7->setSize(80);
        $data8 = new TDate('data8');
        $data8->setMask('dd/mm/yyyy');
        $data8->setDatabaseMask('yyyy-mm-dd');
        $data8->setSize(80);
        $data9 = new TDate('data9');
        $data9->setMask('dd/mm/yyyy');
        $data9->setDatabaseMask('yyyy-mm-dd');
        $data9->setSize(80);
        $data10 = new TDate('data10');
        $data10->setMask('dd/mm/yyyy');
        $data10->setDatabaseMask('yyyy-mm-dd');
        $data10->setSize(80);
        
        
        //Avaliação Física
        $peso = new TEntry('peso');
        $peso->setSize(80);
        $estatura = new TEntry('estatura');
        $estatura->setSize(80);
        $circAbdominal = new TEntry('circAbdominal');
        $circAbdominal->setSize(80);
        $circQuadril = new TEntry('circQuadril');
        $circQuadril->setSize(80);
        $fc = new TEntry('frequencia');
        $fc->setSize(80);
        $pa1 = new TEntry('pressao1');
        $pa1->setSize(80);
        $pa2 = new TEntry('pressao2');
        $pa2->setSize(80);
        $a0 = new TEntry('a0');
        $a0->setSize(70);
        $ae = new TEntry('ae');
        $ae->setSize(70);
        $s = new TEntry('s');
        $s->setSize(70);
        $pp = new TEntry('pp');
        $pp->setSize(70);
        $ve = new TEntry('ve');
        $ve->setSize(70);
        $fe = new TEntry('fe');
        $fe->setSize(70);
        $sistolica = new TEntry('sistolica');
        $sistolica->setSize(400);
        $diastolica = new TEntry('diastolica');
        $diastolica->setSize(400);
        $valvas = new TEntry('valvas');
        $valvas->setSize(400);
        $outroeco = new TEntry('outroeco');
        $outroeco->setSize(400);
        
        $osteoarticular = new TCombo('osteoarticular');
        $osteoarticular->setValue('0');
        $osteoarticular->setSize(100);
        $osteo = array();
        $osteo['0'] = 'Normal';
        $osteo['1'] = 'Alterado';
        $osteoarticular->addItems($osteo);
        
        $cardiovascular= new TCombo('cardiovascular');  
        $cardiovascular->setValue('0');
        $cardiovascular->setSize(60);
        $cardio = array();
        $cardio['0'] = 'Normal';
        $cardio['1'] = 'Alterado';
        $cardiovascular->addItems($cardio);
        
        $respiratorio = new TCombo('respiratorio');
        $respiratorio->setValue('0');
        $respiratorio->setSize(60);
        $resp = array();
        $resp['0'] = 'Normal';
        $resp['1'] = 'Alterado';
        $respiratorio->addItems($resp);
        
        $abdominal = new TCombo('abdominal');  
        $abdominal->setValue('0');
        $abdominal->setSize(60);
        $abd = array();
        $abd['0'] = 'Normal';
        $abd['1'] = 'Alterado';
        $abdominal->addItems($abd);
        
        $extremidades = new TCombo('extremidades');  
        $extremidades->setValue('0');
        $extremidades->setSize(60);
        $ext = array();
        $ext['0'] = 'Normal';
        $ext['1'] = 'Alterado';
        $extremidades->addItems($ext);
       
        $eletro = new TCombo('eletrocardiograma');  
        $eletro->setValue('1');
        $eletro->setSize(60);
        $elt = array();
        $elt['0'] = 'Normal';
        $elt['1'] = 'Alterado';
        $eletro->addItems($elt);
         
        
        $lbl_preoperatorio = new TLabel('Pré-operatório');
        $lbl_preoperatorio->setSize(120);
        $lbl_revascularizacao = new TLabel('Revascularização');
        $lbl_revascularizacao->setSize(120);
        $lbl_transplante = new TLabel('Transplante');
        $lbl_transplante->setSize(120);
        $lbl_posoperatorio = new TLabel('Pós-operatório');
        $lbl_posoperatorio->setSize(120);
        $lbl_outropr = new TLabel('Outro');
        $lbl_outropr->setSize(120);
        $lbl_data1 = new TLabel('Data');
        $lbl_data1->setSize(50);
        $lbl_data2 = new TLabel('Data');
        $lbl_data2->setSize(50);
        $lbl_data3 = new TLabel('Data');
        $lbl_data3->setSize(50);
        $lbl_data4 = new TLabel('Data');
        $lbl_data4->setSize(50);
        $lbl_data5 = new TLabel('Data');
        $lbl_data5->setSize(50);
        $lbl_data6 = new TLabel('Data');
        $lbl_data6->setSize(50);
        $lbl_data7 = new TLabel('Data');
        $lbl_data7->setSize(50);
        $lbl_data8 = new TLabel('Data');
        $lbl_data8->setSize(50);
        $lbl_data9 = new TLabel('Data');
        $lbl_data9->setSize(50);
        $lbl_data10 = new TLabel('Data');
        $lbl_data10->setSize(50);
        
        //Avaliacao Fisica
        $lbl_cirabdominal = new TLabel('Circunferência Abdominal');
        $lbl_cirabdominal->setSize(200);
        $lbl_cirquadril = new TLabel('Circunferência Quadril');
        $lbl_cirquadril->setSize(200);
        $lbl_estatura = new TLabel('Estatura');
        $lbl_estatura->setSize(120);
        $lbl_pa1 = new TLabel('Pressão');
        $lbl_pa1->setSize(120);
        $lbl_pa2 = new TLabel('x');
        $lbl_pa2->setSize(20);
        
        //Ecocardiograma
        $lbl_ae = new TLabel('AE');
        $lbl_ae->setSize(30);
        $lbl_s = new TLabel('S');
        $lbl_s->setSize(30);
        $lbl_pp = new TLabel('PP');
        $lbl_pp->setSize(30);
        $lbl_ve = new TLabel('VE');
        $lbl_ve->setSize(30);
        $lbl_fe = new TLabel('FE');
        $lbl_fe->setSize(30);
        
        //Teste de Exercicios Cardiopulmonar
        $repousovo2 = new TEntry('repousovo2');
        $repousovo2->setSize(100);
        $repousofc = new TEntry('repousofc');
        $repousofc->setSize(100);
        $repousopa1= new TEntry('repousopa1');
        $repousopa1->setSize(100);
        $repousopa2= new TEntry('repousopa2');
        $repousopa2->setSize(100);
        
        $plimiar1vo2 = new TEntry('plimiar1vo2');
        $plimiar1vo2->setSize(100);
        $plimiar1fc = new TEntry('plimiar1fc');
        $plimiar1fc->setSize(100);
        $plimiar1pa1 = new TEntry('plimiar1pa1');
        $plimiar1pa1->setSize(100);
        $plimiar1pa2= new TEntry('plimiar1pa2');
        $plimiar1pa2->setSize(100);
        
        $plimiar2vo2 = new TEntry('plimiar2vo2');
        $plimiar2vo2->setSize(100);
        $plimiar2fc = new TEntry('plimiar2fc');
        $plimiar2fc->setSize(100);
        $plimiar2pa1 = new TEntry('plimiar2pa1');
        $plimiar2pa1->setSize(100);
        $plimiar2pa2= new TEntry('plimiar2pa2');
        $plimiar2pa2->setSize(100);
       
        $isqvo2 = new TEntry('isqvo2');
        $isqvo2->setSize(100);
        $isqfc = new TEntry('isqfc');
        $isqfc->setSize(100);
        $isqpa1 = new TEntry('isqpa1');
        $isqpa1->setSize(100);
        $isqpa2= new TEntry('isqpa2');
        $isqpa2->setSize(100);
       
        $mxvo2 = new TEntry('mxvo2');
        $mxvo2->setSize(100);
        $mxfc = new TEntry('mxfc');
        $mxfc->setSize(100);
        $mxpa1 = new TEntry('mxpa1');
        $mxpa1->setSize(100);
        $mxpa2= new TEntry('mxpa2');
        $mxpa2->setSize(100);
        
        
        $lbl_repousofc = new TLabel('');
        $lbl_repousofc->setSize(60);
        $lbl_repousopa = new TLabel('');
        $lbl_repousopa->setSize(60);
        $lbl_plimiar1fc = new TLabel('');
        $lbl_plimiar1fc->setSize(60);
        $lbl_plimiar1pa = new TLabel('');
        $lbl_plimiar1pa->setSize(60);
        $lbl_plimiar2pa = new TLabel('');
        $lbl_plimiar2pa->setSize(60);
        $lbl_plimiar2fc = new TLabel('');
        $lbl_plimiar2fc->setSize(60);
        $lbl_isqfc = new TLabel('');
        $lbl_isqfc->setSize(60);
        $lbl_isqpa = new TLabel('');
        $lbl_isqpa->setSize(60);
        $lbl_mxfc = new TLabel('');
        $lbl_mxfc->setSize(60);
        $lbl_mxpa = new TLabel('');
        $lbl_mxpa->setSize(60);
   
        
        $lbl_diabetes= new TLabel('Diabetes');
        $lbl_diabetes->setSize(200);
        $lbl_dislipidemia = new TLabel('Dislipidemia');
        $lbl_dislipidemia->setSize(200);
        $lbl_icdac= new TLabel('Insuficiência');
        $lbl_icdac->setSize(200);
        $lbl_obesidade = new TLabel('Obesidade');
        $lbl_obesidade->setSize(200);
       
        //Antecedentes Cardiológicos Pulmonares
        $lbl_chagas= new TLabel('Chagas');
        $lbl_chagas->setSize(200);
        $lbl_cansaco = new TLabel('Cansaço');
        $lbl_cansaco->setSize(200);
        $lbl_iscardiaca= new TLabel('Insulficiência Cardíaca');
        $lbl_iscardiaca->setSize(200);
        $lbl_acidenteve = new TLabel('Acidente Vascular Encefálico');
        $lbl_acidenteve->setSize(200);
        
        $lbl_doencapulmonar = new TLabel('Doença Pulmonar Crônica');
        $lbl_doencapulmonar->setSize(200);
        $lbl_infarto = new TLabel('Infarto Agudo do Miocárdio');
        $lbl_infarto->setSize(200);
        
        $lbl_sopro = new TLabel('Sopro/Asma');
        $lbl_sopro->setSize(200);
        $lbl_miocardiopatia = new TLabel('Miocardiopatia');
        $lbl_miocardiopatia->setSize(200);
        $lbl_sincope = new TLabel('Sincope');
        $lbl_sincope->setSize(200);
   
        
        // Campos que aparecem no Formulário
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        $this->form->addQuickField('Hipótese Diagnóstica',$hipoDiag,350);   
        $this->form->addQuickField('Diagnóstico Clínico',$hipoClin,350);   
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Histórico Clínico'))->colspan = 2;
   
        $this->form->addQuickField('Classe Funcional NYHA ',$clFuncional,300);
        $this->form->addQuickField('Classificação de Weber e Janick ',$clWeber,300);
        $this->form->addQuickFields('Angina ', array($angina, $lbl_dislipidemia, $dislipidemia, $lbl_diabetes, $diabetes));
        $this->form->addQuickFields('Hipertensão Arterial ', array($hiperArterial, $lbl_icdac, $icdac, $lbl_obesidade, $obesidade));
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Antecedentes Cardiológicos Pulmonares'))->colspan = 2;
   
        $this->form->addQuickField('Angina ', $anginah);
        $this->form->addQuickFields('Arritmia',array($arritmia, $lbl_chagas, $chagas, $lbl_cansaco, $cansaco));
        $this->form->addQuickFields('Febre Reumática ', array($febre, $lbl_iscardiaca, $isCardiaca, $lbl_acidenteve, $acidenteVe));
        $this->form->addQuickFields('Insulficiênica Mitral e Aórtica', array($isMitral, $lbl_doencapulmonar, $doencaPulmonar, $lbl_infarto, $infarto));
        $this->form->addQuickFields('Cardiopatia Isquêmica ', array($cardiopatia, $lbl_sopro, $soproAsma, $lbl_miocardiopatia, $miocardiopatia, $lbl_sincope, $sincope));
        $this->form->addQuickField('Outro',$outroac,300);
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Procedimentos Realizados'))->colspan = 2;
        
        $this->form->addQuickFields('Check-up ', array($checkup, $lbl_data1, $data1, $lbl_preoperatorio, $preoperatorio, $lbl_data2,$data2));
        $this->form->addQuickFields('Troca de válvula biológica/Metálica ', array($trocaValvula, $lbl_data3, $data3, $lbl_revascularizacao, $revascularizacao,$lbl_data4,$data4));
        $this->form->addQuickFields('Angioplastia ', array($angioplastia, $lbl_data5, $data5, $lbl_transplante, $transplante,$lbl_data6,$data6));
        $this->form->addQuickFields('Angioplastia ', array($cateterismo, $lbl_data7, $data7, $lbl_posoperatorio, $posoperatorio,$lbl_data8,$data8));
        $this->form->addQuickFields('Marca-passo ', array($marcaPasso, $lbl_data9, $data9, $lbl_outropr, $outropr,$lbl_data10,$data10));
       
        //Medicamneto
        
        $classe1  = new TDBCombo('classe1','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe1->setSize(200);
        $classe2  = new TDBCombo('classe2','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe2->setSize(200);
        $classe3  = new TDBCombo('classe3','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe3->setSize(200);
        $classe4  = new TDBCombo('classe4','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe4->setSize(200);
        $classe5  = new TDBCombo('classe5','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe5->setSize(200);
        $classe6  = new TDBCombo('classe6','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe6->setSize(200);
        $classe7  = new TDBCombo('classe7','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe7->setSize(200);
        $classe8  = new TDBCombo('classe8','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe8->setSize(200);
        $classe9  = new TDBCombo('classe9','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe9->setSize(200);
        $classe10  = new TDBCombo('classe10','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe10->setSize(200);
        $classe11  = new TDBCombo('classe11','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe11->setSize(200);
        $classe12  = new TDBCombo('classe12','permission','GrupoRemedio','descricaoGrupo','descricaoGrupo');
        $classe12->setSize(200);
        
        $med1 = new TDBCombo('med1','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med1->setSize(200);
        $med2 = new TDBCombo('med2','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med2->setSize(200);
        $med3 = new TDBCombo('med3','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med3->setSize(200);
        $med4 = new TDBCombo('med4','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med4->setSize(200);
        $med5 = new TDBCombo('med5','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med5->setSize(200);
        $med6 = new TDBCombo('med6','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med6->setSize(200);
        $med7 = new TDBCombo('med7','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med7->setSize(200);
        $med8 = new TDBCombo('med8','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med8->setSize(200);
        $med9 = new TDBCombo('med9','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med9->setSize(200);
        $med10 = new TDBCombo('med10','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med10->setSize(200);
        $med11 = new TDBCombo('med11','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med11->setSize(200);
        $med12 = new TDBCombo('med12','permission','Remedio','descricaoRemedio','descricaoRemedio');
        $med12->setSize(200);
        
        
        $lbl_medic1 = new TLabel('Medicamento 1');
        $lbl_medic1->setSize(200);
        $lbl_medic2 = new TLabel('Medicamento 2');
        $lbl_medic2->setSize(200);
        $lbl_medic3 = new TLabel('Medicamento 3');
        $lbl_medic3->setSize(200);
        $lbl_medic4 = new TLabel('Medicamento 4');
        $lbl_medic4->setSize(200);
        $lbl_medic5 = new TLabel('Medicamento 5');
        $lbl_medic5->setSize(200);
        $lbl_medic6 = new TLabel('Medicamento 6');
        $lbl_medic6->setSize(200);
        $lbl_medic7 = new TLabel('Medicamento 7');
        $lbl_medic7->setSize(200);
        $lbl_medic8 = new TLabel('Medicamento 8');
        $lbl_medic8->setSize(200);
        $lbl_medic9 = new TLabel('Medicamento 9');
        $lbl_medic9->setSize(200);
        $lbl_medic10 = new TLabel('Medicamento 10');
        $lbl_medic10->setSize(200);
        $lbl_medic11 = new TLabel('Medicamento 11');
        $lbl_medic11->setSize(200);
        $lbl_medic12 = new TLabel('Medicamento 12');
        $lbl_medic12->setSize(200);
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Medicamentos em Uso'))->colspan = 2;
        
        $this->form->addQuickFields('Classe 01 ', array($classe1, $lbl_medic1, $med1));
        $this->form->addQuickFields('Classe 02 ', array($classe2, $lbl_medic2, $med2));
        $this->form->addQuickFields('Classe 03 ', array($classe3, $lbl_medic3, $med3));
        $this->form->addQuickFields('Classe 04 ', array($classe4, $lbl_medic4, $med4));
        $this->form->addQuickFields('Classe 05 ', array($classe5, $lbl_medic5, $med5));
        $this->form->addQuickFields('Classe 06 ', array($classe6, $lbl_medic6, $med6));
        $this->form->addQuickFields('Classe 07 ', array($classe7, $lbl_medic7, $med7));
        $this->form->addQuickFields('Classe 08 ', array($classe8, $lbl_medic8, $med8));
        $this->form->addQuickFields('Classe 09 ', array($classe9, $lbl_medic9, $med9));
        $this->form->addQuickFields('Classe 10 ', array($classe10, $lbl_medic10, $med10));
        $this->form->addQuickFields('Classe 11 ', array($classe11, $lbl_medic11, $med11));
        $this->form->addQuickFields('Classe 12 ', array($classe12, $lbl_medic12, $med12));

        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Avaliação Física'))->colspan = 2;
        
        $this->form->addQuickFields('Peso ', array($peso, $lbl_estatura, $estatura, $lbl_cirabdominal, $circAbdominal, $lbl_cirquadril, $circQuadril));
        $this->form->addQuickFields('Frequência Cardíaca (FC) em Repouso ', array($fc, $lbl_pa1, $pa1, $lbl_pa2, $pa2));
        $this->form->addQuickField('Sistema Osteroarticular',$osteoarticular,150);
        $this->form->addQuickField('Sistema Cardiovascular',$cardiovascular,150);
        $this->form->addQuickField('Sistema Respiratório',$respiratorio,150);
        $this->form->addQuickField('Sistema Abdominal',$abdominal,150);
        $this->form->addQuickField('Extremidades',$extremidades,150);
     
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Eletrocardiograma'))->colspan = 2;
        
        $this->form->addQuickField('Eletrocardiograma',$eletro,100);
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Ecocardiograma'))->colspan = 2;
        
        $this->form->addQuickFields('Ao ', array($a0, $lbl_ae, $ae, $lbl_s, $s, $lbl_pp, $pp, $lbl_ve, $ve , $lbl_fe, $fe));
        $this->form->addQuickField('Função Sistólica',$sistolica,300);
        $this->form->addQuickField('Função Diastólica',$diastolica,300);
        $this->form->addQuickField('Valvas',$valvas,300);
        $this->form->addQuickField('Outros',$outroeco,300);
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('Teste de Exercício Cardiopulmonar ------------------------- VO2 (mL.kg.min) ------------ Frequência Cardíaca (FC)  ------------ Pressão Arterial (PA)mmHg)'))->colspan = 2;
                
        $this->form->addQuickFields('Repouso ', array($repousovo2, $lbl_repousofc, $repousofc,$lbl_repousopa, $repousopa1,  $repousopa2));
        $this->form->addQuickFields('Primeiro Limiar ', array($plimiar1vo2, $lbl_plimiar1fc,  $plimiar1fc, $lbl_plimiar1pa, $plimiar1pa1, $plimiar1pa2));
        $this->form->addQuickFields('Segundo Limiar ', array($plimiar2vo2, $lbl_plimiar2fc, $plimiar2fc,$lbl_plimiar2pa, $plimiar2pa1, $plimiar2pa2));
        $this->form->addQuickFields('Isquemia ', array($isqvo2, $lbl_isqfc, $isqfc, $lbl_isqpa, $isqpa1,$isqpa2));
        $this->form->addQuickFields('Máximo/Pico ', array($mxvo2, $lbl_mxfc, $mxfc, $lbl_mxpa,$mxpa1, $mxpa2));

                
        $this->form->addQuickField('Parecer',$parecer);   
        $this->form->addQuickField('Data Avaliação Clínica',$dataAva,100);
        $parecer->setSize(400, 70);
   
        //Acoes do Botao 
        $this->form->addQuickAction( 'Salvar', new TAction(array($this, 'onSave')), 'ico_save.png' );
        $this->form->addQuickAction('Voltar', new TAction(array('PesquisaAvaliacaoClinica', 'onReload')), 'ico_back.png');

     
             
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'AvaliacaoPaciente'));
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
            
            $avaliacao = $this->form->getData('AvaliacaoClinica');
            
            $avaliacao->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Avaliação Clínica atualizada com Sucesso!');

        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            
            TTransaction::rollback();
        }
    }
    

   
}//fim da classe

?>




