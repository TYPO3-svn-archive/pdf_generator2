<?php
// $Header$

class CSSPseudoListCounter extends CSSProperty {
  function CSSPseudoListCounter() { $this->CSSProperty(true, false); }
  function default_value() { return 1; }
}

register_css_property('-list-counter', new CSSPseudoListCounter);

?>