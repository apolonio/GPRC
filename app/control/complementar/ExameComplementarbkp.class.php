<?php

class ExameComplementarbkp extends TStandardForm
{
    protected $form;     
    private $loaded;
    private $frame;

    public function __construct()
    {
        parent::__construct();
        
          
        $this->form = new TQuickForm('form_Complementar');
        $this->form->class = 'tform';
        
        //Titulo formulario
        $this->form->setFormTitle('Exame Complementar');
            
        // Bancos de dados e Active Record
        parent::setDatabase('permission');
        parent::setActiveRecord('AvaliacaoComplementar');
        
        
        //Campos do Formulario          //origem      //banco       //model    //gravaBanco  // aparece na caixa
        $codPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'nome', 'nome');
        $codAvaliador  = new TDBCombo('codAvaliador','permission','Avaliador','nomeAvaliador','nomeAvaliador');
        $codTipoExame  = new TDBCombo('codTipoExame','permission','TipoExame','descricaoTipoExame','descricaoTipoExame');
        $dataExameComp= new TDate('dataExameComp');
        $medida = new TEntry('medida');
        $medida->setMaxLength(4);
        $medida->setTip('Digite em cm');
        $file_path = new TFile('file_path');
        $conclusao = new TCombo('conclusao');
        $parecer = new TText('parecer');
        $parecer->setTip('Digite no máximo 250 caracteres');
    
        // Formatação
        // $dataAvaliacao->setMask('dd/mm/yyyy');
        // Caixa de Seleção
        $cb = array();
        $cb['1'] = 'Muito Fraco';
        $cb['2'] = 'Fraco';
        $cb['3'] = 'Regular';
        $cb['4'] = 'Bom';
        $cb['5'] = 'Muito Bom';
        $conclusao->addItems($cb);
        
        // Campos que aparecem no Formulário
        $this->form->addQuickField('Paciente',$codPaciente,350);
        $this->form->addQuickField('Avaliador',$codAvaliador,350);   
        $this->form->addQuickField('TipoExame',$codTipoExame,350);   
        $this->form->addQuickField('Data Exame',$dataExameComp,200);     
        $this->form->addQuickField('Arquivo',$file_path,400);     
        $this->form->addQuickField('Medida',$medida,150);     
        $this->form->addQuickField('Conclusão',$conclusao,200);     
        $this->form->addQuickField('Parecer',$parecer,200);     
         
        
        // Ações dos botões do formulário
        $this->form->addQuickAction('Salvar', new TAction(array($this,'onSave')),'ico_save.png');
        //$this->form->addQuickAction(_t('Clear'), new TAction(array($this, 'onEdit')), 'fa:eraser red');
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
        new TMessage('info', 'Upload Conseguido: '.$param['file_path']);
        
        // refresh photo_frame
      //  TScript::create("$('#photo_frame').html('')");
      //  TScript::create("$('#photo_frame').append(\"<img style='width:100%' src='tmp/{$param['photo_path']}'>\");");
    }
    
    /**
     * Edição Arquivo
     */
    public function onEdit($param)
    {
        $object = parent::onEdit($param);
        if ($object)
        {
            $image = new TImage($object->file_path);
            $image->style = 'width: 100%';
            $this->frame->add( $image );
        }
    }
     /**
     * Salvando o registro lembrar de verificar a pasta de destino da imagem ou arquivo
     */
    public function onSave()
    {
        // first, use the default onSave()
        $object = parent::onSave();
         // if the object has been saved
        if ($object instanceof AvaliacaoComplementar)
        {
            $source_file   = 'tmp/'.$object->file_path;
            $target_file   = 'images/' . $object->file_path;
            //$finfo         = new finfo(FILEINFO_MIME_TYPE);
            $finfo         = new finfo();
           // $finfos = $finfo->buffer(file_get_contents($file_path));
            
            // if the user uploaded a source file
            if (file_exists($source_file) AND ($finfo->file($source_file) == 'image/png' OR $finfo->file($source_file) == 'image/jpeg'))
            {
                // move to the target directory
                rename($source_file, $target_file);
                try
                {
                    TTransaction::open($this->database);
                    // Atualizando o caminho de file_path
                    $object->file_path = 'images/'.$object->file_path;
 
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
           
            
        }
         new TMessage('info', 'Objeto não instanciado!');
       
    
    }
    
      
    
    function onReload($param = NULL)
    {
        try
        {
            TTransaction::open('permission');
            
            $repository = new TRepository('AvaliacaoComplementar');
            //Caso eu queira exibir os registros de exame em um relatorio
            $criteria = new TCriteria;
            $order    = isset($param['order']) ? $param['order'] : 'codExameComp';
            $criteria->setProperty('order', $order);
        //    $criteria->add(new TFilter('situacao','!=','Finalizado');
            // load the objects according to criteria
            $categories = $repository->load($criteria);
            //$this->datagrid->onClear();
            if ($categories)
            {
                // iterate the collection of active records
                foreach ($categories as $category)
                {
                    // add the object inside the datagrid
                    //$this->datagrid->addItem($category);
                }
            }
            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error ao salvar Exame</b> ' . $e->getMessage());
            // undo all pending operations
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

