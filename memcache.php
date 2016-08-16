<?php

$ip=$argv[1];
$m = new Memcached();
$m->addServer($ip, 11211);
$k=md5(rand());
$v=md5(rand());
$m->set($k, $v);
$m->quit();

$start=microtime(true);

for ($i = 1; $i <= 1000; $i++) {
  $m->addServer($ip, 11211);
  $value=$m->get($k);
  $m->quit();
}

$end=microtime(true);

echo $end - $start;
