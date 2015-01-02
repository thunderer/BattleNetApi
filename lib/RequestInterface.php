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
     * Returns parser object capable of transforming raw response into entities
     *
     * @return ParserInterface
     */
    public function getParser();
    }
