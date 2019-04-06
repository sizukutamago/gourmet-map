<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 7:29
 */
declare(strict_types=1);

namespace Acme\Domain\Entities;

use Acme\Domain\ValueObjects\Store\Geolocation;
use Acme\Domain\ValueObjects\Store\StoreId;
use Illuminate\Support\Facades\DB;

class Store
{
    /**
     * @var StoreId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Geolocation
     */
    private $geolocation;

    /**
     * @var null|string
     */
    private $genre;

    /**
     * @var null|string
     */
    private $comment;

    public function __construct(StoreId $id, string $name, Geolocation $geolocation, ?string $genre = null, ?string $comment = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->geolocation = $geolocation;
        $this->genre = $genre;
        $this->comment = $comment;
    }

    public function getId(): StoreId
    {
        return $this->getId();
    }

    public function toDatabase(): array
    {
        return [
            'id' => $this->getId()->getId(),
            'name' => $this->name,
            'geolocation' => DB::raw("(GeomFromText('POINT({$this->geolocation->getLat()} {$this->geolocation->getLng()})'))"),
            'genre' => $this->genre,
            'comment' => $this->comment,
        ];
    }
}
