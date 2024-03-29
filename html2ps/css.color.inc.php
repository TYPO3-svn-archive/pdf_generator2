<?php
// $Header$

class CSSColor extends CSSProperty {
  function CSSColor() { $this->CSSProperty(true, true); }

  function default_value() { return new Color(array(0,0,0),false); }

  function parse($value) {
    $old_color = $this->get();
    $color = parse_color_declaration($value, 
                                     array($old_color->r,
                                           $old_color->g,
                                           $old_color->b)
                                     );
    return new Color($color, is_transparent($color));
  }
}

register_css_property('color', new CSSColor);

?>