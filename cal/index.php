<?

$filename = "test.csv";
if (file_exists($filename)) {
	$time_gap= time() - filemtime($filename);
}
if ($time_gap > 3600 ) {
	system('wget "https://spreadsheets0.google.com/ccc?key=tJuGCb46oszXm7UVbBHTOQw&hl=en&authkey=CIylnKMB&output=csv" -O test.csv');
	system('cat test.csv |egrep "L,L|-"|egrep -v "GMT|andrew.chan|^DBA" > my_cool.csv');
	system('`pwd`/tide_cal');
}

require_once 'DataSource.php';

$csv = new File_CSV_DataSource;
$csv->load('my_new.csv');
//var_export($csv->connect());
echo "<table style='border-collapse:collapse;border:1px solid;cellspace=1;cellpadding=0'>";
foreach ($csv->connect() as $key=>$value) {
	if ($key==0) {
		echo "<tr>";
	foreach (array_keys($value) as $k) {
		echo "<td nowrap style='nowrap=true;background:white;border: 1px solid #AAAAAA;'>";
		echo $k;
		echo "</td>";
	}
	echo "</tr>";
	}
	if ($key%2 ==0 ) {
		$color="#F2F2F2";
	}
	else {
		$color='';
	}
	echo "<tr>";
	foreach ($value as $k) {
		//echo "<td style='width:90px'>";
		echo "<td nowrap style='background:$color;border: 1px solid #AAAAAA;'>";
		echo $k;
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";

echo "P: www.linuxdict.com 5128(Not Available)<br />";
echo "<a href=\"fullversion.php\">Full Version</a>";
