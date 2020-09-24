<?php declare(strict_types=1);

namespace vso\http\router\resolver;

use \vso\http\router\InterfaceRouter;

class RestfulResolver implements InterfaceResolver
{
    public function resolve(InterfaceRouter $router) : void
    {
        $httpMethod = strtoupper($router->request->requestMethod);
        $methodDictionary = $router->routes[$httpMethod];
        $formatedRoute = trim(trim($router->request->requestUri), '/');

        $matchedRoute = $this->matchRoute($router, $formatedRoute, $httpMethod);
        if ((bool) $matchedRoute) {
            if (array_key_exists($matchedRoute, $methodDictionary)) {
                $method = $methodDictionary[$matchedRoute];
                if (is_null($method) || !is_callable($method)) {
                    $router->defaultRequestHandler();
                    return;
                }
                $method($router->request);
                return;
            }
        }

        $router->defaultRequestHandler();
    }



    public function matchRoute(InterfaceRouter $router, string $route, string $method) : string
    {
        $activeRoutes = array_keys($router->routes[$method]);

        if ($this->checkForRoot($route, $method) || empty($route) &&
            (in_array('/', $activeRoutes))) {
            return '/';
        }

        $maskedRoute = $this->getMask($route);
        $match = preg_grep($maskedRoute, $activeRoutes);

        if (!empty($match)) {
            /** Route found */
            return array_values($match)[0];
        }
        
        return '';
    }


    /**
     * checkForRoot
     *
     * Checks if route is document root
     *
     *
     * @param string $route
     * @return void
     */
    protected function checkForRoot(string $route)
    {
        if (empty($route)) {
            $route = '/';
        }

        if ($route === '/') {
            return true;
        }
        return false;
    }


    /**
     * getMask
     *
     * Builds the regexp used to match the urls in the form
     * /element/:param/element/:param...
     *
     * @param string $route
     * @return String       A string regexp
     */
    private function getMask(string $route)
    {
        $maskedRoute = '';
        $urlData = explode('/', $route);
        $index = 0;
        foreach ($urlData as $urlSegment) {
            $segment = "\/\:?[a-z0-9áéíóúÁÉÍÓÚÄËÏÖÜäëïöü\!\"\#\$\%\-\_\.\,\:\;\?\¡\¿\!\ñ\Ñ]+\/";
            if ($index % 2 === 0) {
                $segment = $urlSegment;
            }
            $maskedRoute .= $segment;
            $index++;
        }

        $lastChar = substr($maskedRoute, -1);
        if ($lastChar === '/') {
            $maskedRoute = substr($maskedRoute, 0, strlen($maskedRoute) -2);
        }

        return "/^" . $maskedRoute . "$/i";
    }
}
