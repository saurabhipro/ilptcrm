<?php
require_once "Spreadsheet/Excel/Writer.php";
$xls =& new Spreadsheet_Excel_Writer();
$xls->send("test.xls");
$sheet =& $xls->addWorksheet('Binary Count');
for ($i = 0; $i < 11; $i++) {
    $sheet->write($i, 0, decbin($i));
}

$titleText = 'phpPetstore: Receipt from ' . date('dS M Y');
$titleFormat =& $xls->addFormat();
$titleFormat->setFontFamily('Helvetica');
$titleFormat->setBold();
$titleFormat->setSize('13');
$titleFormat->setColor('navy');
$titleFormat->setBottom(2);
$titleFormat->setBottomColor('navy');
$titleFormat->setAlign('merge');
$cart->write(0, 0, $titleText, $titleFormat);
$cart->write(0, 1, '', $titleFormat);
$cart->write(0, 2, '', $titleFormat);
$cart->write(0, 3, '', $titleFormat);
$cart->setRow(0, 30);
$cart->setColumn(0, 3, 15);
$items = array(
    array('description' => 'Parrot', 'price' => 34.0, 'quantity' => 1),
    array('description' => 'Snake', 'price' => 16.5, 'quantity' => 2),
    array('description' => 'Mouse', 'price' => 1.25, 'quantity' => 10),
);

$xls->close();

?>