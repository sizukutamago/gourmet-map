<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 12:45
 */
declare(strict_types=1);

namespace Acme\Infrastructures\Adapters;


use GuzzleHttp\Client;

class APIClient
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get()
    {

    }

    public function post()
    {

    }
}
