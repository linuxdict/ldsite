<?
system('wget "https://spreadsheets0.google.com/ccc?key=tJuGCb46oszXm7UVbBHTOQw&hl=en&authkey=CIylnKMB&output=csv" -O test.csv');
system('cat test.csv |egrep "L,L|-"|egrep -v "GMT|andrew.chan|^DBA" > my_cool.csv');

require_once 'DataSource.php';

$csv = new File_CSV_DataSource;
$csv->load('my_cool.csv');
//var_export($csv->connect());
echo "<table style='border-collapse:collapse;border:1px solid;cellspace=1;cellpadding=0'>";
foreach ($csv->connect() as $key=>$value) {
	if ($key==0) {
		echo "<tr>";
	foreach (array_keys($value) as $k) {
		echo "<td style='width:90px;background:white;border: 1px solid #AAAAAA;'>";
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
		echo "<td style='width:90px;background:$color;border: 1px solid #AAAAAA;'>";
		echo $k;
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";

