<?php
namespace Thunder\BlizzardApi;

interface RequestInterface
    {
    public function getPath();

    /**
     * @return ParserInterface
     */
    public function getParser();
    }
