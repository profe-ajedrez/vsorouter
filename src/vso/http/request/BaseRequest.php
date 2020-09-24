<?php declare(strict_types=1);

namespace vso\http\request;

use vso\http\request\AbstractRequest;
use vso\http\request\InterfaceRequest;
use vso\http\response\InterfaceResponse;
use \Closure;

class BaseRequest extends AbstractRequest implements InterfaceRequest
{

    public function __construct(
        array $serverRef,
        Closure $onInit = null,
        Closure $onEnd = null,
        Closure $onResponse = null
    ) {
        parent::__construct(
            $serverRef,
            $onInit,
            $onResponse,
            $onEnd
        );
    }

    public function getSupportedHttpMethod() : array
    {
        return [ 'get', 'post' ];
    }

    public function isMethodSupported(string $httpMethod) : bool
    {
        return in_array($httpMethod, $this->getSupportedHttpMethod());
    }
    
    public function post() : AbstractRequest
    {
        if ($this->isMethodSupported('post')) {
            $this->seizeRequestParams($_POST);
            return $this;
        }
        $this->unsupportedMethod('post');
    }

    public function get() : AbstractRequest
    {
        if ($this->isMethodSupported('get')) {
            $this->seizeRequestParams($_GET);
            return $this;
        }
        $this->unsupportedMethod('get');
    }

    public function put() : AbstractRequest
    {
        if ($this->isMethodSupported('put')) {
            return $this;
        }
        $this->unsupportedMethod('put');
    }

    public function delete() : AbstractRequest
    {
        if ($this->isMethodSupported('delete')) {
            return $this;
        }
        $this->unsupportedMethod('delete');
    }

    public function patch() : AbstractRequest
    {
        if ($this->isMethodSupported('patch')) {
            return $this;
        }
        $this->unsupportedMethod('patch');
    }

    public function options() : AbstractRequest
    {
        if ($this->isMethodSupported('options')) {
            return $this;
        }
        $this->unsupportedMethod('options');
    }

    public function answer(InterfaceResponse $response, int $bitmask = JSON_THROW_ON_ERROR) : void
    {
        $response->send($bitmask);
    }
}
