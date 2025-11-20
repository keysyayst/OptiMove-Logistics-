<?php
namespace OptiMove\Logistics\Services;

use OptiMove\Logistics\Shipment;

class ExpressShipment extends Shipment {
    private $expressType; 
    
    public function __construct($trackingNumber, $recipient, $cost, $expressType) {
        parent::__construct($trackingNumber, $recipient, $cost);
        $this->expressType = $expressType;
    }
    
    public function getExpressInfo() {
        return "Layanan Ekspres: {$this->expressType} | " . $this->getShipmentInfo();
    }
    
    public function getEstimatedDelivery() {
        if ($this->expressType === "Same Day") {
            return "Estimasi: Hari ini sebelum jam 21:00";
        } else {
            return "Estimasi: Besok sebelum jam 18:00";
        }
    }
    
    public function getTotalCostWithExpress() {
        $baseCost = $this->calculateTotalCost();
        $expressFee = ($this->expressType === "Same Day") ? 50000 : 25000;
        return $baseCost + $expressFee;
    }
}
?>
