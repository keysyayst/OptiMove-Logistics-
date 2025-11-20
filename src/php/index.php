<?php

spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';
   
    if (file_exists($file)) {
        require $file;
    }
});

use OptiMove\Logistics\Services\ExpressShipment;
use OptiMove\Logistics\Services\InternationalShipment;

echo "=== LAYANAN PENGIRIMAN EKSPRES ===\n\n";

$express = new ExpressShipment("OPT-EXP-001", "Syanti", 100000, "Same Day");

echo $express->getExpressInfo() . "\n";
echo $express->getEstimatedDelivery() . "\n";
echo "Total Biaya: Rp " . number_format($express->getTotalCostWithExpress(), 0, ',', '.') . "\n\n";

echo $express->updateStatus("On Delivery") . "\n\n";

echo "=== LAYANAN PENGIRIMAN INTERNASIONAL ===\n\n";

$international = new InternationalShipment(
    "OPT-INT-001", 
    "Falsya", 
    500000, 
    "Singapore", 
    150000
);

echo $international->getInternationalInfo() . "\n";
echo $international->validateDocuments() . "\n";
echo "Total Biaya + Bea Cukai: Rp " . number_format($international->getTotalWithCustoms(), 0, ',', '.') . "\n\n";

echo "Info Singkat: " . $express . "\n";
?>
