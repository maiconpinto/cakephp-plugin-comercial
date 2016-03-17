<?php

App::uses('AppController', 'Controller');

class ComercialAppController extends AppController {

    public function isAuthorized($user)
    {
        if ($this->Auth->login()) {
            return true;
        }

        return false;
    }
}
