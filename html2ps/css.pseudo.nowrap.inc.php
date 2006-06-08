<?php
// $Header$

define('NOWRAP_NORMAL',0);
define('NOWRAP_NOWRAP',1);

class CSSPseudoNoWrap extends CSSProperty {
  function CSSPseudoNoWrap() { $this->CSSProperty(false, false); }
  function default_value() { return NOWRAP_NORMAL; }

  function pdf(){ return $this->get(); }
}

register_css_property('-nowrap', new CSSPseudoNoWrap);
  
?>