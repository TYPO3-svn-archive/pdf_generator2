<?php
// $Header$

class OutputDriverGenericPDF extends OutputDriverGeneric {
  var $pdf_version;

  function OutputDriverGenericPDF() {
    $this->OutputDriverGeneric();
    $this->set_pdf_version("1.3");
  }

  function content_type() { return ContentType::pdf(); }

  function get_pdf_version() { 
    return $this->pdf_version; 
  }

  function reset($media) {
    OutputDriverGeneric::reset($media);
  }

  function set_pdf_version($version) {
    $this->pdf_version = $version;
  }
}
?>