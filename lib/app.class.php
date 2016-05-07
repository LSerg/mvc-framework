<?php

class App {

    protected static $router;

    public static $db;

    public static function getRouter() {
        return self::$router;
    }

    public static function run($uri) {

        // create Router class object
        self::$router = new Router($uri);

        // create DB connection
        self::$db = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.name'));

        // Load language file
        Lang::load(self::$router->getLanguage());

        // Get controller class name
        $controller_class = ucfirst(self::$router->getController()).'Controller';

        // Get method name
        $controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());

        // Get route
        $layout = self::$router->getRoute();
        if ( $layout == 'admin' && Session::get('role') != 'admin' ){
            if ( $controller_method != 'admin_login' ){
                Router::redirect('/admin/users/login');
            }
        }

        // Calling controller's method
        $controller_object = new $controller_class();
        if ( method_exists($controller_object, $controller_method) ){
            // Controller's action may return a view path
            $view_path = $controller_object->$controller_method();
            $view_object = new View($controller_object->getData(), $view_path);
            $content = $view_object->render();
        } else {
            throw new Exception('Method '.$controller_method.' of class '.$controller_class.' does not exist.');
        }

        $layout_path = VIEWS_PATH.DS.$layout.'.html';
        $layout_view_object = new View(compact('content'), $layout_path);
        echo $layout_view_object->render();

    }
}