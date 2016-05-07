<?php

class ReviewsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Review;
    }

    public function index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function add(){
        if ( $_POST ) {
            $result = $this->model->add($_POST);
            if ( $result ){

            } else {

            }
            Router::redirect('/'.App::getRouter()->getLanguage().'/'.App::getRouter()->getController());
        }
    }
}