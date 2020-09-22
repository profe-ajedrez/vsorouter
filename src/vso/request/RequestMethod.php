<?php declare(strict_types=1);

namespace vso\requests;

/**
 * RequestMethod
 *
 * Encapsulates the switch case to call request methods
 */
abstract class RequestMethod
{
    /**
     * call
     *
     * Calls the corresponding method in the implemented InterfaceRequestMethod $callableMethod
     * Returning its result.
     *
     * @param string $method
     * @param InterfaceRequestMethod $callableMethod
     * @param InterfaceRequest $request
     *
     * @return mixed
     */
    public function call(string $method, InterfaceRequestMethod $callableMethod, InterfaceRequest $request)
    {
        switch ($method) {
            case 'POST':
                return $callableMethod->post($request);
                break;
            case 'GET':
                return $callableMethod->get($request);
                break;
            case 'PUT':
                return $callableMethod->put($request);
                break;
            case 'DELETE':
                return $callableMethod->delete($request);
                break;
            case 'PATCH':
                return $callableMethod->patch($request);
                break;
        }
    }
}
