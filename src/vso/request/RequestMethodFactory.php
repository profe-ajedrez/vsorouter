<?php
namespace vso\requests;

class RequestMethodFactory
{
    public static function getMethod(string $method, InterfaceMethod $callableMethod, InterfaceRequest $request)
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

