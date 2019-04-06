<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 14:57
 */

namespace Acme\UseCases\LoadFile;


use Acme\Domain\Adapters\GetStoreInfomationInterface;

class StoreCollectionRequest implements \IteratorAggregate
{
    private $list = [];

    public function add(string $name, GetStoreInfomationInterface $url, string $genre = null, string $comment = null): void
    {
        $this->list[] = [
            'name' => $name,
            'url' => $url,
            'genre' => $genre,
            'comment' => $comment
        ];
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }
}
