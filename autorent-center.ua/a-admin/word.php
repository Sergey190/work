<?php

require_once 'vendor/autoload.php';

$document = new \PhpOffice\PhpWord\TemplateProcessor('word.docx');

$uploadDir =  __DIR__;
$outputFile = 'review_full.docx';

$uploadFile = $uploadDir . '\\' . basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);

$id = $_POST['id'];
$car = $_POST['car'];
$fio = $_POST['fio'];
$number = $_POST['number'];
$adres = $_POST['adres'];
$data = $_POST['data'];
$mes = $_POST['mes'];
$koll = $_POST['koll'];
$shraf = $_POST['shraf'];
$profit = $_POST['profit'];

$document->setValue('id', $id);
$document->setValue('car', $car);
$document->setValue('fio', $fio);
$document->setValue('number', $number);
$document->setValue('adres', $adres);
$document->setValue('data', $data);
$document->setValue('mes', $mes);
$document->setValue('koll', $koll);
$document->setValue('shraf', $shraf);
$document->setValue('profit', $profit);


$document->saveAs($outputFile);


// Имя скачиваемого файла
$downloadFile = $outputFile;

// Контент-тип означающий скачивание
header("Content-Type: application/octet-stream");

// Размер в байтах
header("Accept-Ranges: bytes");

// Размер файла
header("Content-Length: ".filesize($downloadFile));

// Расположение скачиваемого файла
header("Content-Disposition: attachment; filename=".$downloadFile);  

// Прочитать файл
readfile($downloadFile);


unlink($uploadFile);
unlink($outputFile);
?>



