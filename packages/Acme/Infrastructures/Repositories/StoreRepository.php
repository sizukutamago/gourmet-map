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
use Acme\Domain\Factories\StoreFactory;
use Acme\Domain\Repositories\StoreRepositoryInterface;
use Acme\Domain\ValueObjects\Store\StoreId;

class StoreRepository implements StoreRepositoryInterface
{
    /**
     * @var \App\Models\Store
     */
    private $eloquent;

    /**
     * @var StoreFactory
     */
    private $factory;

    public function __construct(\App\Models\Store $eloquent, StoreFactory $factory)
    {
        $this->eloquent = $eloquent;
        $this->factory = $factory;
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
        $stores = $this->eloquent->latlong()->get();
        $storeCollection = new StoreCollection();
        foreach ($stores as $store) {
            $storeCollection->add(
                $this->factory->forDatabase(
                    $store->id,
                    $store->name,
                    $store->lat,
                    $store->lng,
                    $store->genre,
                    $store->comment
                )
            );
        }

        return $storeCollection;
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
