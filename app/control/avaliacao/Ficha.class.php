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
class Ficha extends TPage
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

        $codigoPaciente    = new TDBCombo('codPaciente', 'permission', 'Paciente', 'codigoPaciente', 'nome');
        $nome  = new TEntry('nome');
        $sexo      = new TCombo('sexo');
        $dataNascimento      = new TDate('dataNascimento');
        $email      = new TEntry('email');
        $peso     = new TEntry('peso');
        $estatura      = new TEntry('estatura');
        $telefone      = new TEntry('telefone');
        
        // Tela de Saída     
        $output_type  = new TRadioGroup('output_type');
        $options = array('html' => 'HTML', 'pdf' => 'PDF');
        $output_type->addItems($options);
        $output_type->setValue('pdf');
        $output_type->setLayout('horizontal');
        
        // define the sizes
        $nome->setSize(200);
        
        // add a row for the field name
        $row  = $table->addRowSet(new TLabel('FICHA INDIVIDUAL'), '');
        $row->class = 'tformtitle'; // CSS class
        
        // add the fields into the table
        $table->addRowSet(new TLabel('Nome' . ': '), $codigoPaciente);
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
        $this->form->setFields(array($codigoPaciente,$nome,$sexo,$dataNascimento,$email,$peso,$estatura,$telefone,$output_type,$save_button));
        
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
            TTransaction::open('permission');
            $object = $this->form->getData();
            
            $repository = new TRepository('Paciente');
          //  $complementar = new TRepository('AvaliacaoComplementar');
            $equilibrio = new TRepository('AvaliacaoEquilibrio');
//            $ombro = new TRepository('AvaliacaoOmbro');
//            $well = new TRepository('AvaliacaoWells');
//            $minnesota = new TRepository('AvaliacaoMinnesota');
//            $avaliacaoClinica = new TRepository('AvaliacaoClinica');
//            $hit = new TRepository('AvaliacaoHiit');
//            $bdi = new TRepository('AvaliacaoBDI');
            
            $criteria   = new TCriteria;
            if ($object->codPaciente)
            {
                $criteria->add(new TFilter('codigoPaciente', '=', "{$object->codPaciente}"));
            }
            $critEqui = new TCriteria;
            $critEqui->add(new TFilter('codPaciente','=',"{$object->codPaciente}"));
        
            $order = isset($param['order']) ? $param['order'] : 'nome';          
            $criteria ->setProperty('order', $order);   

            $customers = $repository->load($criteria);
            $customers2 = $equilibrio->load($critEqui);
                 
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
                    }
                    
            }
        
             /*
         * Implementação do Pdf para Tabela Exame Equilibrio
         */        
                    // create the document styles
                    $tr->addStyle('title', 'Arial',  '10', '', '#000000', '#00FA9A');
                    $tr->addStyle('datap', 'Arial',  '8',  '', '#000000', '#00FA9A');
                    $tr->addStyle('datai', 'Arial',  '8',  '', '#000000', '#ffffff');
                    $tr->addStyle('header', 'Times', '12',  '', '#000000', '#00BFFF');
                    $tr->addStyle('footer', 'Times', '10',  '', '#2B2B2B', '#98FB98');

                    // add a header row
                    $tr->addRow();
                    $tr->addCell('Exame Equilibrio', 'center', 'header', 40);

                    // add titles row
                    $tr->addRow();
                    $tr->addCell('Or', 'center', 'title');
                    $tr->addCell('Id', 'center', 'title');
                    $tr->addCell('Avaliador', 'center', 'title');
                    $tr->addCell('Media', 'center', 'title');
                    $tr->addCell('Conclusão', 'center', 'title');
                    $tr->addCell('Data', 'center', 'title');
                    $tr->addCell('Parecer', 'center', 'title',3);

                    $colour= FALSE;
                    $i=0;
                    foreach ($customers2 as $paciente)
                    {
                        $i++;
                        $style = 'datai';
                        $tr->addRow();
                        $tr->addCell($i, 'center', $style);
                        $tr->addCell($paciente->codAvaliacaoEquilibrio, 'center', $style);
                        $tr->addCell($paciente->codAvaliador, 'center', $style);
                        $tr->addCell($paciente->media, 'center', $style);
                        $tr->addCell($paciente->conclusao, 'center', $style);
                        $tr->addCell($paciente->dataAvaliacao, 'center', $style);
                        $tr->addCell($paciente->parecer, 'center', $style,3);

                        $colour = !$colour;
                    }
            

            $tr->addRow();
            $tr->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 15);
            if (!file_exists("app/output/ficha.{$format}") OR is_writable("app/output/ficha.{$format}"))
            {
                $tr->save("app/output/ficha.{$format}");
            }
            else
            {
                throw new Exception(_t('Permission denied') . ': ' . "app/output/ficha.{$format}");
            }

            parent::openFile("app/output/ficha.{$format}");

         
        
            
            TTransaction::close();
            
    }
        catch (Exception $e) 
        {
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            
            TTransaction::rollback();
        }
    
   } //fim Generate
    
}//fim da classe
?>

