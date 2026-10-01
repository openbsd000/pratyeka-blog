<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$files = [];
$dh = opendir(__DIR__);
while (($name = readdir($dh)) !== false) {
    if (!preg_match('/\.html?$/i', $name)) continue;
    if (strcasecmp($name, 'index.html') === 0) continue;
    if (!is_file(__DIR__ . '/' . $name)) continue;
    $files[] = ['name' => $name, 'mtime' => filemtime(__DIR__ . '/' . $name)];
}
closedir($dh);

echo json_encode($files);
