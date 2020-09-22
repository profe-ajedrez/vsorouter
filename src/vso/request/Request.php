<?php declare(strict_types=1);

namespace vso\requests;

use vso\vsoutils\stringutils\StringUtils;

/**
 *
 * @author jacob
 *
 *
 * @property string $requestMethod
 */
class Request implements InterfaceRequest
{

    protected $settings = [];

    /**
     */
    public function __construct($serverRef)
    {
        $this->settings['SANITIZE_SPECIAL_CHARS'] = false;
        $this->bootstrap($serverRef);
    }

    public function setSanitizeSpecialCharsON()
    {
        $this->settings['SANITIZE_SPECIAL_CHARS'] = true;
    }

    public function setSanitizeSpecialCharsOFF()
    {
        $this->settings['SANITIZE_SPECIAL_CHARS'] = false;
    }

    protected function bootstrap($serverRef)
    {
        $stUtils = new StringUtils();
        foreach ($serverRef as $key => $value) {
            $this->{$stUtils->toCamelCase($key)} = $value;
        }
    }

    
    public function response(int $status, string $statusMessage, $data = null)
    {
        header("HTTP/1.1 " . $status);
        $response['status'] = $status;
        $response['status_message'] = $statusMessage;
        $response['data'] = $data;

        $jsonResponse = json_encode($response);
        echo $jsonResponse;
    }
}
