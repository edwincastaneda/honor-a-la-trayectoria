<?php

class Home extends Controller
{

    public function index()
    {

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/menu.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/libs.php';
        require APP . 'view/_templates/footer.php';
    }
    
}
