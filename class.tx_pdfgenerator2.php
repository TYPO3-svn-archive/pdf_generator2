<?php
/***************************************************************
* Copyright notice
*
* (c) 2003 Jens Ellerbrock <je@hades.org>
* All rights reserved
*
* This script is part of the Typo3 project. The Typo3 project is
* free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
* A copy is found in the textfile GPL.txt and important notices to the license
* from the author is found in LICENSE.txt distributed with these scripts.
*
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
* This class holds some functions used by the pdf_generator2 extension
*
* Depends on: Depends on div from t3lib/
*
* @author Jens Ellerbrock <je@hades.org>
*/

class tx_pdfgenerator2 {
	
	function fix_conf($conf) {
		if (is_array($conf['userFunc.'])) {
			foreach ($conf['userFunc.'] as $k => $v) {
				$conf[$k]=$v;
			}
		}
		return $conf;
	}

	function tslib_fe_checkAlternativeIdMethods($params, $ref)	{
		$pObj = &$params['pObj'];

		if (t3lib_div::int_from_ver($GLOBALS["TYPO_VERSION"])>= 3007000) {
			$siteScript = t3lib_div::getIndpEnv('TYPO3_SITE_SCRIPT');
		} else {
			$siteScript = $GLOBALS["HTTP_SERVER_VARS"]["REQUEST_URI"];
		}
		if ($siteScript && substr($siteScript,0,9)!='index.php')	{		// If there has been a redirect (basically; we arrived here otherwise than via "index.php" in the URL) this can happend either due to a CGI-script or because of reWrite rule. Earlier we used $_SERVER['REDIRECT_URL'] to check but
			$uParts = parse_url($siteScript);	// Parse the path:
			$requestFilename = trim(ereg_replace('.*\/','',$uParts['path']));		// This is the filename of the script/simulated pdf-file.
			$parts = explode('.',ereg_replace('.*\/','',$requestFilename));
			$pCount = count($parts);
			if ($parts[$pCount-1]=='pdf')	{
				if ($pCount>2)	{
					$pObj->type = intval($parts[$pCount-2]);
					$pObj->id= $parts[$pCount-3];
				} else {
					$pObj->type = $GLOBALS['pdf_generator2_parameters']['typeNum'];
					$pObj->id= $parts[0];
				}
			}
		}
	}
	
	function tslib_fe_processOutput($params, $ref)	{

		require('typo3conf/localconf.php');
		$pdf_generator2_parameters = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['pdf_generator2']);

		// add a Content-Length header if page_type is our pdf page
		if ($GLOBALS['TSFE']->type == $pdf_generator2_parameters['typeNum']) {
			if (substr($GLOBALS['TSFE']->content, 0, 4) != '%PDF') {
			  if (substr($GLOBALS['TSFE']->content, 0, 36) != '<html><title>html2ps problem</title>') {
			    $GLOBALS['TSFE']->content = '<html><body><h1>Error while trying the pdfconversion</h1><h2>Maybe the gen_pdf.php script was not executed at all.</h2></body></html>';
			  }
			  // prevent caching
			  $GLOBALS['TSFE']->set_no_cache();
			} else {
				$filename = t3lib_div::GPvar('filename') ? '; filename = "'.t3lib_div::GPvar('filename').'"' : '';
				if (t3lib_div::GPvar('attachment')==1) {
					header('Content-Type: application/pdf');
					header('Content-Disposition: attachment'. $filename);
				} else if (t3lib_div::GPvar('attachment')==2) {
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment'. $filename);
				} else {
					header('Content-Type: application/pdf');
					header('Content-Disposition: inline'. $filename);
				}
				header('Cache-control: private');
				header('Connection: Keep-Alive');
				header('Content-Length: '.strlen($GLOBALS['TSFE']->content));

				// disable compression
				if ($pdf_generator2_parameters['disableGzipForPdf']) {
					$GLOBALS['TYPO3_CONF_VARS']['FE']['compressionLevel']='';
				}
			}
		} 
  }
	function add_vars2($vars,$path) {
		$res='';
		reset ($vars);
		while (list ($key, $val) = each ($vars)) {
			if (is_array($val)) {
		  	$res .= $this->add_vars2($val, $path.'['.rawurlencode($key).']');
			} else {
				$res .= '&amp;'.$path.'['.rawurlencode($key).']'.'='.rawurlencode($val);
			}
		}
		return $res;
	}
	
	function add_vars($vars) {
		$res='';
		reset ($vars);
		while (list ($key, $val) = each ($vars)) {
			if (is_array($val)) {
		  	$res .= $this->add_vars2($val, rawurlencode($key));
			} else {
				if (($key != 'id') && ($key != 'type')) {
					$res .= '&amp;'.rawurlencode($key).'='.rawurlencode($val);
				}
			}
		}
		return $res;
	}

  function getPdfTarget($content,$conf) {
  	$conf=$this->fix_conf($conf);
    $GLOBALS['TT']->push('getPdfTarget');
		require('typo3conf/localconf.php');
		$parameters = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['pdf_generator2']);
		$link = '';
		if (($conf['simulateStaticPdf'] != '') ? $conf['simulateStaticPdf'] : $parameters['simulateStaticPdf']) {//check for config here
			$link.=($GLOBALS['TSFE']->page['alias']) ? $GLOBALS['TSFE']->page['alias'] : $GLOBALS['TSFE']->id;
			$link.='.pdf?';
		} else {
			$link.='index.php?id='.$GLOBALS['TSFE']->id;
			$link.='&amp;type='.$parameters['typeNum'];
		}
		$link.=$this->add_vars($GLOBALS['HTTP_GET_VARS']);
		if ($conf['include_post_vars']) {
			$link.=$this->add_vars($GLOBALS['HTTP_POST_VARS']);
  	}
		if ($conf['attachment']) {
		  $link.='&amp;attachment='.rawurlencode($conf['attachment']);
		}
		if ($conf['filename']) {
		  $link.='&amp;filename='.rawurlencode($conf['filename']);
		}

		// repair ugly uri's
		$link=str_replace('?&amp;','?',$link);
		$link=preg_replace('/\?$/','',$link);

	  return $link;
	}
  
  function openPdfLink($content, $conf) {
  	$conf=$this->fix_conf($conf);
		$link.='"'.$this->getPdfTarget($content,$conf).'"';
		
		if ($conf['target']) {
			$link.=' target="'.$conf['target'].'"';
		}
		if ((!$conf['no_blur'])&&(!$conf['noBlur'])) {
			$link.=' onFocus="blurLink(this);"';
		}
		if ($conf['ATagParams']) {
			$link.=' '.$conf['ATagParams'];
		}

		$GLOBALS['TT']->setTSLogMessage( 'link to URI: '.$link, 0);

	  $GLOBALS['TT']->pull(); // getPdfTarget
    return '<a href='.$link.'>'.$content;
  }
  function makePdfLink($content, $conf) {
  	$conf=$this->fix_conf($conf);
    $GLOBALS['TT']->push('makePdfLink');
		if (!$conf['no_user_int']) {
			$GLOBALS['TT']->setTSLogMessage( 'making USER_INT object', 0);
			$substKey = 'INT_SCRIPT.'.$GLOBALS['TSFE']->uniqueHash();
			$link='<!--'.$substKey.'-->';
			$conf['userFunc'] = 'tx_pdfgenerator2->openPdfLink';
			$GLOBALS['TSFE']->config['INTincScript'][$substKey] = array(
				'conf'=>$conf,
				'cObj'=>serialize(new tslib_cObj),
				'type'=>'FUNC'
			);
	  } else {
		  $link = $this->openPdfLink('',$conf);
		}
	
	  $GLOBALS['TT']->pull(); // makePdfLink
		return $link . $content . '</a>';
	}
}

// Include extension?
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pdf_generator2/class.tx_pdfgenerator2.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pdf_generator2/class.tx_pdfgenerator2.php']);
}

?>
