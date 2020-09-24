<?php declare(strict_types=1);

namespace vso\http\router;

use \vso\http\request\InterfaceRequest;
use \vso\http\router\resolver\InterfaceResolver;

interface InterfaceRouter
{
    public function dispatch() : void;
    public function setRequest(InterfaceRequest $request) : void;
    public function setResolver(InterfaceResolver $resolver) : void;
    public function defaultRequestHandler() :  void;
    public function invalidMethodHandler() : void;
}
