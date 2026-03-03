<?php

class PageController
{
    public function about()
    {
        require_once "app/views/pages/about.php";
    }

    public function contact()
    {
        require_once "app/views/pages/contact.php";
    }
}