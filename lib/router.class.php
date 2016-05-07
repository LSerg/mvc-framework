<?php

/* Class uri Router with protected properties getters and setters
    Only this class controls url  */

class Router {

    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $route;

    protected $method_prefix;

    protected $language;

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    // Input parameter $uri = $_SERVER['REQUEST_URI']
    public function __construct($uri) {

        /* urldecode to get normalized uri string instead of %D1
           trim to cut slashes or spaces in beginning and in the end */

        $this->uri = urldecode(trim($uri, '/'));

        // Get defaults
        $routes = Config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->language = Config::get('default_language');
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');

        // explode to get two arrays before "?" and after
        $uri_parts = explode('?', $this->uri);

        // using [0] array with no params after ?
        $path = $uri_parts[0];

        // explode clean uri on array elements
        $path_parts = explode('/', $path);

        if ( count($path_parts) )  {

            // Get route or language from first element
            if ( in_array(strtolower(current($path_parts)), array_keys($routes)) ) {
                $this->route = strtolower(current($path_parts) );
                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($path_parts);
            } elseif ( in_array(strtolower(current($path_parts) ), Config::get('languages'))) {
                $this->language = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Get controller from next element of array (array_shift - next element)
            if ( current($path_parts) ) {
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Get action
            if ( current($path_parts) ) {
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Get params all the rest
            $this->params = $path_parts;

        };

    }

    public function redirect($location)
    {
        header("Location: $location");
    }
}