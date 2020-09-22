<?php declare(strict_types=1);

namespace vso\requests;

/**
 *
 * @author jacob
 *
 */
interface InterfaceRequest
{
    public function response(int $status, string $statusMessage, $data = null);
}
