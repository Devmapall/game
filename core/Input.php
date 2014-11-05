<?php
namespace MVC;

class Input {

    public function post($index) {
        if (isset($_POST[$index])) {
            if(is_array($_POST[$index])) {
                return $_POST[$index];
            } else {
                return filter_input(INPUT_POST, $index);
            }
        } else {
            return false;
        }
    }

    public function get($index) {
        if (isset($_GET[$index])) {
            return filter_input(INPUT_GET, $index);
        } else {
            return false;
        }
    }

    public function cookie($index) {
        if (isset($_COOKIE[$index])) {
            return filter_input(INPUT_COOKIE, $index);
        } else {
            return false;
        }
    }

    public function server($index) {
        if (isset($_SERVER[$index])) {
            return filter_input(INPUT_SERVER, $index);
        } else {
            return false;
        }
    }
}
