<?php
/**
 * @class:     FichaIndividual: Conecta em diversas tabelas e traz os resultados
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2013 Icriacoes. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FichaIndividual extends TPage
{
    private $form;
    private $datagrid;
    
  
    public function __construct()
    {
        parent::__construct();

        $this->form = new TQuickForm('form');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Pesquisa de Avaliações Complementares');
        
        $codigoPaciente    = new TDBSeekButton('codigoPaciente', 'permission', 'form', 'Paciente', 'nome', 'codigoPaciente', 'nome');
        $nome  = new TEntry('nome');
        
        $this->form->addQuickFields('Paciente', array($codigoPaciente, $nome));
        $this->form->addQuickAction('Checar Paciente', new TAction(array($this, 'onCheckPaciente')), 'ico_apply.png');
        $codigoPaciente->setSize(120);
        $nome->setSize(500);
        $codigoPaciente->setSize(90);
        $nome->setEditable(FALSE);
        
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);
        parent::add($vbox);
    }

    public function onCheckPaciente()
    {
        try
        {
            $data = $this->form->getData(); 
            $this->form->setData( $data ); 
            
            $html = new THtmlRenderer('app/resources/fichaIndividual.html');
            
            parent::include_css('app/resources/styles.css');
            
            TTransaction::open('permission');
            $paciente = new Paciente;
            $object = $paciente->load( $data->codigoPaciente );
            
            if ($object)
            {
                $array_object = $object->toArray();
                $array_object['nome'] = $object->nome;
                $html->enableSection('main',  $array_object);
                
                $replaces = array();
                $exames = $object->getPaciente();
                
                $replace_equlibrio = array();
                $equilibrio = $object->getEquilibrio();
            
                $replace_ombro = array();
                $ombro = $object->getOmbro();
              
                $replace_well = array();
                $well = $object->getWell();
                
                $replace_bdi = array();
                $bdi = $object->getBDI();
                
                $replace_min = array();
                $minnesota = $object->getMinnesota();
                
                if ($exames)
                {
                    foreach ($exames as $item)
                    {
                            $replaces[] = array('codExameItem'        => $item->codExameItem,
                                                'codPaciente'         => $item->codPaciente,
                                                'codAvaliador'        => $item->codAvaliador,
                                                'codAvaliador'        => $item->Avaliador->nomeAvaliador,
                                                'codTipoExame'         => $item->codTipoExame,
                                                'codTipoExame'         => $item->TipoExame->descricaoTipoExame,                                             
                                                'file_path'            => $item->file_path,
                                                'parecer'               => $item->parecer,
                                                'dataExameItem'          => $item->dataExameItem); 
                    }
                }
                if ($equilibrio)
                {
                    foreach ($equilibrio as $eq)
                    {
                            $replace_equlibrio[] = array('codAvaliacaoEquilibrio'        => $eq->codAvaliacaoEquilibrio,
                                                        'codPaciente'         => $eq->codPaciente,
                                                        'codAvaliador'        => $eq->codAvaliador,
                                                        'codAvaliador'        => $eq->Avaliador->nomeAvaliador,
                                                        'media'              => $eq->media,
                                                        'conclusao'            => $eq->conclusao,
                                                        'parecer'               => $eq->parecer,
                                                        'dataAvaliacao'          => $eq->dataAvaliacao); 
                    }
                }
                if ($ombro)
                {
                    foreach ($ombro as $ob)
                    {
                            $replace_ombro[] = array('codAvaliacaoOmbros'  => $ob->codAvaliacaoOmbros,
                                                'codAvaliador'             => $ob->codAvaliador,
                                                'codAvaliador'             => $ob->Avaliador->nomeAvaliador,
                                                'media'                    => $ob->media,
                                                'maoDominante'             => $ob->maoDominante,
                                                'conclusao'                => $ob->conclusao,
                                                'parecer'                  => $ob->parecer,
                                                'dataAvaliacao'            => $ob->dataAvaliacao); 
                    }
                }
                if ($well)
                {
                    foreach ($well as $w)
                    {
                            $replace_well[] = array('codWells'        => $w->codWells,
                                                    'codAvaliador'        => $w->codAvaliador,
                                                    'codAvaliador'        => $w->Avaliador->nomeAvaliador,
                                                    'media'               => $w->media,
                                                    'conclusao'           => $w->conclusao,
                                                    'parecer'             => $w->parecer,
                                                    'dataAvaliacao'       => $w->dataAvaliacao); 
                    }
                }
                if ($bdi)
                {
                    
                    foreach ($bdi as $bd)
                    {
                            $replace_bdi[] = array('codBDI'            => $bd->codBDI,
                                                    'codAvaliador'     => $bd->codAvaliador,
                                                    'codAvaliador'     => $bd->Avaliador->nomeAvaliador,
                                                    'conclusao'        => $bd->conclusao,
                                                    'parecer'          => $bd->parecer,
                                                    'dataBDI'          => $bd->dataBDI); 
                    }
                }
                if ($minnesota)
                {
                    foreach ($minnesota as $min)
                    {
                            $replace_min[] =   array('codMin'          => $min->codMin,
                                                    'codAvaliador'     => $min->codAvaliador,
                                                    'codAvaliador'     => $min->Avaliador->nomeAvaliador,
                                                    'conclusao'        => $min->conclusao,
                                                    'parecer'          => $min->parecer,
                                                    'dataMin'          => $min->dataMin); 
                        
                    }
                }
                    $html->enableSection('exames',  $replaces, TRUE);
                    $html->enableSection('equilibrio',   $replace_equlibrio, TRUE);
                    $html->enableSection('ombro',   $replace_ombro, TRUE);
                    $html->enableSection('well',   $replace_well, TRUE);
                    $html->enableSection('bdi',   $replace_bdi, TRUE);
                    $html->enableSection('minnesota',   $replace_min, TRUE);
                }
            else
            {
                throw new Exception('Paciente não encontrado');
            }
            
            TTransaction::close();
            parent::add($html);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>
