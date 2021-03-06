<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 13:29
 */
declare(strict_types=1);

namespace Acme\UseCases;


use Acme\Domain\DomainServices\StoreServices;
use Acme\Domain\Entities\StoreCollection;
use Acme\Domain\Factories\StoreFactory;
use Acme\Domain\Repositories\StoreRepositoryInterface;
use Acme\Infrastructures\Adapters\GoogleSpreadSheetAdapter;
use Illuminate\Http\UploadedFile;

class LoadFile
{
    /**
     * @var StoreFactory
     */
    private $factory;

    /**
     * @var StoreServices
     */
    private $services;

    public function __construct(StoreFactory $factory, StoreServices $services)
    {
        $this->factory = $factory;
        $this->services = $services;
    }

    public function __invoke(UploadedFile $uploadedFile): void
    {
        switch ($uploadedFile->getClientOriginalExtension()) {
            case 'csv':
                $storeAdapter = new GoogleSpreadSheetAdapter($uploadedFile);
                break;
            default:
                throw new \Exception();
        }

        $storeCollectionRequest = $storeAdapter->load();

        $storeCollection = new StoreCollection();
        foreach ($storeCollectionRequest as $store) {
            $storeCollection->add(
                $this->factory->new(
                    $store['name'],
                    $store['url']->getGeolocation(),
                    $store['genre'],
                    $store['comment']
                )
            );
        }

        $this->services->save($storeCollection);
    }
}
