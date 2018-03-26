<?php
/**
 * @class ExameComplementar  Esse exame permite enviar um arquivos de upload
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc 
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2013 Icriacoes  Ltd. (http://www.icriacoes.com.br)
 */
class ExameComplementar extends TStandardForm
{
    protected $form;     
    private $loaded;
    private $frame;

    public function __construct()
    {
        parent::__construct();
        
          
        $this->form = new TQuickForm('form_Complementar');
        $this->form->class = 'tform';
        $this->form->setFormTitle('Exame Complementar');
            
        // Bancos de dados e Active Record
        parent::setDatabase('permission');
        parent::setActiveRecord('ExameItem');
        
        //Campos do Formulario          //origem      //banco       //model    //gravaBanco  // aparece na caixa
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $codTipoExame  = new TDBCombo('codTipoExame','permission','TipoExame','descricaoTipoExame','descricaoTipoExame');      
        $file_path = new TFile('file_path');
        $parecer = new TText('parecer');
        $parecer->setTip('Digite no máximo 250 caracteres');
        $dataExameItem= new TDate('dataExameComp');
        $dataExameItem->setMask('dd/mm/yyyy');
        $dataExameItem->setDatabaseMask('yyyy-mm-dd');
     
        
        // Campos que aparecem no Formulário
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        $this->form->addQuickField('Tipo Exame',$codTipoExame,350);    
        $this->form->addQuickField('Arquivo',$file_path,400);     
        $this->form->addQuickField('Observações',$parecer); 
        $this->form->addQuickField('Data Exame',$dataExameItem,200);  
        $parecer->setSize(400,70);
         
        
        // Ações dos botões do formulário
        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
        $this->form->addQuickAction('Limpar', new TAction(array($this, 'onEdit')), 'fa:eraser red');
        //$this->form->addQuickAction(_t('List'), new TAction(array('ExameList', 'onReload')), 'fa:table blue');
                
        $vbox = new TVBox;
        $vbox->add(new Adianti\Widget\Util\TXMLBreadCrumb('menu.xml', 'ExameComplementar'));
        $vbox->add($this->form);
     
        parent::add($vbox);
        
    }
     /**
     * On complete upload
     */
    public static function onComplete($param)
    {
        new TMessage('info', 'Upload Conseguido: '.$object->file_path);
    }
    
 
     /**
     * Salvando o registro lembrar de verificar a pasta de destino da imagem ou arquivo
     */
    public function onSave()
    {
        
        $object = parent::onSave();
      
        if ($object instanceof ExameItem)
        {
            $source_file   = 'tmp/'.$object->file_path;
            $file_name = 'Exame'.$object->codExameItem.$object->file_path;
            $target_file   = 'app/files/complementares/' . $file_name;
            //$finfo         = new finfo(FILEINFO_MIME_TYPE);
            $finfo         = new finfo();
           // $finfos = $finfo->buffer(file_get_contents($file_path));
            
               if (file_exists($source_file))
                    {
                   
                        rename($source_file, $target_file);
                    }
                    
            
            // if the user uploaded a source file
            if (file_exists($source_file) AND ($finfo->file($source_file) == 'app/files/complementares/png' OR $finfo->file($source_file) == 'app/files/complementares/jpeg'))
            {
                rename($source_file, $target_file);
                try
                {
                    TTransaction::open($this->database);
              
                    $object->file_path = 'app/files/complementares/'.$object->file_path;
 
                    $object->store();
                    
                    new TMessage('info', 'Exame Cadastrado com Sucesso!');
                    
                TTransaction::close();
        
                }
                catch (Exception $e)
                {
                    new TMessage('error', $e->getMessage());

                    TTransaction::rollback();
                }
            }
           
            
        }else{
            
         new TMessage('alert', 'Erro ao Mover o arquivo!');
        }
    
    }

   
}//fim da classe

?>

