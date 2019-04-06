<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 14:33
 */
declare(strict_types=1);

namespace Acme\Domain\Adapters;


use Acme\UseCases\LoadFile\StoreCollectionRequest;

interface LoadStoreInfomationInterface
{
    public function load(): StoreCollectionRequest;
}
