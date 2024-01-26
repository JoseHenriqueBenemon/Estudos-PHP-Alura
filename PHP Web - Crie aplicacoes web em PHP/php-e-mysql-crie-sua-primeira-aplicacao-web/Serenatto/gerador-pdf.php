<?php 

require_once "./vendor/autoload.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();


ob_start();
require_once './conteudo-pdf.php';
$html = ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream();