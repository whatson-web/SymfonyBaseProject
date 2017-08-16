<?php

namespace CmsBundle\Repository;

use WH\LibBundle\Repository\BaseRepository;

/**
 * Class ContactRepository
 *
 * @package CmsBundle\Repository
 */
class ContactRepository extends BaseRepository
{
    public $entityName = 'contact';

    public $joins = [
        'page'   => '',
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
    public $baseOrders = [
    ];
}
