<?php
// $Header$

// Format of 'top' value:
// array( float, is_percentage )

class CSSTop extends CSSProperty {
  function CSSTop() { $this->CSSProperty(false, false); }
  function default_value() { return null; }
  function parse($value) { return $value; }
}

register_css_property('top', new CSSTop);

?>