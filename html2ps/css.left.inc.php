<?php
// $Header$

class CSSLeft extends CSSProperty {
  function CSSLeft() { $this->CSSProperty(false, false); }
  function default_value() { return null; }
  function parse($value) { return $value; }
}

register_css_property('left', new CSSLeft);

?>