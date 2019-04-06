<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 15:37
 */

namespace Acme\Domain\ValueObjects\Store;


class Geolocation
{
    private $lat;

    private $lng;

    public function __construct(float $lat, float $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * @return string
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @return string
     */
    public function getLng(): float
    {
        return $this->lng;
    }
}
