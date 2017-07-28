<?php

class Configurator{


private $report_dir;
private $image_dir;
private $report_parameter;
private $headline_for_latest_events;
private $event_page;
private $report_not_found_temp;
private $template_dir;


 function __construct() {
        $this->report_dir = 'reports'; 
		$this->image_dir = 'img';
		$this->report_parameter = 'Report';
		$this->headline_for_latest_events = '';
		$this->event_page = 'event.php';
		$this->template_dir  = 'phpReports/template';
		$this->report_not_found_temp = "/report_not_found.html";
	}    

public function getReportNotFoundTemplate(){
	return $this->template_dir.$this->report_not_found_temp;
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