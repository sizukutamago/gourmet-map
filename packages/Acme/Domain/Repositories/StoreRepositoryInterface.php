<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 7:40
 */
declare(strict_types=1);

namespace Acme\Domain\Repositories;


use Acme\Domain\Entities\Store;
use Acme\Domain\Entities\StoreCollection;
use Acme\Domain\ValueObjects\Store\StoreId;

interface StoreRepositoryInterface
{
    /**
     * @param StoreId $id
     * @return Store
     */
    public function getStore(StoreId $id): Store;

    /**
     * @return StoreCollection
     */
    public function getStoreList(): StoreCollection;

    public function save(StoreCollection $storeCollection): void;

    public function delete(): void;
}
