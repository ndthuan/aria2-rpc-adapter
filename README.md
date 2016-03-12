# aria2-rpc-adapter
Simple Aria2 RPC Adapter. More info about Aria2: https://aria2.github.io/.

# How to enable RPC mode
* Simple mode: `aria2c --enable-rpc --rpc-listen-all`
* Token-enabled mode: `aria2c --enable-rpc --rpc-listen-all --rpc-secret=MySecretToken`

# Adapter usage example
```php
<?php

require 'vendor/autoload.php';

$client = new \JsonRPC\Client('http://localhost:6800/jsonrpc');
$adapter = new \Ndthuan\Aria2RpcAdapter\Adapter($client);

print_r(
    $adapter->getGlobalStat()
);

var_dump(
    $adapter->addUri(
        ['http://google.com'],
        ['dir' => getenv('HOME') . '/Downloads']
    )
);

print_r(
    $adapter->tellActive()
);
```
