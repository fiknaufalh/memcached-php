<?php
  $memcached = new Memcached();
  $memcached->addServer('memcached', 11211);

  $key = 'sample_key';
  $value = 'Hello, Memcached!';

  // Set value in cache
  $memcached->set($key, $value);

  // Get value from cache
  $cachedValue = $memcached->get($key);

  echo "Cached Value: " . $cachedValue;
?>
