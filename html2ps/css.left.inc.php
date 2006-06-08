<?php
// $Header$

class CSSLeft extends CSSProperty {
  function CSSLeft() { $this->CSSProperty(false, false); }

  function default_value() { return null; }

  function parse($value) {
    $value = trim($value);

    // Check if current value is percentage
    if (substr($value, strlen($value)-1, 1) === "%") {
      return array((float)$value, true);
    } else {
      return array(units2pt($value), false);
    }
  }
}

register_css_property('left', new CSSLeft);

?>