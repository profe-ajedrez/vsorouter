<?php
namespace vso\requests;

interface InterfaceMethod
{
    public function post(InterfaceRequest $request);
    public function get(InterfaceRequest $request);
    public function put(InterfaceRequest $request);
    public function delete(InterfaceRequest $request);
    public function patch(InterfaceRequest $request);        
}

