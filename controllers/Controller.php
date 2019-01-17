<?php

class Controller
{
    public function view($template, $data) {
        extract($data);
        include 'templates/'.$template.'.php';
    }
}
