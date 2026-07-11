<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

class Autoload extends AutoloadConfig
{
    public array $psr4 = [
        APPPATH . 'Controllers' => 'App\Controllers',
        APPPATH . 'Models'      => 'App\Models',
        APPPATH . 'Config'      => 'App\Config',
        APPPATH . 'Libraries'   => 'App\Libraries',
        APPPATH . 'Helpers'     => 'App\Helpers',
        APPPATH . 'Filters'     => 'App\Filters',
    ];

    public array $classmap = [];
}
