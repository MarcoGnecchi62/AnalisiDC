<?php
    namespace Dc;
    
    class Vendita {
        private $barcode = '';
        private $quantita = 0.0;
        private $importo = 0.0;
        
        function __construct($barcode, $quantita, $importo) {
            $this->barcode = $barcode;
            $this->quantita = $quantita;
            $this->importo = $importo;
        }
        
        function __destruct() {}
    }
?>