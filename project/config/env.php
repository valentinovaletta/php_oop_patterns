<?php

if (file_exists($_SERVER['DOCUMENT_ROOT'].'/.env')) {
	$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/.env', "r");
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			putenv($line);
		}
		fclose($handle);
	}
}