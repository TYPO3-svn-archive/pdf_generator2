<?php
  // add some typoscript constants
  $pdf_generator2_parameters = unserialize($_EXTCONF);
  t3lib_extMgm::addTypoScriptConstants('extension.pdf_generator2.typeNum = '.$pdf_generator2_parameters['typeNum']);

	if (t3lib_div::int_from_ver($GLOBALS["TYPO_VERSION"])>= 3007000) {
		// add some hooks
		$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['checkAlternativeIdMethods-PostProc'][] =
		  'EXT:pdf_generator2/class.tx_pdfgenerator2.php:&tx_pdfgenerator2->tslib_fe_checkAlternativeIdMethods';
		$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = 
		  'EXT:pdf_generator2/class.tx_pdfgenerator2.php:&tx_pdfgenerator2->tslib_fe_processOutput';
		
	} else {
	  // override class.tslib_fe
	  $TYPO3_CONF_VARS["FE"]["XCLASS"]["tslib/class.tslib_fe.php"] =
	    t3lib_extMgm::extPath($_EXTKEY,"class.ux_tslib_fe.php");
	}
	
?>
