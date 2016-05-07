<?php

class ProductsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Product();
    }

    public function index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0])){
            $alias = strtolower($params[0]);
            $this->data = $this->model->getByAlias($alias);
        }



        $this->model = new Category();
        $this->data['category'] = $this->model->getById($this->data);
    }

}