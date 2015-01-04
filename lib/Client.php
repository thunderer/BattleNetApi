<?php
namespace Thunder\BlizzardApi;

final class Client
    {
    const REGION_EUROPE = 1;
    const REGION_UNITED_STATES = 2;
    const REGION_KOREA = 3;
    const REGION_TAIWAN = 4;
    const REGION_CHINA = 5;

    protected static $hosts = array(
        self::REGION_EUROPE => 'eu.api.battle.net',
        self::REGION_UNITED_STATES => 'us.api.battle.net',
        self::REGION_KOREA => 'kr.api.battle.net',
        self::REGION_TAIWAN => 'tw.api.battle.net',
        self::REGION_CHINA => 'www.battlenet.com.cn',
        );
    private static $locales = array(
        self::REGION_EUROPE => array('en_GB', 'es_ES', 'fr_FR', 'ru_RU', 'de_DE', 'pt_PT', 'it_IT'),
        self::REGION_UNITED_STATES => array('en_US', 'es_MX', 'pt_BR'),
        self::REGION_KOREA => array('ko_KR'),
        self::REGION_TAIWAN => array('zh_TW'),
        self::REGION_CHINA => array('zh_CN'),
        );

    private $application;
    private $region;
    private $locale;
    private $connector;

    public function __construct(Application $application, $region, $locale, ConnectorInterface $connector)
        {
        $this->application = $application;
        $this->setRegion($region);
        $this->setLocale($locale);
        $this->connector = $connector;
        }

    private function setRegion($region)
        {
        if(!array_key_exists($region, static::$hosts))
            {
            $msg = 'Invalid region identifier %s!';
            throw new \InvalidArgumentException(sprintf($msg, $region));
            }

        $this->region = $region;
        }

    private function setLocale($locale)
        {
        if(!in_array($locale, static::$locales[$this->region]))
            {
            $msg = 'Invalid locale %s for region %s!';
            throw new \InvalidArgumentException(sprintf($msg, $locale, $this->region));
            }

        $this->locale = $locale;
        }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function getResponse(RequestInterface $request)
        {
        $targetUrl = $this->getCallUrl($request->getPath());
        $rawResponse = $this->connector->getResponse($targetUrl);

        return $request->getResponse($rawResponse);
        }

    private function getCallUrl($path)
        {
        return 'https://'.static::$hosts[$this->region].'/'.$path.http_build_query(array(
            'locale' => $this->locale,
            'access_token' => $this->application->getKey(),
            ));
        }
    }
