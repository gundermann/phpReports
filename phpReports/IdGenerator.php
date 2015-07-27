<?php

class IdGenerator{

/* The alpha ID is the main identifyer used by phpReports

 @params $reportName
*/
public function genAlphaId($reportName) {
	$numericId = substr($reportName, 10,7);
	$hexId = dechex($numericId);
	$popupId = $this->hexToAlpha($hexId);
	return $popupId;
 }
 
 
private function hexToAlpha($hex){
	$lenght = strlen($hex);
	$alphaId = '';
	for( $i = 0; $i < $lenght; $i++){
		$alphaId .= $this->mapHexToAlpha(substr($hex, $i, 1));
	}
	return $alphaId;
 }
 
private function mapHexToAlpha($hexSymbol){
	switch($hexSymbol){
		case 0: return 'a';
		case 1: return 'b'; 
		case 2: return 'c'; 
		case 3: return 'd'; 
		case 4: return 'e'; 
		case 5: return 'f'; 
		case 6: return 'g'; 
		case 7: return 'h'; 
		case 8: return 'i'; 
		case 9: return 'j'; 
		case 'A': return $hexSymbol;
		case 'B': return $hexSymbol; 
		case 'C': return $hexSymbol; 
		case 'D': return $hexSymbol; 
		case 'E': return $hexSymbol; 
		case 'F': return $hexSymbol; 
	}
 }
 }