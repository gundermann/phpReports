<?php
require './IdGenerator.php';
include './Configuration.php';

/*
 *	Returns file with the short version of the report.
 *	@params $number - the number of the report (number in filename)
 */
public function getShortReport($number){
	$reportDir = getReportsDirectory();
	$allFiles = scandir($reportDir, SCANDIR_SORT_DESCENDING); 
	$count = 0;
	$html = '';
	foreach ($allFiles as $file) {
		$info = pathinfo($reportDir."/".$file);
		$filename = $info['filename'];	
		
		if( substr($filename, -1, 1) == "s"){
			$count++;
			if( $count == $number ) {
				$html .= $reportDir."/".$file;
				return $html;
			}
		}
	
	}
	return $html;
}

/*
 * Returns the report-navigation
 * @params $year  - year of the report
 * @params $reportId - the filename of the report
 */
public function getReportLinks($year, $reportId){
$generator = new IdGenerator();
$reports = findReports($year);
$html = '<div class="hide-for-small" data-magellan-expedition="fixed"> <dl class="sub-nav">';
for ($i = 0 ; $i < count($reports); $i++){
	$id = $generator->genAlphaId($reports[$i]);
	$headline = getHeadline($reports[$i]);
	$html .= '<dd data-magellan-arrival="'.$id.'"><a href="#'.$id.'">'.$headline.'</a></dd>';
}

$html .= '</dl> </div>';
return $html;
}

/*
 * Returns the content of the report file.
 * @params $reportId - the unique filename of the report
 */
public function getReportContent($reportId){
$generator = new IdGenerator();

$report = findReport($reportId);
$html = '</br>';
	$popupId = $generator->genAlphaId($report);
	$html .= '<div class="row panel"><div class="large-12 columns ">' 
	.file_get_contents($report). ' <div class="row">
	<div class="large-12 columns">
	<a href="#" data-reveal-id="'.$popupId.'" class="small button">Bilder</a>	
	</div>
	</div>
	</div>
	</div>';
	$html .= getPicPopup($popupId, substr($report, -11, 7));
	return $html;
}

/*
 * Returns the contents of the report-files in a year.
 * @params $year - the year of the reports
 */
public function getReportContents($jahr){

$generator = new IdGenerator();
$reports = findReports($jahr);
$html = '</br>';
for ($i = 0 ; $i < count($reports); $i++){
	$popupId = $generator->genAlphaId($reports[$i]);
	$html .= '<div class="row panel"><div class="large-12 columns "> 
	<a name="'.$popupId.'" data-magellan-destination="'.$popupId.'"></a>' 
	.file_get_contents($reports[$i]). ' <div class="row">
	<div class="large-12 columns">
	<a href="#" data-reveal-id="'.$popupId.'" class="small button">Bilder</a>	
	</div>
	</div>
	</div>
	</div>';
	$html .= getPicPopup($popupId, substr($reports[$i], -11, 7));
}

return $html;
}

/*
 * Returns the popup for the images of the report.
 * @params $reportId - the alphaID of the report
 * @params $reportName - the filename of the report
 */
public function getPicPopup($reportId, $reportName){
$html = '<div id="'.$reportId.'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h2 id="Title">Bilder</h2>
   <div class="row">
		<div class="large-12 columns">
  <ul class="example-orbit-small" data-orbit>'.getPictures($reportName).'
  </ul>
  
  	</div>
    </div>
	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>';
return $html;
}

private function getHeadline($report){
$content = substr(file_get_contents($report), 4,255);
$lenght = strlen($content);
$headline = '';
for( $i = 0; $i < $lenght; $i++){
	$symbol= substr($content, $i, 1);
	if($symbol != '<'){
		$headline .= $symbol;
	} else {
		break;
	}
}
return $headline;
}

private function getPictures($reportName){
$picDir = getImageDirectory().$reportName;
$allFiles = scandir($picDir); 
$html = '';
foreach ($allFiles as $file) {
$path = $picDir."/".$file;

if( substr($path, -1,1) != '.'){
$html .= '
	<li> 
					<img src="'.$path.'"/> 
					<div class="orbit-caption"> Image </div> 
				</li>';
	}
	}
	return $html;
}

private function findReports($year){
	$reportDir = getReportsDirectory();
	$reports = array();
	$allFiles = scandir($reportDir, SCANDIR_SORT_DESCENDING); 
	foreach ($allFiles as $file) {
		$info = pathinfo($reportDir."/".$file);
		$filename = $info['filename'];	
		if( substr($filename,0,4) == $year and substr($filename, -1, 1) != "s"){
			array_push($reports, $reportDir."/".$file);
		}
	
	}
	return $reports;
}

private function findReport($reportId){
	$generator = new IdGenerator();
	$reportDir = getReportsDirectory();
	$allFiles = scandir($reportDir, SCANDIR_SORT_DESCENDING); 
	foreach ($allFiles as $file) {
		$path = $reportDir."/".$file;
		$info = pathinfo($path);
		$filename = $info['filename'];	
		if( substr($filename, -1, 1) != "s" and substr($filename, 0, 7) != "Vorlage"){
			$id = $generator->genAlphaId($path);
			if($id == $reportId){
				return $reportDir."/".$file;
			}
		}
	}
}

