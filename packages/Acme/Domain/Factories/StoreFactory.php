<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 16:00
 */

namespace Acme\Domain\Factories;


use Acme\Domain\Entities\Store;
use Acme\Domain\ValueObjects\Store\Geolocation;
use Acme\Domain\ValueObjects\Store\StoreId;
use Ramsey\Uuid\Uuid;

class StoreFactory
{
    /**
     * @param string $name
     * @param Geolocation $geolocation
     * @param null|string $genre
     * @param null|string $comment
     * @return Store
     * @throws \Exception
     */
    public function new(string $name, Geolocation $geolocation, ?string $genre, ?string $comment): Store
    {
        return new Store(
            new StoreId(Uuid::uuid4()->toString()),
            $name,
            $geolocation,
            $genre,
            $comment
        );
    }

    public function forDatabase(string $id, string $name, float $lat, float $lng, ?string $genre, ?string $comment): Store
    {
        return new Store(
            new StoreId($id),
            $name,
            new Geolocation($lat, $lng),
            $genre,
            $comment
        );
    }
}
