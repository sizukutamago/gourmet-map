<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 12:53
 */
declare(strict_types=1);

namespace Acme\Infrastructures\Adapters;


use Acme\Domain\Adapters\LoadStoreInfomationInterface;
use Acme\Domain\Entities\Store;
use Acme\UseCases\LoadFile\StoreCollectionRequest;
use Illuminate\Http\UploadedFile;

class GoogleSpreadSheetAdapter implements LoadStoreInfomationInterface
{
    /**
     * @var UploadedFile
     */
    private $file;

    /**
     * GoogleSpreadSheetAdapter constructor.
     * @param UploadedFile $file
     */
    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function load(): StoreCollectionRequest
    {
        $storeCollectionRequest = new StoreCollectionRequest();
        $lines = explode("\r\n", $this->file->get());
        foreach ($lines as $key => $line) {
            if ($key === 0) {
                continue;
            }

            $record = explode(",",$line);

            switch (parse_url($record[1], PHP_URL_HOST)) {
                case 'tabelog.com':
                    $storeInfo = new TabelogAdapter($record[1]);
                default:
                    continue;
            }

            $storeCollectionRequest->add(
                $record[0],
                $storeInfo,
                $record[2],
                $record[3]
            );
        }
        return $storeCollectionRequest;
    }
}
