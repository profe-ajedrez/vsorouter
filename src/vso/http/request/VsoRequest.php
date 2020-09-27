<?php

namespace vso\http\request;

use \Closure;
use \vso\vsoutils\stringutils\StringUtils;

/**
 * AbstractRequest
 * @author Andrés Reyes a.k.a. Undercoder a.k.a. Jacobopus <chess.coach.ar@gmail.com>
 *
 * Provides a base Request.
 *
 * Provides hooks to execute callables in certain events
 */
class VsoRequest
{

    protected array $settings = [];
    protected Closure $onInit;
    protected Closure $onEnd;
    protected Closure $onResponse;
    protected array $params;

    /**
     */
    public function __construct(
        array $serverRef,
        Closure $onInit = null,
        Closure $onEnd = null,
        Closure $onResponse = null
    ) {
        $this->settings['SANITIZE_SPECIAL_CHARS'] = false;
        if (is_null($onInit)) {
            $this->onInit = function () {
            };
        } else {
            $this->onInit = $onInit;
        }
        if (is_null($onEnd)) {
            $this->onEnd = function () {
            };
        } else {
            $this->onEnd = $onEnd;
        }
        if (is_null($onResponse)) {
            $this->onResponse = function () {
            };
        } else {
            $this->onResponse = $onResponse;
        }

        $this->bootstrap($serverRef);
    }
    

    protected function bootstrap($serverRef)
    {
        $stUtils = new StringUtils();
        foreach ($serverRef as $key => $value) {
            $this->{$stUtils->toCamelCase($key)} = $value;
        }
    }

    protected function seizeRequestParams($serverRef)
    {
        $stUtils = new StringUtils();
        foreach ($serverRef as $key => $value) {
            $this->params[ $stUtils->toCamelCase($key) ] = $value;
        }
    }

    
    protected function unImplementedMethod(string $method) : void
    {
        throw new \BadMethodCallException('method ' . __CLASS__ . '::' . $method . ' not implemented');
    }

    protected function unsupportedMethod(string $method) : void
    {
        throw new \BadMethodCallException('method '. $method . ' not supported in class ' . __CLASS__);
    }
}
