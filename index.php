<?php

$memcached = new Memcached();
$servers = [
    ['memcached', 11211],
    ['memcached2', 11211],
    ['memcached3', 11211],
    ['memcached4', 11211]
];
$memcached->addServers($servers);
// $memcached->addServer('memcached', 11211);

$key = 'sample_key';
$value = 'Hello, Memcached!';

// Set value in cache
$memcached->set($key, $value);

// Get value from cache
$cachedValue = $memcached->get($key);

echo "Cached Value: " . $cachedValue;

function run($memcached) {
    foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9] as $a) {
        $key = "foo" . $a;
        $value = "bar" . $a;
        $memcached->set($key, $value, 3600);
    }
}

run($memcached);

function read($memcached) {
    foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9] as $a) {
        $key = "foo" . $a;
        $data = $memcached->get($key);
        echo "<br/>" . $key . " : " . $data;
    }
}

read($memcached);
?>
