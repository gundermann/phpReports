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
		$partialHex = substr($hex, $i, 1);
		$alphaId .= $this->mapHexToAlpha($partialHex);
	}
	return $alphaId;
 }
 
private function mapHexToAlpha($hexSymbol){
	switch($hexSymbol){
		case 'a': return 'A';
		case 'b': return 'B'; 
		case 'c': return 'C'; 
		case 'd': return 'D'; 
		case 'e': return 'E'; 
		case 'f': return 'F'; 
		
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
	}
 }
 }