<?php

class MenuRelatorio extends TPage {
    
    function __construct()
        {
            parent::__construct();

        //    TPage::include_css('app/resources/styles.css');

            $html2 = new THtmlRenderer('app/resources/relatorio.html');
            $html2->enableSection('main', array());

            $panel2 = new TPanelGroup('Módulo de Relatório!');
            $panel2->add($html2);
        

            // add the template to the page
            parent::add( TVBox::pack($panel2) );
        }
}
?>
