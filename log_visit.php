<?php
// log_visit.php
$logfile = __DIR__ . '/visitors.csv';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$ua = str_replace(["\n","\r",","], ' ', $_SERVER['HTTP_USER_AGENT'] ?? '');
$page = $_SERVER['REQUEST_URI'] ?? '';
$time = gmdate('Y-m-d H:i:s');
$line = implode(',', [$time, $ip, $page, $ua]) . PHP_EOL;
file_put_contents($logfile, $line, FILE_APPEND | LOCK_EX);
?>
