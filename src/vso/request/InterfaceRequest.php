<?php
namespace vso\requests;

/**
 *
 * @author jacob
 *        
 */
interface InterfaceRequest
{
    public function getBody();
    public function response(int $status, string $statusMessage, $data = null);
}

