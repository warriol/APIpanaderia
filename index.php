<?php

$config = require "../.env";

echo 'MY_ENV_VAR: ' . $config['DB_HOST'] . "<br>";


phpinfo();