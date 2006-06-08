<?php
// $Header$

define('WHITESPACE_NORMAL',0);
define('WHITESPACE_PRE',1);
define('WHITESPACE_NOWRAP',2);

class CSSWhiteSpace extends CSSProperty {
  function CSSWhiteSpace() { $this->CSSProperty(true, true); }

  function default_value() { return WHITESPACE_NORMAL; }

  function parse($value) {
    switch ($value) {
    case "normal": 
      return WHITESPACE_NORMAL;
    case "pre":
      return WHITESPACE_PRE;
    case "nowrap":
      return WHITESPACE_NOWRAP;
    default:
      return WHITESPACE_NORMAL;
    }
  }      
}

register_css_property('white-space', new CSSWhiteSpace);
  
?>