<?php

namespace App\Controllers;


class WebController
{
    protected $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function home()
    {
        return $this->twig->render('index.twig');
    }
}
