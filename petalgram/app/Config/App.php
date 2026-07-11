<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    public string $baseURL = 'http://localhost:8080';
    public string $indexPage = '';
    public string $uriProtocol = 'REQUEST_URI';
    public string $appName = 'Petalgram - Flower Shop';
    public bool $forceGlobalSecureRequests = false;
    public string $defaultLocale = 'en';
    public string $supportedLocales = ['en'];
}
