<?php
namespace OptiMove\Logistics\Services;

use OptiMove\Logistics\Shipment;

class InternationalShipment extends Shipment {
    private $destinationCountry;
    private $customsDuty;
  
    public function __construct($trackingNumber, $recipient, $cost, $destinationCountry, $customsDuty) {
        parent::__construct($trackingNumber, $recipient, $cost);
        $this->destinationCountry = $destinationCountry;
        $this->customsDuty = $customsDuty;
    }
    
    public function getInternationalInfo() {
        return "Negara Tujuan: {$this->destinationCountry} | " . $this->getShipmentInfo();
    }
    
    public function getTotalWithCustoms() {
        $baseCost = $this->calculateTotalCost();
        return $baseCost + $this->customsDuty;
    }
    
    public function validateDocuments() {
        return "Dokumen untuk pengiriman ke {$this->destinationCountry} telah divalidasi";
    }
}
?>
