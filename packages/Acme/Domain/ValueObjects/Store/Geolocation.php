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

    public function __construct(string $lat, string $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @return string
     */
    public function getLng(): string
    {
        return $this->lng;
    }
}
