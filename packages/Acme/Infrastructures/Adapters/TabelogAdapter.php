<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2019/04/06
 * Time: 15:06
 */

namespace Acme\Infrastructures\Adapters;


use Acme\Domain\Adapters\GetStoreInfomationInterface;
use Acme\Domain\ValueObjects\Store\Geolocation;

class TabelogAdapter implements GetStoreInfomationInterface
{
    /**
     * @var string
     */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getGeolocation(): Geolocation
    {
        $html = file_get_contents($this->url);
        $dom = \phpQuery::newDocument($html);
        $query = [];
        parse_str(parse_url($dom['.js-map-lazyload']->attr('data-original'), PHP_URL_QUERY),$query);
        $geolocation = explode(',', $query['center']);
        return new Geolocation($geolocation[0], $geolocation[1]);
    }
}
