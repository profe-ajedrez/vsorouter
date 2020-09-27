<?php declare(strict_types=1);

namespace vso\http\router;

use \vso\http\request\InterfaceRequest;
use \vso\http\router\resolver\InterfaceResolver;

/**
 * interface InterfaceRouter
 *
 * Classes implementing this interface have the responsability of
 * register and handle
 * the url routes of the app, paring an url with a closure which
 * receives a instance of InterfaceRequest
 *
 * The get, post, put, delete, patch methods should be implemented only
 * when the method is supported by the InterfaceRequest impllementing class,
 * when the method is not supported, this should response with a 405 Method Not Allowed.
 */
interface InterfaceRouter
{
    /**
     * dispatch
     *
     * Resolves the registered routes
     * @return void
     */
    public function dispatch() : void;

    /**
     * setRequest
     *
     * Sets the request that this router has to answer
     * @param \vso\http\request\InterfaceRequest $request
     * @return void
     */
    public function setRequest(InterfaceRequest $request) : void;

    /**
     * setResolver
     *
     * Sets the class which has to resolve the response of the request directed for this router
     *
     * @param \vso\http\router\resolver\InterfaceResolver $resolver
     * @return void
     */
    public function setResolver(InterfaceResolver $resolver) : void;

    /**
     * defaultRequestHandler
     *
     * Handles the default response when the route is not found
     * @return void
     */
    public function defaultRequestHandler() :  void;

    /**
     * invalidMethodHandler
     *
     * Handles the response when http request method is not supported
     * @return void
     */
    public function invalidMethodHandler() : void;

    public function get(string $url, \Closure $requestHandler) : void;
    public function post(string $url, \Closure $requestHandler) : void;
    public function put(string $url, \Closure $requestHandler) : void;
    public function patcht(string $url, \Closure $requestHandler) : void;
    public function delete(string $url, \Closure $requestHandler) : void;
    public function options(string $url, \Closure $requestHandler) : void;
}
