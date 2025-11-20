<?php
namespace OptiMove\Logistics;

class Shipment {
    protected $trackingNumber;   
    protected $recipient;       
    private $cost;             
    public $status;           
  
    public function __construct($trackingNumber, $recipient, $cost) {
        $this->trackingNumber = $trackingNumber;
        $this->recipient = $recipient;
        $this->cost = $cost;
        $this->status = "Pending";
    }
    
    public function getShipmentInfo() {
        return "Tracking: {$this->trackingNumber} | Penerima: {$this->recipient} | Status: {$this->status}";
    }
    
    public function updateStatus($newStatus) {
        $this->status = $newStatus;
        return "Status diupdate menjadi: {$newStatus}";
    }
    
    protected function calculateTotalCost() {
        $ppn = $this->cost * 0.11; 
        return $this->cost + $ppn;
    }
    
    public function __toString() {
        return $this->getShipmentInfo();
    }
    
    public function __destruct() {
    }
}
?>
