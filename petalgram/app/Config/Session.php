<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Session extends BaseConfig
{
    public string $driver = 'CodeIgniter\Session\Handlers\FileHandler';
    public string $cookieName = 'ci_session';
    public string $savePath = WRITEPATH . 'session';
    public int $matchIP = false;
    public int $timeToUpdate = 300;
    public bool $regenerateDestroy = false;
}
