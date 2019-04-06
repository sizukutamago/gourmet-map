<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 15:02
 */

namespace Acme\Domain\Adapters;


use Acme\Domain\ValueObjects\Store\Geolocation;

interface GetStoreInfomationInterface
{
    public function getGeolocation(): Geolocation;
}
