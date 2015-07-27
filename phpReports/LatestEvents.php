<?php
include "./ReportBuilder.php";
include "./Configuration.php";

/**
 *  Returns the overviews of the latest events in form of html.
 * 	@param: count
 */
function getLatestEvents($count) {
// If you want to change the view you have the change to output-html in the following lines
    $html = '
	<div class="row">
      <div class="large-12 columns">
      	<h3 class="main-head" >'.getHeadlineLatestEvents().'</h3>
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
	<a href="'.getEventPage().
	//./event.php
	'?'.getReportParameter().//'Report
	'='.$id.'" class="small button">Bericht</a>
</div>
</div>';
	$html .= getPicPopup($id, substr($file, -12, 7));
	return $html;
}
