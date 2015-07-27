<?php

$report_dir = '../reports';
$image_dir = '../img';
$report_parameter = 'Report';
$headline_for_latest_events = 'Aktuelles';
$event_page = '../event.php';


public function getReportsDirectory(){
	return $report_dir;
}

public function getImageDirectory(){
	return $image_dir;
}

public function getReportParameter(){
	return $report_parameter;
}

public function getHeadlineLatestEvents(){
	return $headline_for_latest_events;
}

public function getEventPage(){
 return $event_page;
}