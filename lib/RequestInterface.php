<?php
namespace Thunder\BlizzardApi;

interface RequestInterface
    {
    /**
     * Returns API endpoint URL path fragment
     *
     * @return string
     */
    public function getPath();

    /**
     * Parse raw JSON string response into desired value
     *
     * @param $response
     *
     * @return mixed
     */
    public function getResponse($response);
    }
