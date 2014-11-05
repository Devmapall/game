<?php
Namespace MVC;

class XSSFilter {
    
    public static function filter($uri) {
        $result = preg_replace("#[^a-zA-Z0-9\/]+#", "",$uri);
        return $result;
    }
}
