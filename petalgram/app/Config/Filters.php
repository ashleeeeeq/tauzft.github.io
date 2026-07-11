<?php

namespace Config;

use CodeIgniter\Config\FiltersConfig;

class Filters extends FiltersConfig
{
    public array $globals = [
        'before' => [],
        'after'  => [],
    ];

    public array $methods = [];

    public array $filters = [];
}
