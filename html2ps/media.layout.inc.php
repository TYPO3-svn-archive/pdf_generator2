<?php
// $Header$

$g_predefined_media = array();
$g_media = null;

// TODO: check for validity
function add_predefined_media($name, $height, $width) {
  global $g_predefined_media;
  $g_predefined_media[$name] = array('height' => $height, 'width' => $width);
}

class Media {
  var $margins;
  var $size;
  var $pixels;
  var $is_landscape;

  function width()  { return $this->is_landscape ? $this->size['height'] : $this->size['width'] ; }
  function height() { return $this->is_landscape ? $this->size['width']  : $this->size['height']; }
  function real_height() { 
    return $this->height() - $this->margins['bottom'] - $this->margins['top'];
  }

  function set_landscape($state) {
    $this->is_landscape = (bool)$state;
  }

  // TODO: validity checking
  function set_margins($margins) {
    $this->margins = $margins;
  }

  function set_pixels($pixels) {
    $this->pixels = $pixels;
  }
 
  // TODO: validity checking
  function predefined($name) {
    global $g_predefined_media;
    // Let's check if the chosen media defined
    if (isset($g_predefined_media[$name])) {
      return new Media($g_predefined_media[$name], array('top'=>0, 'bottom'=>0, 'left'=>0, 'right'=>0));
    } else {
      return null;
    };
  }

  function Media($size, $margins) {
    $this->size    = $size;
    $this->margins = $margins;
    $this->pixels  = 800;
  }

  /**
   * Pixels per millimeter
   */
  function PPM() { 
    return $this->pixels / ($this->size['width'] - $this->margins['left'] - $this->margins['right']);
  }

  function to_bbox() {
    return '0 0 '.ceil(mm2pt($this->size['width'])).' '.ceil(mm2pt($this->size['height']));
  }

  function to_ps_landscape() {
    if (!$this->is_landscape) { return "/initpage {} def"; };
    return "/initpage {90 rotate 0 pageheight neg translate} def";
  }

  function to_ps() {
    return 
// Note that /pagewidth and /pageheight should contain page size on the "client"
// coordinate system for correct rendering, so the will swap place in landscape mode,
// while /width and height set in PageSize should have the real media values, because
// actual coordinate system rotation/offset is done by the /initpage command without
// actually ratating the media.
"/pagewidth  {".$this->width()." mm} def\n".
"/pageheight {".$this->height()." mm} def\n".
"/lmargin    {{$this->margins['left']} mm} def\n".
"/rmargin    {{$this->margins['right']} mm} def\n".
"/tmargin    {{$this->margins['top']} mm} def\n".
"/bmargin    {{$this->margins['bottom']} mm} def\n".
"/px {pagewidth lmargin sub rmargin sub {$this->pixels} div mul} def\n".
"<< /PageSize [".$this->size['width']." mm ".$this->size['height']." mm] >> setpagedevice\n".
$this->to_ps_landscape();
  }
}

?>