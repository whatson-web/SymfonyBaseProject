<?php

namespace CmsBundle\Repository;

use WH\LibBundle\Repository\BaseRepository;

/**
 * Class HomeFileRepository
 *
 * @package CmsBundle\Repository
 */
class HomeFileRepository extends BaseRepository
{
    public $entityName = 'homeFile';

    public $baseOrders = [
        'homeFile.position' => 'DESC',
    ];
}
