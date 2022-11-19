<!-- <?php
require 'pdfcrowd.php';

// create an API client instance
$client = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

// convert a web page and store the generated PDF into a variable
$pdf = $client->convertUrl("http://www.example.com");

// set HTTP response headers
header("Content-Type: application/pdf");
header("Cache-Control: max-age=0");
header("Accept-Ranges: none");
header("Content-Disposition: attachment; filename=\"example_com.pdf\"");

// send the generated PDF 
echo $pdf;
?> -->