<?php
// $Header$

define('VISIBILITY_VISIBLE',0);
define('VISIBILITY_HIDDEN',1);
define('VISIBILITY_COLLAPSE',2); // TODO: currently treated is hidden

class CSSVisibility extends CSSProperty {
  function CSSVisibility() { $this->CSSProperty(false, false); }

  function default_value() { return VISIBILITY_VISIBLE; }

  function parse($value) {
    if ($value === 'visible')  { return VISIBILITY_VISIBLE; };
    if ($value === 'hidden')   { return VISIBILITY_HIDDEN; };
    if ($value === 'collapse') { return VISIBILITY_COLLAPSE; };
    return VISIBILITY_VISIBLE;
  }
}

register_css_property('visibility', new CSSVisibility);

?>