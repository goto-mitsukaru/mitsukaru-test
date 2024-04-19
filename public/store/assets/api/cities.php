<?php
header('Content-type: application/json');
echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/common/zip/cities_by_zipData.json');

