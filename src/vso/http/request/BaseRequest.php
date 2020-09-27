<?php declare(strict_types=1);

namespace vso\http\request;

use \vso\vsoutils\stringutils\StringUtils;
use \vso\vsoutils\globalutils\Post;
use \vso\vsoutils\globalutils\Get;
use \vso\http\request\InterfaceRequest;
use \vso\http\response\InterfaceResponse;
use \Closure;

class BaseRequest implements InterfaceRequest
{

    public function __construct(
        array $serverRef,
        Closure $onInit = null,
        Closure $onEnd = null,
        Closure $onResponse = null
    ) {
        $this->settings['SANITIZE_SPECIAL_CHARS'] = false;

        $this->onInit = function () {
        };
        $this->onEnd = function () {
        };
        $this->onResponse = function () {
        };

        if (!is_null($onInit)) {
            $this->onInit = $onInit;
        }
        if (!is_null($onEnd)) {
            $this->onEnd = $onEnd;
        }
        if (!is_null($onResponse)) {
            $this->onResponse = $onResponse;
        }

        $this->bootstrap($serverRef);
    }

    private function bootstrap($serverRef)
    {
        $stUtils = new StringUtils();
        foreach ($serverRef as $key => $value) {
            $this->{$stUtils->toCamelCase($key)} = $value;
        }
    }

    private function seizeRequestParams($serverRef)
    {
        $stUtils = new StringUtils();
        foreach ($serverRef as $key => $value) {
            $this->params[ $stUtils->toCamelCase($key) ] = $value;
        }
    }
    

    public function getSupportedHttpMethod() : array
    {
        return [ 'get', 'post' ];
    }

    public function isMethodSupported(string $httpMethod) : bool
    {
        return in_array($httpMethod, $this->getSupportedHttpMethod());
    }
    
    public function post() : void
    {
        if ($this->isMethodSupported('post')) {
            $this->seizeRequestParams(Post::fetch());
        }
        $this->unsupportedMethod('post');
    }

    public function get() : void
    {
        if ($this->isMethodSupported('get')) {
            $this->seizeRequestParams(Get::fetch());
        }
        $this->unsupportedMethod('get');
    }

    public function put() : void
    {
        if ($this->isMethodSupported('put')) {
            return;
        }
        $this->unsupportedMethod('put');
    }

    public function delete() : void
    {
        if ($this->isMethodSupported('delete')) {
            return;
        }
        $this->unsupportedMethod('delete');
    }

    public function patch() : void
    {
        if ($this->isMethodSupported('patch')) {
            return;
        }
        $this->unsupportedMethod('patch');
    }

    public function options() : void
    {
        if ($this->isMethodSupported('options')) {
            return;
        }
        $this->unsupportedMethod('options');
    }

    public function answer(InterfaceResponse $response, int $bitmask = JSON_THROW_ON_ERROR) : void
    {
        $response->send($bitmask);
    }

    private function unsupportedMethod(string $method) : void
    {
        throw new \BadMethodCallException('method '. $method . ' not supported in class ' . __CLASS__);
    }
}
