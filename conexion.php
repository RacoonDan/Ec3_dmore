<?php

var_dump([
    'MYSQLHOST' => getenv('MYSQLHOST'),
    'MYSQLPORT' => getenv('MYSQLPORT'),
    'MYSQLUSER' => getenv('MYSQLUSER'),
    'MYSQLDATABASE' => getenv('MYSQLDATABASE')
]);

exit;
