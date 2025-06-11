<?php
require_once __DIR__ . '/vendor/autoload.php'; // path ke autoload.php

use Mpdf\Mpdf;

try {
    $mpdf = new Mpdf();
    $mpdf->WriteHTML('<h1>Hello, mPDF is working!</h1>');
    $mpdf->Output();
} catch (\Mpdf\MpdfException $e) {
    echo "mPDF error: " . $e->getMessage();
}
