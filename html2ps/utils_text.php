<?php
// $Header$

function squeeze($string) {
  return preg_replace("![ \n\t]+!"," ",trim($string));
}

?>