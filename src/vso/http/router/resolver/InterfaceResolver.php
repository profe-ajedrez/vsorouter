<?php declare(strict_types=1);

namespace vso\http\router\resolver;

use \vso\http\router\InterfaceRouter;

/**
 * InterfaceResolver
 *
 * A Resolver is a class which implements
 * how match and resolve the url routes
 * Encapsulates the algorithm to resolve resgistered Router Class url routes
 */
interface InterfaceResolver
{
    /**
     * resolve
     *
     * Resolves url routes
     *
     * @param \vso\http\router\InterfaceRouter $router
     * @return void
     */
    public function resolve(InterfaceRouter $router) : void;

    /**
     * matchRoute
     *
     * Checks if a route is valid, has been registered
     *
     * @param \vso\http\router\InterfaceRouter $router
     * @return string
     */
    public function matchRoute(InterfaceRouter $router, string $route, string $method) : string;

    /**
     * getMethod404
     *
     * Returns the callable which handles the 404 http error
     *
     * @param array $routes
     * @return callable
     */
    public function getMethod404Handler(array $routes) : callable;
}
