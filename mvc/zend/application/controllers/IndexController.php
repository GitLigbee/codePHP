<?php
class IndexController implements IController
{
    public function index()
    {
        $fc = FrontController::getInstance();
        $params = $fc->getParams();

        $view = new View();
        $view->name = 'ligbee';
        $result = $view->render('../views/index.php');

        $fc->setBody($result);
    }
}