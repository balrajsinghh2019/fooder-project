<?php
// create a meta generator class

class Metatags {
   // function to generate and return title
    public function title($title) {
        return "<title>$title</title>";
    }
    // function to generate and return description
    public function description($description) {
        return "<meta name='description' content='$description'>";
    }
    // function to generate and return keywords
    public function keywords($keywords) {
        return "<meta name='keywords' content='$keywords'>";
    }
}

?>