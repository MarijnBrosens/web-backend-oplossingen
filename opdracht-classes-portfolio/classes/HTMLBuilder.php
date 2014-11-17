<?php

class HTMLBuilder {
    
    protected $header;
    protected $body;
    protected $footer;

    public function __construct($header, $body, $footer) {
        $this->header   =	$header;
        $this->body     =	$body;
        $this->footer   =	$footer;
        
        $this->buildHTML();
    }

    public function buildHeader() {
        include 'html/' . $this->header;
    }

    public function buildBody() {
        include 'html/' . $this->body;
    }

    public function buildFooter() {
        include 'html/' . $this->footer;
    }

    public function buildHTML()
    {
        $this->buildHeader();
        $this->buildBody();
        $this->buildFooter();
    }

}

?>