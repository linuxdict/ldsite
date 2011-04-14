<?php

$filename = "test.csv";
if (file_exists($filename)) {
	$time_gap= time() - filemtime($filename);
}
if ($time_gap > 1800 ) {
	echo $file_last_mod . "<br />";
	echo $current_time . "<br />";
	echo "out of date";
}
else {
	echo "it's ok";
}
