<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 15:06
 */

namespace Acme\Infrastructures\Adapters;


use Acme\Domain\Adapters\GetStoreInfomationInterface;
use Acme\Domain\ValueObjects\Store\Geolocation;
use Acme\UseCases\LoadFile\StoreCollectionRequest;

class TabelogAdapter implements GetStoreInfomationInterface
{
    /**
     * @var StoreCollectionRequest
     */
    private $request;

    public function __construct(string $url)
    {
        $this->request = $url;
    }

    public function getGeolocation(): Geolocation
    {
        return new Geolocation('133', '32');
    }
}
