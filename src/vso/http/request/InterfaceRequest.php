<?php declare(strict_types=1);

namespace vso\http\request;

use vso\http\response\InterfaceResponse;

/**
 *
 * @author Andrés Reyes a.k.a. Undercoder a.k.a. Jacobopus <chess.coach.ar@gmail.com>
 *
 */
interface InterfaceRequest
{

    /**
     * post
     *
     * @return AbstractRequest
     * @throws BadMethodCallException
     */
    public function post() : AbstractRequest;

    /**
     * get
     *
     * @return AbstractRequest
     * @throws BadMethodCallException
     */
    public function get() : AbstractRequest;

    /**
     * put
     *
     * @return AbstractRequest
     * @throws BadMethodCallException
     */
    public function put() : AbstractRequest;

    /**
     * delete
     *
     * @return AbstractRequest
     * @throws BadMethodCallException
     */
    public function delete() : AbstractRequest;

    /**
     * patch
     *
     * @return AbstractRequest
     * @throws BadMethodCallException
     */
    public function patch() : AbstractRequest;

    /**
     * options
     *
     * @return AbstractRequest
     * @throws BadMethodCallException
     */
    public function options() : AbstractRequest;


    public function isMethodSupported(string $httpMethod) : bool;

    /**
     * getSupportedHttpMethod
     *
     * @return string[]
     */
    public function getSupportedHttpMethod() : array;

    /**
     * answer
     *
     * @param InterfaceResponse $response
     * @return void
     */
    public function answer(InterfaceResponse $response, int $bitmask = JSON_THROW_ON_ERROR) : void;
}
