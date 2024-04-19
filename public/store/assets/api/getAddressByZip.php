<?php
$zip = @$_GET['zip'];
if (strlen($zip) < 3) {
    return;
}
$zip3 = substr($zip, 0, 3);

$zipObj = null;
$json_path = $_SERVER['DOCUMENT_ROOT'] . "/assets/common/zip/zipData/{$zip3}.json";
//$json_path = __DIR__ . "/zipData/{$zip3}.json";
if (file_exists($json_path)) {
    $zipObj = json_decode(file_get_contents($json_path));
}

if ($zipObj === null) {
    return;
}

$zipArray = (array) $zipObj;
$resultZipArray = [];
foreach ($zipArray as $x) {
    if (strpos(@$x->zip_code, $zip) === 0) {
        $resultZipArray[] = $x;
    }
}

echo json_encode($resultZipArray);

