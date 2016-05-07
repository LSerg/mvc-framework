<?php

class ShopController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        //$this->model = new Category;
    }

    public function index(){
        $this->categories();
        $this->products();
    }

    public function categories(){
        $params = App::getRouter()->getParams();

        $this->model = new Category;
        $product = new Product;

        if ( isset($params[0]) ){
            $this->data['category'] = $this->model->getById($params[0]);
            $this->data['products'] = $product->getByCategory($params[0]);
            $this->data['categories'] = $this->model->getParentById($params[0]);
        } else {
            $this->data['products'] = $product->getList();
            $this->data['categories'] = $this->model->getList();
        }


    }

    public function products(){
        $params = App::getRouter()->getParams();

        $this->model = new Product;

        if ( isset($params[0]) ){
            $this->data = $this->model->getByAlias($params[0]);
            $this->data['category'] = $this->model->getCategoryById($this->data['id']);
            if ( $this->data['category']['parent_id'] > 0 ){

            }
        } else {
            $this->data['products'] = $this->model->getList();
        }
    }

}