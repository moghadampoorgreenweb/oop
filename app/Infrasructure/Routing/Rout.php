<?php

namespace Infrasructure\Routing;

class Rout
{
    protected $rout;
    private $method;
    private $path;
    private $controller;
    private $action;
    private $pathlist = [];

    public function __construct()
    {

    }

    public function run()
    {

    }
    public function add($method, $path, $controller, $action)
    {
        $this->setMethod($method);
        $this->setPath($path);
        $this->setController($controller);
        $this->setAction($action);
        $this->rout[$this->getMethod()][$this->getPath()] = [
            'controller' => $this->getController(),
            'method' => $this->getAction(),
        ];
        $this->pathlist[] = $this->getPath();
    }

    public function get($path, $controller, $action)
    {
        $this->setMethod('get');
        $this->setPath($path);
        $this->setController($controller);
        $this->setAction($action);
        $this->add( $this->getMethod(),$this->getPath(), $this->getController(), $this->getAction());
    }

    public function post($path, $controller, $action)
    {
        $this->setMethod('post');
        $this->setPath($path);
        $this->setController($controller);
        $this->setAction($action);
        $this->add($this->getMethod(),$this->getPath(), $this->getController(), $this->getAction());
    }

    public function delete($path, $controller, $action)
    {
        $this->setMethod('delete');
        $this->setPath($path);
        $this->setController($controller);
        $this->setAction($action);
        $this->add($this->getMethod(),$this->getPath(), $this->getController(), $this->getAction());
    }

    public function put($path, $controller, $action)
    {
        $this->setMethod('put');
        $this->setPath($path);
        $this->setController($controller);
        $this->setAction($action);
        $this->add($this->getMethod(),$this->getPath(), $this->getController(), $this->getAction());
    }






    /**
     * @return array
     */
    public function getPathlist()
    {

        return $this->pathlist;
    }


    /**
     * @param array $pathlist
     */
    public function setPathlist($pathlist)
    {
        $this->pathlist = $pathlist;
    }


    /**
     * @return mixed
     */
    public function getRout()
    {
        return $this->rout;
    }

    /**
     * @param mixed $rout
     */
    public function setRout($rout)
    {
        $this->rout = $rout;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }


}