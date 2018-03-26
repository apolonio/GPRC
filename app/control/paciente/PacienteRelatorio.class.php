<?php
/**
 * @class: csvpaicente
 * @version    1.0
 * @package    icriacoes
 * @subpackage gprc
 * @author     Apolonio Santiago da Silva Junior
 * @copyright  Copyright (c) 2006-2014 iCriaçoes Ltd. (http://www.icriacoes.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PacienteRelatorio extends TPage
{
    private $form; // form

    function __construct()
    {
        parent::__construct();
        
        ini_set( 'display_errors', 0 );
        
        $this->form = new TForm('form_Paciente_Report');
        $this->form->class = 'tform'; // CSS class
             
        $table = new TTable;
        $table-> width = '650px';

        $this->form->add($table);

        $nome         = new TEntry('nome');
        $sexo      = new TCombo('sexo');
        $dataNascimento      = new TDate('dataNascimento');
        $email      = new TEntry('email');
        $peso     = new TEntry('peso');
        $estatura      = new TEntry('estatura');
        $telefone      = new TEntry('telefone');
        
        
         //Caixa selecao Subunidade
        $sex = array();
        $sex['0'] = 'Masculino';
        $sex['1'] = 'Feminino';
        $sexo->addItems($sex);
        
        
        // Tela de Saída     
        $output_type  = new TRadioGroup('output_type');
        $options = array('html' => 'HTML', 'pdf' => 'PDF', 'rtf' => 'RTF');
        $output_type->addItems($options);
        $output_type->setValue('pdf');
        $output_type->setLayout('horizontal');
        
        // define the sizes
        $nome->setSize(200);
        
        // add a row for the field name
        $row  = $table->addRowSet(new TLabel('GPRC - Relatórios para Impressão'), '');
        $row->class = 'tformtitle'; // CSS class
        
        // add the fields into the table
        $table->addRowSet(new TLabel('Nome' . ': '), $nome);
        $table->addRowSet(new TLabel('Sexo' . ': '), $sexo);
        $table->addRowSet(new TLabel('Email' . ': '), $email);
        $table->addRowSet(new TLabel('Tipo Saída' . ': '), $output_type);
        
        // create an action button (save)
        $save_button=new TButton('generate');
        $save_button->setAction(new TAction(array($this, 'onGenerate')), 'Gerar');
        $save_button->setImage('ico_save.png');

        // add a row for the form action
        $row = $table->addRowSet($save_button, '');
        $row->class = 'tformaction';

        // define wich are the form fields
        //$this->form->setFields(array($name,$tipo_id,$tipo_name,$output_type,$save_button));
        $this->form->setFields(array($nome,$sexo,$dataNascimento,$email,$peso,$estatura,$telefone,$output_type,$save_button));
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }

    /**
     * method onGenerate()
     * Executed whenever the user clicks at the generate button
     */
    function onGenerate()
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('permission');
            
            // get the form data into an active record Customer
            $object = $this->form->getData();
            
           // var_dump($object);
            $repository = new TRepository('Paciente');
	

            $criteria   = new TCriteria;
            if ($object->nome)
            {
                $criteria->add(new TFilter('nome', 'like', "%{$object->nome}%"));
            }

            if ($object->sexo)
            {
                $criteria->add(new TFilter('sexo', '=', "{$object->sexo}"));
            }
            
            if ($object->email)
            {
                $criteria->add(new TFilter('email', 'like', "%{$object->email}%"));
            }
     
        
            $order = isset($param['order']) ? $param['order'] : 'nome';          
            $criteria ->setProperty('order', $order);   

            $customers = $repository->load($criteria);
            $format  = $object->output_type;
            
            if ($customers)
            {                 //01-02-03--04-05-06-07-08-09
                $widths = array(30,60,150,40,90,120,60,60,60);
                
                switch ($format)
                {
                    case 'html':
                        $tr = new TTableWriterHTML($widths);
                        break;
                    case 'pdf':
                        //alterei o parametro da classe para L paisagem
                        $tr = new TTableWriterPDF($widths,'L');
                        break;
                    case 'rtf':
                        if (!class_exists('PHPRtfLite_Autoloader'))
                        {
                            PHPRtfLite::registerAutoloader();
                        }
                        $tr = new TTableWriterRTF($widths);
                        break;
                }
                
                if (!empty($tr))
                {
                    // create the document styles
                    $tr->addStyle('title', 'Arial',  '10', '', '#d3d3d3', '#407B49');
                    $tr->addStyle('datap', 'Arial',  '8',  '', '#000000', '#869FBB');
                    $tr->addStyle('datai', 'Arial',  '8',  '', '#000000', '#ffffff');
                    $tr->addStyle('header', 'Times', '12',  '', '#000000', '#B5FFB4');
                    $tr->addStyle('footer', 'Times', '10',  '', '#2B2B2B', '#B5FFB4');
                    
                    // add a header row
                    $tr->addRow();
                    $tr->addCell('Relatório de Pacientes - GPRC', 'center', 'header', 40);
                    
                    // add titles row
                    $tr->addRow();
                    $tr->addCell('Or', 'center', 'title');
                    $tr->addCell('Id', 'center', 'title');
                    $tr->addCell('Nome', 'center', 'title');
                    $tr->addCell('Sexo', 'center', 'title');
                    $tr->addCell('Idade', 'center', 'title');
                    $tr->addCell('Email', 'center', 'title');
                    $tr->addCell('Peso', 'center', 'title');
                     $tr->addCell('Estatura', 'center', 'title');
                    $tr->addCell('Telefone', 'center', 'title');

                    // controls the background filling
                    $colour= FALSE;
                    $i=0;
                    // data rows
                    foreach ($customers as $customer)
                    {
                        $i++;
                      //  $style = $colour ? 'datap' : 'datai';
                        $style = 'datai';
                        $tr->addRow();
                        $tr->addCell($i, 'center', $style);
                        $tr->addCell($customer->codigoPaciente, 'center', $style);
                        $tr->addCell($customer->nome, 'center', $style);
                        $tr->addCell($customer->sexo, 'center', $style);
                        $tr->addCell($customer->dataNascimento, 'center', $style);
                        $tr->addCell($customer->email, 'center', $style);
                        $tr->addCell($customer->peso, 'center', $style);
                        $tr->addCell($customer->estatura, 'center', $style);
                         $tr->addCell($customer->telefone, 'center', $style);

                        $colour = !$colour;
                    }
                    
                    $tr->addRow();
                    $tr->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 15);
                    if (!file_exists("app/output/tabular.{$format}") OR is_writable("app/output/tabular.{$format}"))
                    {
                        $tr->save("app/output/tabular.{$format}");
                    }
                    else
                    {
                        throw new Exception(_t('Permission denied') . ': ' . "app/output/tabular.{$format}");
                    }
                    
                    parent::openFile("app/output/tabular.{$format}");
                    
                    new TMessage('info', 'Relatório gerado. Habilite o popup no seu navegador.');
                }
            }
            else
            {
                new TMessage('error', 'Registro não encontrado');
            }
    
            $this->form->setData($object);
            
            TTransaction::close();
        }
        catch (Exception $e) 
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            
            TTransaction::rollback();
        }
    }
}
?>

