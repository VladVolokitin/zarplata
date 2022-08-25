<?php 
/* Всё, что связано со вводом и выводом данных */

const TARIFF = '_tariff';

$body_style = '<style type="text/css">
    body {
        text-align: center;
    }                
</style>';
$title = 'Расчёт зарплаты';
$meta = '<meta charset="utf-8"><meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/><meta http-equiv="Pragma" content="no-cache"/><meta http-equiv="Expires" content="0"/>';
$style = '';


/*[
    'Грязными' => 26328,
    'Чистыми' => 22905,
    'Примерная' => 33316,
    'С премией' => 46643,
    'Аванс' => 13000,
    'На руки без аванса' => 33643
];
*/
$tariffs = [
    'Шнек 6м' => 1280,
    'Шнек 7м' => 1696,
    'Шнек Полесье' => 1750,
    'Шнек Подборщик' => 1200,
    'Горловина' => 577,
    'Шнек Нива' => 1150,
];

$bonus = 40;

$days_worked = 11;

$days_left = 5;

$tax = 13;

$page_top = '<h1>'.$title.'</h1></br></br>';

$page_bottom = '</br><a href="tariffs.php">Расценки</a>';

$prepayment_percent = FALSE;

$prepayment = 13000;

$items_made = [
    'Шнек 6м' => 20,
    'Шнек 7м' => 11,
    'Шнек Полесье' => 4
];

$koeff = 42;
$user = 'vanya';

// Открываем файл для записи в поддиректории users/ если нет, то создаём
function read_tariffs(string $user) {
    $output = ['Ошибка' => 'Ошибка'];
    $filename = $_SERVER['DOCUMENT_ROOT']."users/".$user.TARIFF;
    $file = fopen($filename, "a+");
    if (!$file) {
        $output = fgetcsv($file);
        fclose($file);
    }
    return $output;
}
// Записываем расценки в csv файл
function write_tariffs(string $user, array $tariffs) {
    $filename = $_SERVER['DOCUMENT_ROOT']."users/".$user.TARIFF;
    $file = fopen($filename, "a+");
    if (!$file) {
        $output = fputcsv($file, $tariffs);
        fclose($file);
    }
    return $output;    
}