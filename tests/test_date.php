<?php

require(__DIR__. "/../vendor/autoload.php");

use hduarte77\ValiDate\ValiDate;

//valores datetime,offset,tz que se desean validar
$data = Array(
	Array("date" => "2023-11-05 01:00:00", "utc_offset" => -7, "tz" => "America/Los_Angeles"),
	Array("date" => "2023-11-05 01:00:00", "utc_offset" => -8, "tz" => "America/Los_Angeles"),
);

foreach($data as $d){
	$result = ValiDate::Check($d["date"],$d["utc_offset"],$d["tz"]) ? "VALID" : "NOT VALID";
	echo "DateTime: " . $d["date"] .
		 " with offset: " . $d["utc_offset"] .
		 " is " . $result .
		 " for TimeZone: " . $d["tz"] . "\n";
};
