<?php

class Configurator{


private $report_dir;
private $image_dir;
private $report_parameter;
private $headline_for_latest_events;
private $event_page;


 function __construct() {
        $this->report_dir = 'reports'; 
		$this->image_dir = 'img';
		$this->report_parameter = 'Report';
		$this->headline_for_latest_events = 'Aktuelles';
		$this->event_page = 'event.php';
	}    

 public function getReportsDirectory(){
	return $this->report_dir;
}

 public function getImageDirectory(){
	return $this->image_dir;
}

 public function getReportParameter(){
	return $this->report_parameter;
}

 public function getHeadlineLatestEvents(){
	return $this->headline_for_latest_events;
}

 public function getEventPage(){
 return $this->event_page;
}

}