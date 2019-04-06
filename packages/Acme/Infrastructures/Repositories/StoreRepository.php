<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 16:13
 */

namespace Acme\Infrastructures\Repositories;


use Acme\Domain\Entities\Store;
use Acme\Domain\Entities\StoreCollection;
use Acme\Domain\Repositories\StoreRepositoryInterface;
use Acme\Domain\ValueObjects\Store\StoreId;

class StoreRepository implements StoreRepositoryInterface
{
    /**
     * @var \App\Models\Store
     */
    private $eloquent;

    public function __construct(\App\Models\Store $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param StoreId $id
     * @return Store
     */
    public function getStore(StoreId $id): Store
    {
        // TODO: Implement getStore() method.
    }

    /**
     * @return StoreCollection
     */
    public function getStoreList(): StoreCollection
    {
        // TODO: Implement getStoreList() method.
    }

    /**
     * @param StoreCollection $storeCollection
     */
    public function save(StoreCollection $storeCollection): void
    {
        foreach ($storeCollection as $store) {
            $this->eloquent->create($store->toDatabase());
        }
    }

    public function delete(): void
    {
        $this->eloquent->query()->delete();
    }
}