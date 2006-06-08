<?php
	ob_start();

	// include classes for pdf generation
	define('HTML2PS_DIR',t3lib_extMgm::extPath('pdf_generator2','html2ps/'));

	if (t3lib_extMgm::isLoaded('pdf_generator2_fonts')) {
		define('PDFLIB_TTF_FONTS_REPOSITORY',t3lib_extMgm::extPath('pdf_generator2_fonts','fonts/'));
	}

	// allow file's from everywhere
	define('FILE_PROTOCOL_RESTRICT', '');

	require_once('html2ps/pipeline.factory.class.php');

  // -------------------------------------------------------------------
  /**
   * Handles the saving generated PDF to user-defined output file on server
   */
  class MyDestinationFile extends Destination {
    var $content;

    function MyDestinationFile() {
    }

    function process($tmp_filename, $content_type) {
      $this->content=@file_get_contents($tmp_filename);
      @unlink($tmp_filename);
    }

    function getContent() {
      return $this->content;
    }
  }

  /**
   * Handles passing the generated html to the converter
   */
  class MyFetcherLocalFile extends FetcherUrl {
    var $content;

    function MyFetcherLocalFile() {
      $this->_content = array();
    }

    function get_data($url) {
      if (array_key_exists($url,$this->_content)) {
      	return new FetchedDataURL($this->_content[$url], array(), "");
      } 
      return parent::get_data($url);
    }

    function add_content($url,$content) {
      $this->_content[$url] = $content;
    }
  }
  // -------------------------------------------------------------------
  
  // turn off admin panel
  $GLOBALS{TSFE}->config['config']['admPanel']=0;
  // generate original content
  require_once(PATH_tslib.'class.tslib_pagegen.php');
  include(PATH_tslib.'pagegen.php');

  // instead of calling processOutput...
  //---------------------------- begin ProcessOutput --------------
  // substitute fe user
  $token = trim($GLOBALS{TSFE}->config['config']['USERNAME_substToken']);
  $token = $token ? $token : '<!--###USERNAME###-->';
  if (strpos($GLOBALS{TSFE}->content, $token)) {
    $GLOBALS{TSFE}->set_no_cache();
    if ($GLOBALS{TSFE}->fe_user->user['uid'])	{
      $GLOBALS{TSFE}->content = str_replace($token,$GLOBALS{TSFE}->fe_user->user['uid'],$GLOBALS{TSFE}->content);
    }
  }
  // Substitutes get_URL_ID in case of GET-fallback
  if ($GLOBALS{TSFE}->getMethodUrlIdToken)	{
    $GLOBALS{TSFE}->content = str_replace($GLOBALS{TSFE}->getMethodUrlIdToken, $GLOBALS{TSFE}->fe_user->get_URL_ID, $GLOBALS{TSFE}->content);
  }

  // Tidy up the code, if flag...
  if ($GLOBALS{TSFE}->TYPO3_CONF_VARS['FE']['tidy_option'] == 'output')		{
    $GLOBALS['TT']->push('Tidy, output','');
    $GLOBALS{TSFE}->content = $GLOBALS{TSFE}->tidyHTML($GLOBALS{TSFE}->content);
    $GLOBALS['TT']->pull();
  }
  // XHTML-clean the code, if flag set
  if ($GLOBALS{TSFE}->doXHTML_cleaning() == 'output')		{
    $GLOBALS['TT']->push('XHTML clean, output','');
    $XHTML_clean = t3lib_div::makeInstance('t3lib_parsehtml');
    $GLOBALS{TSFE}->content = $XHTML_clean->XHTML_clean($GLOBALS{TSFE}->content);
    $GLOBALS['TT']->pull();
  }
  //---------------------------- end ProcessOutput --------------

	// ------------------------ Handle UserInt Objects --------------------------
	// ********************************
	// $GLOBALS['TSFE']->config['INTincScript']
	// *******************************
	if ($TSFE->isINTincScript())		{
	
		$TT->push('Non-cached objects','');
			$INTiS_config = $GLOBALS['TSFE']->config['INTincScript'];
	    $GLOBALS{TSFE}->set_no_cache();
				// Special feature: Include libraries
			$TT->push('Include libraries');
			reset($INTiS_config);
			while(list(,$INTiS_cPart)=each($INTiS_config))	{
				if ($INTiS_cPart['conf']['includeLibs'])	{
					$INTiS_resourceList = t3lib_div::trimExplode(',',$INTiS_cPart['conf']['includeLibs'],1);
					$GLOBALS['TT']->setTSlogMessage('Files for inclusion: "'.implode(', ',$INTiS_resourceList).'"');
					reset($INTiS_resourceList);
					while(list(,$INTiS_theLib)=each($INTiS_resourceList))	{
						$INTiS_incFile=$GLOBALS['TSFE']->tmpl->getFileName($INTiS_theLib);
						if ($INTiS_incFile)	{
							require_once('./'.$INTiS_incFile);
						} else {
							$GLOBALS['TT']->setTSlogMessage('Include file "'.$INTiS_theLib.'" did not exist!',2);
						}
					}
				}
			}
			$TT->pull();
			$TSFE->INTincScript();
		$TT->pull();
	}
  //---------------------------- end Handle UserInt Objects --------------

  //---------------------------- parse html2df parameters --------------

	$html2pdf_browserwidth=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['browserwidth'];
	$html2pdf_left=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['left'];
	$html2pdf_right=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['right'];
	$html2pdf_top=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['top'];
	$html2pdf_bottom=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['bottom'];
	$html2pdf_size=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['size'];
	$html2pdf_landscape=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['landscape'];
	$html2pdf_renderlinks=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['renderlinks'];
	$html2pdf_renderfields=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['renderfields'];
	$html2pdf_renderforms=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['renderforms'];
	$html2pdf_pdfversion=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['pdfversion'];
	$html2pdf_cssmedia=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['cssmedia'];
	$html2pdf_use_pdflib=$GLOBALS{TSFE}->config['config']['pdf_generator2.']['use_pdflib'];
	
  //---------------------------- apply replaces --------------

		$i=0;
	while(++$i) {
	  if ($GLOBALS{TSFE}->config['config']['pdf_generator2.']['string_search'.$i]) {
	    $GLOBALS{TSFE}->content = str_replace($GLOBALS{TSFE}->config['config']['pdf_generator2.']['string_search'.$i],
	      $GLOBALS{TSFE}->config['config']['pdf_generator2.']['string_replace'.$i],$GLOBALS{TSFE}->content);
	  } elseif ($i>4) {
	  	break;
	  }
	};
	$i=0;
	while(++$i) {
	  if ($GLOBALS{TSFE}->config['config']['pdf_generator2.']['regexp_search'.$i]) {
	    $GLOBALS{TSFE}->content = preg_replace($GLOBALS{TSFE}->config['config']['pdf_generator2.']['regexp_search'.$i],
	      $GLOBALS{TSFE}->config['config']['pdf_generator2.']['regexp_replace'.$i],$GLOBALS{TSFE}->content);
	  } elseif ($i>4) {
	  	break;
	  }
	}

//---------------------------- make links absolute --------------


function fix_links_callback($matches) 
{
	return $matches[1].t3lib_div::locationHeaderUrl($matches[2]).$matches[3];	
}

$GLOBALS{TSFE}->content = preg_replace_callback('/(<a [^>]*href=\")(?!#)(.*?)(\")/',
                                       'fix_links_callback',
                                       $GLOBALS{TSFE}->content );

$GLOBALS{TSFE}->content = preg_replace_callback('/(<form [^>]*action=\")(?!#)(.*?)(\")/',
                                       'fix_links_callback',
                                       $GLOBALS{TSFE}->content );
// write the html for debugging puposes
	if (1) {
		$fd=fopen('typo3temp/html2ps.html', 'wb');
		fwrite($fd,$GLOBALS{TSFE}->content);
		fclose($fd);
	}

	//------------------------------------------
	// now pipe the html through html2ps

  parse_config_file(t3lib_extMgm::extPath('pdf_generator2','html2ps/html2ps.config'));

	$pdffile = tempnam('typo3temp', 'pdf_');

  $pipeline = PipelineFactory::create_default_pipeline("", // Attempt to auto-detect encoding
                                                       "");

  // Override HTML source, passsing our original root directory
  $pipeline->fetchers = array(new MyFetcherLocalFile());

  // Override destination to local file
  $pipeline->destination = new MyDestinationFile($pdffile);

  if (preg_match('/^(\d+(\.\d+)?)x(\d+(\.\d+)?)$/i',$html2pdf_size,$match)) {
  	$media = new Media(array('width' => $match[1], 'height' => $match[3]),array('top'=>0, 'bottom'=>0, 'left'=>0, 'right'=>0));
  } else {
	  $media = Media::predefined($html2pdf_size);	
  }
  $media->set_landscape($html2pdf_landscape);
  $media->set_margins(array('left'   => $html2pdf_left,
                            'right'  => $html2pdf_right,
                            'top'    => $html2pdf_top,
                            'bottom' => $html2pdf_bottom));
  $media->set_pixels($html2pdf_browserwidth); 

  global $g_config;
  $g_config = array('cssmedia'     => $html2pdf_cssmedia,
                    'renderimages' => true,
                    'renderlinks'  => $html2pdf_renderlinks,
                    'renderfields' => $html2pdf_renderfields,
                    'renderforms'  => $html2pdf_renderforms,
                    'mode'         => 'html',
                    'encoding'     => '',
                    'debugbox'     => false,
                    'pdfversion'    => $html2pdf_pdfversion,
                    'draw_page_border' => false
                    );
	 if ($g_config['renderfields']) {
  	$pipeline->pre_tree_filters[] = new PreTreeFilterHTML2PSFields();
	};

	// caclulate scaling
  global $g_px_scale;
  $g_px_scale = mm2pt($media->width() - $media->margins['left'] - $media->margins['right']) / $media->pixels; 
  global $g_pt_scale;
  $g_pt_scale = $g_px_scale * 1.43; 

	if($html2pdf_use_pdflib) {
   	$pipeline->output_driver = new OutputDriverPDFLIB($g_config['pdfversion']);
  } else {
		require_once(t3lib_extMgm::extPath('pdf_generator2','html2ps/fpdf/fpdf.php'));
		require_once(t3lib_extMgm::extPath('pdf_generator2','html2ps/fpdf/font/makefont/makefont.php'));
    $pipeline->output_driver = new OutputDriverFPDF();
  }

	if (preg_match('#<sectionbreak\s*/>#si',$GLOBALS{TSFE}->content)) {
		preg_match('#(^.*<body.*?>)(.*?)(</body>.*$)#s',$GLOBALS{TSFE}->content,$r);

    $urls=array(); 
		$i=0;
		foreach (preg_split('#<sectionbreak\s*/>#si',$r[2]) as $c) {
			$url='file:///'.getcwd().'/dummy_'.$i.'.ram';
    	$pipeline->fetchers[0]->add_content($url,$r[1].$c.$r[3]);
    	$urls[]=$url; // add an empty url to the batch, this will instruct the fetcher to get the data from the internal memory stack
    	$i++;
    }
		$pipeline->process_batch($urls,$media);
	
	} else {
		$url='file:///'.getcwd().'/dummy.ram';
		$pipeline->fetchers[0]->add_content($url,$GLOBALS{TSFE}->content);
	  $pipeline->process($url, $media);
	}
	  
	$GLOBALS{TSFE}->content=$pipeline->destination->getContent();
	@unlink($pdffile);

	if (ob_get_length()) {
 	  $errors=ob_get_contents();
  	$GLOBALS{TSFE}->content='';
  }
	ob_end_clean();

	if (substr($GLOBALS{TSFE}->content,0,4) != '%PDF') {
		// don't cache errors
	  $GLOBALS{TSFE}->set_no_cache();
	  $GLOBALS{TSFE}->content = '<html><title>html2ps problem</title><body><h1>HTML2PDF Problem:</h1>';
	  if ($errors) {
	  	$GLOBALS{TSFE}->content.='html2ps produced the following errors:';
	  	$GLOBALS{TSFE}->content.='<table borders=1 bgcolor="#e0e0e0"><tr><td>'.$errors.'</td></tr></table>';
	  } else {
	  	$GLOBALS{TSFE}->content.= 'html2ps produced no pdf-output.<br>';
	  }
	  $GLOBALS{TSFE}->content.='</body></html>';
	  
	}

?>