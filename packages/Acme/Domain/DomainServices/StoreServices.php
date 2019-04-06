<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 16:52
 */

namespace Acme\Domain\DomainServices;


use Acme\Domain\Entities\StoreCollection;
use Acme\Domain\Repositories\StoreRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StoreServices
{
    /**
     * @var StoreRepositoryInterface
     */
    private $repository;

    public function __construct(StoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function save(StoreCollection $storeCollection): void
    {
        DB::beginTransaction();

        $this->repository->delete();
        $this->repository->save($storeCollection);

        DB::commit();
    }
}
