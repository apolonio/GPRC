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
class TreinamentoAerobico extends TStandardForm
{
    protected $form;     
    private $loaded;

    public function __construct()
    {
        parent::__construct();
          
        $this->form = new TQuickForm('form_tr');
        $this->form->class = 'tform';
        $this->form->style = 'width: 900px';
        $this->form->setFormTitle('Evolução Treinamento Aeróbico do Paciente');
        
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoTreinamentoAerobico');
        
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codPaciente->setSize(800);
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $codAvaliador->setSize(800);
        $dataAerobico= new TDate('dataAerobico');
        $dataAerobico->setMask('dd/mm/yyyy');
        $dataAerobico->setDatabaseMask('yyyy-mm-dd');
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
        $row->addCell( new TLabel('TREINAMENTO AERÓBICO'))->colspan = 2;
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
         * Treinamento Contínuo de Intensidade Moderada
         */
        $tempo = new TEntry('tempo');
        $tempo->setSize(90);
        $tempo->setMask('99:99');
        $fcinftcim = new TEntry('fcinftcim');
        $fcinftcim->setSize(90);
        $fcsup = new TEntry('fcsuptcim');
        $fcsup->setSize(90);
        
        $lbl_tempo =  new TLabel('Tempo');
        $lbl_tempo->setSize(100); 
        $lbl_fcinferior =  new TLabel('FC Inferior');
        $lbl_fcinferior->setSize(90); 
        $lbl_fcsuperior =  new TLabel('FC Superior');
        $lbl_fcsuperior->setSize(90); 
        
        $this->form->addQuickFields('Treinamento Contínuo de Intensidade Moderada', array($lbl_tempo,$tempo, $lbl_fcinferior, $fcinftcim, $lbl_fcsuperior, $fcsup));
       
        
        $row = $this->form->addRow();
        $row->class = 'tformsection';
        $row->addCell( new TLabel('CARACTERÍSTICAS DO CICLOERGÔMETROS'))->colspan = 2;
        
         /*
         * CICLOERGOMETROS
         */
        $duracaos = new TEntry('duracaos');
        $duracaos->setSize(70);
        $duracaos->setMask('99:99');
        $cargas = new TEntry('cargas');
        $cargas->setSize(70);
        $rpms = new TEntry('rpms');
        $rpms->setSize(70);
        $manivela = new TEntry('manivela');
        $manivela->setSize(70);
        $assento = new TEntry('assento');
        $assento->setSize(70);
      
        $duracaoi = new TEntry('duracaoi');
        $duracaoi->setSize(70);
        $duracaoi->setMask('99:99');
        $cargai = new TEntry('cargai');
        $cargai->setSize(70);
        $rpmi = new TEntry('rpmi');
        $rpmi->setSize(70);
        $posicaoi = new TEntry('posicaoi');
        $posicaoi->setSize(70);
  
        $esteiraV = new TEntry('esteiraV');
        $esteiraV->setSize(70);
        $esteiraI = new TEntry('esteiraI');
        $esteiraI->setSize(70);
  
        $lbl_duracaos =  new TLabel('Duração');
        $lbl_duracaos->setSize(70);  
        $lbl_cargas =  new TLabel('Carga');
        $lbl_cargas->setSize(70); 
        $lbl_rpms =  new TLabel('RPM');
        $lbl_rpms->setSize(70);  
        $lbl_manivela =  new TLabel('Manivela');
        $lbl_manivela->setSize(70); 
        $lbl_assento=  new TLabel('Assento');
        $lbl_assento->setSize(70);  
        $lbl_duracaoi =  new TLabel('Duração');
        $lbl_duracaoi->setSize(70);  
        $lbl_cargai =  new TLabel('Carga');
        $lbl_cargai->setSize(70);  
        $lbl_rpmi =  new TLabel('RPM');
        $lbl_rpmi->setSize(70); 
        $lbl_posicaoi =  new TLabel('Posição');
        $lbl_posicaoi->setSize(70);  
       
        $lbl_esteiraV =  new TLabel('Velocidade');
        $lbl_esteiraV->setSize(80); 
        $lbl_esteiraI =  new TLabel('Inclinação');
        $lbl_esteiraI->setSize(70);  
        
        $this->form->addQuickFields('Cicloergômetro M. Superiores', array( $lbl_duracaos,  $duracaos, $lbl_cargas,$cargas, $lbl_rpms, $rpms, $lbl_manivela, $manivela,$lbl_assento, $assento )); 
        $this->form->addQuickFields('Cicloergômetro M. Inferiores', array( $lbl_duracaoi,  $duracaoi, $lbl_cargai,$cargai, $lbl_rpmi, $rpmi, $lbl_posicaoi, $posicaoi )); 
        $this->form->addQuickFields('Esteira', array( $lbl_esteiraV,  $esteiraV,$lbl_esteiraI, $esteiraI)); 
        
        //Final Formualario
        $this->form->addQuickField('Parecer',$parecer);   
        $this->form->addQuickField('Data T. Aeróbico',$dataAerobico,100);
        $parecer->setSize(400, 70);
   
        //Acoes do Botao 
        $this->form->addQuickAction( 'Salvar', new TAction(array($this, 'onSave')), 'ico_save.png' );
             
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'TreinamentoAerobico'));
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
            
            $aerobico = $this->form->getData('AvaliacaoTreinamentoAerobico');
            
            $aerobico->store();
            
            TTransaction::close();
            
            new TMessage('info', 'Avaliação Treinamento Aeróbico cadastrada com Sucesso!');

        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
            
            TTransaction::rollback();
        }
    }
    

   
}//fim da classe

?>



