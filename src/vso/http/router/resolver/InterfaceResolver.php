<?php declare(strict_types=1);

namespace vso\http\router\resolver;

use \vso\http\router\InterfaceRouter;

interface InterfaceResolver
{
    public function resolve(InterfaceRouter $router) : void;

    /**
     * Undocumented function
     *
     * @param \vso\http\router\InterfaceRouter $router
     * @return string
     */
    public function matchRoute(InterfaceRouter $router, string $route, string $method) : string;
}
