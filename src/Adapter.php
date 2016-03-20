<?php

namespace Ndthuan\Aria2RpcAdapter;

use JsonRPC\Client;

/**
 * Aria2 RPC Adapter
 *
 * For complete list of methods, see https://aria2.github.io/manual/en/html/aria2c.html#methods
 *
 * @method array getGlobalStat
 * @method string addUri(array $uris, array $options = []) Returns the GID of the newly registered download.
 * @method array tellStatus(string $gid, array $keys = []) Returns status of a download.
 * @method array tellActive(array $keys = [])
 */
class Adapter
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $token;

    /**
     * Adapter constructor.
     *
     * @param Client $client
     * @param $token
     */
    public function __construct(Client $client, $token = '')
    {
        $this->client = $client;
        $this->token = $token;
    }

    /**
     * Make a call to Aria2 RPC
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if ($this->token) {
            array_unshift($arguments, 'token:' . $this->token);
        }

        return $this->client->execute('aria2.' . $name, $arguments);
    }
}
