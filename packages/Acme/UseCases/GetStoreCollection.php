<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 17:30
 */

namespace Acme\UseCases;


use Acme\Domain\Entities\StoreCollection;
use Acme\Domain\Repositories\StoreRepositoryInterface;

class GetStoreCollection
{
    private $repository;

    public function __construct(StoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): StoreCollection
    {
        return $this->repository->getStoreList();
    }
}
