<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 14:42
 */

namespace Acme\Domain\ValueObjects\Store;


class StoreId
{
    /**
     * @var string
     */
    private $id;

    /**
     * StoreId constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function equals(StoreId $storeId): bool
    {
        return $this->id === $storeId->getId();
    }
}
