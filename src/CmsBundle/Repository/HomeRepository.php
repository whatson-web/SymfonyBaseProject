<?php

namespace CmsBundle\Repository;

use WH\LibBundle\Repository\BaseRepository;

/**
 * Class HomeRepository
 *
 * @package CmsBundle\Repository
 */
class HomeRepository extends BaseRepository
{
    public $entityName = 'home';

    public $joins = [
        'page'   => [],
        'url'    => [
            'joinEntity' => 'page',
        ],
        'metas'  => [
            'joinEntity' => 'page',
        ],
        'parent' => [
            'joinEntity' => 'page',
        ],
    ];

    public $baseJoins = [
        'page',
        'url',
        'metas',
        'parent',
    ];
    public $baseOrders = [];
}
