<?php declare(strict_types=1);

namespace vso\http\router;

use \InvalidArgumentException;
use \vso\vsoutils\typeutils\TypeUtils;
use \vso\http\request\InterfaceRequest;
use vso\http\response\InterfaceHttpResponseCodes;
use \vso\http\router\resolver\InterfaceResolver;

define('ROUTE', 0);
define('METHOD', 1);

/**
 *
 * @author Undercoder
 *
 */
class BaseRouter implements InterfaceRouter
{
    protected InterfaceRequest $request;
    protected array $routes;
    protected InterfaceResolver $resolver;

    public function __construct(InterfaceRequest $request, InterfaceResolver $resolver)
    {
        if (is_null($request)) {
            throw new \InvalidArgumentException(
                'InterfaceRequest expected. Null provided in ' . __CLASS__ . '::' . __METHOD__
            );
        }
        if (is_null($resolver)) {
            throw new \InvalidArgumentException(
                'InterfaceResolver expected. Null provided in ' . __CLASS__ . '::' . __METHOD__
            );
        }

        $this->resolver = $resolver;
        $this->request  = $request;

        $this->routes = [];
        foreach ($this->supportedHttpMethods as $method) {
            $this->routes[$method]  = [];
        }
    }


    public function __get(string $property)
    {
        if ($property === 'supportedHttpMethods') {
            return $this->request->getSupportedHttpMethod();
        }
        if ($property === 'request') {
            return $this->request;
        }
        if ($property === 'routes') {
            return $this->routes;
        }
    }

    public function setRequest(InterfaceRequest $request) : void
    {
        if (is_null($request)) {
            throw new InvalidArgumentException(
                'InterfaceRequest expected, null provided in ' . __CLASS__ . '::' . __METHOD__
            );
        }
        $this->request = $request;
    }

    public function setResolver(InterfaceResolver $resolver) : void
    {
        if (is_null($resolver)) {
            throw new InvalidArgumentException(
                'InterfaceResolver expected, null provided in ' . __CLASS__ . '::' . __METHOD__
            );
        }
        $this->request = $resolver;
    }

    public function get(string $url, \Closure $requestHandler) : void
    {
        $this->requestMethodHandler('get', $url, $requestHandler);
    }

    public function post(string $url, \Closure $requestHandler) : void
    {
        $this->requestMethodHandler('post', $url, $requestHandler);
    }

    public function put(string $url, \Closure $requestHandler) : void
    {
        $this->invalidMethodHandler();
    }

    public function patcht(string $url, \Closure $requestHandler) : void
    {
        $this->invalidMethodHandler();
    }

    public function delete(string $url, \Closure $requestHandler) : void
    {
        $this->invalidMethodHandler();
    }

    public function options(string $url, \Closure $requestHandler) : void
    {
        $this->invalidMethodHandler();
    }

    /**
     * Receives calls to methods GET, POST, PUT, DELETE AND PATCH
     *
     * @param string $name
     * @param array $args
     * @throws \InvalidArgumentException
     */
    private function requestMethodHandler(string $requestMethodName, string $url, \Closure $requestHandler)
    {
        if (!in_array(strtoupper($requestMethodName), $this->supportedHttpMethods)) {
            $this->invalidMethodHandler();
        }

        if (empty($url)) {
            throw new \InvalidArgumentException(
                'Se esperaba string {url} como primer argumento en ' . __CLASS__ . '::' . $requestMethodName . '()'
            );
        }

        if (is_null($requestHandler)) {
            throw new \InvalidArgumentException(
                'Se esperaba callable {requestHandler} como segundo argumento en '
                . __CLASS__ . '::' . $requestMethodName
            );
        }

        $typeUtils = new TypeUtils();

        if (!is_callable($requestHandler) && !$typeUtils->isClosure($requestHandler)) {
            throw new \InvalidArgumentException(
                'Se esperaba a callable o closure object como segundo argumento en ' 
                . __CLASS__ . '::' . $requestMethodName
            );
        }

   
        $requestMethodName = strtoupper($requestMethodName);
        $route  = trim(trim($url), '/');
        $route  = (empty($route) ? '/' : $route);
        $method = $requestHandler;

        $this->routes[$requestMethodName][$route] = $method;
    }


    /**
     * Resolves a route
     */
    public function dispatch() : void
    {
        $this->resolver->resolve($this);
    }

    public function invalidMethodHandler() : void
    {
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }


    public function defaultRequestHandler() : void
    {
        header("{$this->request->serverProtocol} 404 Not Found");
    }
}
