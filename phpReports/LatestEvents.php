<?php
include "./phpReports/ReportBuilder.php";


/**
 *  Returns an orbit of the latest events in html.
 * 	@param: count
 */
function getReportOrbit($count){
	$config = new Configurator();
// If you want to change the view you have the change to output-html in the following lines
    $html = '
	<div class="row">
      <div class="large-12 columns">
      	<h3 class="main-head" >'.$config->getHeadlineLatestEvents().'</h3>
      </div>
    </div>';
	
	$html .= '<div class="row">
				
      <div class="large-12 columns">
				<div class="orbit-container">
				<ul class="" data-orbit data-options="timer_speed: 5000;slide_number: false;bullets: false;timer: true;">';
    
	for( $i = 0 ; $i < $count; $i++){
		$html .= getOrbitItem($i+1);
	}
	
	
	$html .= '</ul>
	</div>
	</div>
	</div>';

 
	
    return $html;
}


function getOrbitItem($chronoligicalEventNumber){
	$config = new Configurator();
	$generator = new IdGenerator();
	$file = getShortReport($chronoligicalEventNumber);
	$id = $generator->genAlphaId($file);
	$html = '';
	
	// If you want to change the view you have the change to output-html in the following lines
	$html .= 	'<li>
		<div><h2>'.
       getHeadline($file) 
      .'</h2></div>
      <a href="'.$config->getEventPage().'?'.$config->getReportParameter().	'='.$id.'">
	<img src="'.getFirstPicture(substr($file, -12, 7)).'" alt="'.getHeadline($file).'" /></a>
      
    </li>';
	
	
	return $html;
}


/**
 *  Returns the overviews of the latest events in form of html.
 * 	@param: count
 */
function getLatestEvents($count) {
	$config = new Configurator();
// If you want to change the view you have the change to output-html in the following lines
    $html = '
	<div class="row">
      <div class="large-12 columns">
      	<h3 class="main-head" >'.$config->getHeadlineLatestEvents().'</h3>
      </div>
    </div>';
	
	for( $i = 0 ; $i < $count; $i++){
	// Modulo 3 is used because the foundation-framework should have to put three overviews in one line.
	// Therefore you also have to setup the class "large-4". The maximus is "large-12". So 3 * 4 = 12.
		if ( $i % 3 == 0){
			$html .= '<div class="row">';
		}
		$html .= '<div class="large-4 columns">
      	<div class="panel">';
		$html .= getOverview($i+1);
		$html .= '</div>
      </div>';
	  if ( ($i - 2) % 3 == 0 ){
		$html .= '</div>';
	  }
	}
	
    return $html;
}

/**
 *  Returns the overview of an events in form of html. The chonological number refers to the specific report in a chronological order.
 * 	@param: chronologicalEventNumber
 */
function getOverview($chronoligicalEventNumber){
	$config = new Configurator();
	$generator = new IdGenerator();
	$file = getShortReport($chronoligicalEventNumber);
	$id = $generator->genAlphaId($file);
	$html = '';
	if( !empty($file) ) {
		$html .= file_get_contents($file);
	}
	
	// If you want to change the view you have the change to output-html in the following lines
	$html .= '<div class="row">
<div class="large-12 columns">
	<a href="'.$config->getEventPage().
	//./event.php
	'?'.$config->getReportParameter().//'Report
	'='.$id.'" class="small button">Bericht</a>
</div>
</div>';
	$html .= getPicPopup($id, substr($file, -12, 7));
	return $html;
}
