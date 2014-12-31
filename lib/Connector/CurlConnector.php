<?php
namespace Thunder\BlizzardApi\Connector;

use Thunder\BlizzardApi\ConnectorInterface;

class CurlConnector implements ConnectorInterface
    {
    public function getResponse($url)
        {
        $curl = curl_init($url);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            ));
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
        }
    }
