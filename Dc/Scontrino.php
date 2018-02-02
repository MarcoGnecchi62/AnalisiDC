<?php
    namespace Dc;
    
    require_once(__DIR__."/Vendita.php");
    
    class Scontrino {
        private $righe = array();
        
        private $negozio = '';
        private $data = '';
        private $cassa = '';
        private $numero = '';
        
        private $vendite = array();
        
        function __construct($righe) {
           $this->righe = $righe;
           $this->caricaVendite();
        }
        
        private function caricaVendite() {
            $righe = array();
            foreach ($this->righe as $riga) {
                if (preg_match('/^.{31}:S:(\d)(\d)(\d):(\d{4}):.{3}(.{13})((?:\+|\-)\d{4})(\d|\.)(\d{3})(.)(\d{9})$/', $riga, $matches)) {
                    array_push($righe, $riga);
                    
                    // verifica se decimale
                    $barcode = trim($matches[5]);
                    $quantita = 1;
                    $importo = 1;
                    
                    array_push($this->vendite, new Vendita($barcode, $quantita, $importo));
                } 
            }
        }
        
        function __destruct() {}
    }
?>