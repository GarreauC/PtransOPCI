<?php
/**
 * Created by PhpStorm.
 * User: Anha
 * Date: 07/05/15
 * Time: 11:04
 */

namespace EthnoDoc\Elastica;

use FOS\ElasticaBundle\Logger\ElasticaLogger;
use Psr\Log\LoggerInterface;


class DisabledElasticaLogger extends ElasticaLogger
{
    public function logQuery($path, $method, $data, $time, $connection = Array(), $query = Array()) {
        // DISABLED
    }
} 