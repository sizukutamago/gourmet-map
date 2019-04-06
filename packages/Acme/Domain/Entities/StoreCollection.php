<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 14:34
 */
declare(strict_types=1);

namespace Acme\Domain\Entities;


class StoreCollection implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $list = [];

    /**
     * @param Store $store
     */
    public function add(Store $store): void
    {
        $this->list[] = $store;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this->list as $store) {
            $array[] = $store->toArray();
        }

        return $array;
    }
}
