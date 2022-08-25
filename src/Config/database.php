<?php

namespace Sanjid\Phpblog\Config;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

const DATABASE = 'phpblog';
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const ENVIRONMENT = 'local'; // local | production
const LOG = true; // true | false
$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();