<?php

class PicsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Pic();
    }

    public function index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function view(){
        $params = App::getRouter()->getParams();


        if ( isset($params[0]) ){
            $id = (int) $params[0];
            $this->data = $this->model->getById($id);
        }

    }
}