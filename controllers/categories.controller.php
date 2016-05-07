<?php

class CategoriesController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Category;
    }

    public function index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $alias = strtolower($params[0]);
            $this->data['category'] = $this->model->getById($alias);
            $this->products();

        }
    }

    public function products(){
        $id = App::getRouter()->getParams();

        $this->model = new Product;
        $this->data['product'] = $this->model->getByCategory($id[0]);
    }

}