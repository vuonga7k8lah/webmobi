<?php

namespace MyProject\Core;

class Route
{
    private static $_self = null;
    protected $aRouter;


    public static function load($router)
    {
        if (self::$_self === null) {
            self::$_self = new self();
        }

        $oRoute = self::$_self;
        include $router;

        return self::$_self;
    }
//
//    public static function get($uri, $controller)
//    {
//        self::$aRouter['GET'][$uri] = $controller;
//    }
//
//    public static function post($uri, $controller)
//    {
//        self::$aRouter['POST'][$uri] = $controller;
//    }
//
//    public function direct($uri, $method)
//    {
//        if ($controller = $this->getRoute($uri, $method)) {
//            $aPasted = explode('@', $controller);
//
//        } else {
//            $aPasted = [
//                'MyProject\Controller\PageNotFound', 'loadView'
//            ];
//        }
//        $this->callToAction($aPasted[0], $aPasted[1]);
//    }
//
//    private function getRoute($uri, $method)
//    {
//        return array_key_exists($uri, self::$aRouter[$method]) ? self::$aRouter[$method][$uri] : false;
//    }
//
//    private function callToAction($controller, $method, $aArgs = [])
//    {
//        $oInit = new $controller;
//        call_user_func_array([$oInit, $method], $aArgs);
//    }
    protected $requestMethod;
    protected $aDynamicRouter;
    protected $currentRawController;
    private $aParam = [];


    public function get($route, $controller)
    {
        $this->aRouter['GET'][$route] = $controller;
        if (strpos($route, '{') !== false) {
            $this->aDynamicRouter['GET'][$route] = $controller;
        }

        return $this;
    }

    public function post($route, $controller)
    {
        $this->aRouter['POST'][$route] = $controller;
        if (strpos($route, '{') !== false) {
            $this->aDynamicRouter['POST'][$route] = $controller;
        }

        return $this;
    }

    public static function generateRegex($dynamicRoute)
    {
        return preg_replace_callback('/{[a-zA-Z0-9]+}/', function ($aMatches) {
            return '([a-zA-Z0-9]+)';
        }, $dynamicRoute);
    }

    /**
     * @param $route
     *
     * @return bool
     */
    protected function isRouteExists($route)
    {

        if (isset($this->aRouter[$this->requestMethod][$route])) {
            $this->currentRawController = $this->aRouter[$this->requestMethod][$route];

            return true;
        }
        if (!isset($this->aDynamicRouter[$this->requestMethod]))
        {
            return false;
        }
        else {
            foreach ($this->aDynamicRouter[$this->requestMethod] as $dynamicRoute => $rawController) {
                $regex = $this->generateRegex($dynamicRoute);
                if (preg_match('@^' . $regex . '@', $route, $aMatches)) {
                    $this->currentRawController = $rawController;
                    unset($aMatches[0]);
                    $this->aParam = array_values($aMatches);

                    return true;
                }
            }
        }
        return false;
    }

    protected function getController()
    {
        return $this->currentRawController;
    }

    public function callAction($controller, $method)
    {
        if (!App::get($controller)) {
            $oInstance = new $controller;
            App::bind($controller, $oInstance);
        }
        call_user_func_array([App::get($controller), $method], $this->aParam); // Controller -> method(id)
    }

    private function reset()
    {
        $this->aParam = [];
    }

    public function direct($route, $requestMethod)
    {
        $this->reset();
        $this->requestMethod = $requestMethod;
        if ($this->isRouteExists($route)) {
            $aParseRoute = explode('@', $this->currentRawController);
            try {
                return $this->callAction(...$aParseRoute);
            } catch (Exception $e) {

            }
        }
        else{
            $aParseRoute=['MyProject\Controller\PageNotFound','loadView'];
            $this->callAction($aParseRoute[0],$aParseRoute[1]);
        }
    }
}
