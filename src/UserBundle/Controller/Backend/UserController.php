<?php

namespace UserBundle\Controller\Backend;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use WH\UserBundle\Controller\Backend\UserController as BaseController;

/**
 * @Route("/admin/users")
 *
 * Class UserController
 *
 * @package UserBundle\Controller\Backend
 */
class UserController extends BaseController
{

    public $bundlePrefix = '';
    public $bundle = 'UserBundle';
    public $entity = 'User';

    /**
     * @Route("/index/", name="bk_user_user_index")
     *
     * @param Request $request
     *
     * @return string
     */
    public function indexAction(Request $request)
    {
        $indexController = $this->get('bk.wh.back.index_controller');

        return $indexController->index($this->getEntityPathConfig(), $request);
    }

    /**
     * @Route("/create/", name="bk_user_user_create")
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function createAction(Request $request)
    {
        $createController = $this->get('bk.wh.back.create_controller');

        return $createController->create($this->getEntityPathConfig(), $request);
    }

    /**
     * @Route("/update/{id}", name="bk_user_user_update")
     *
     * @param         $id
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction($id, Request $request)
    {
        $updateController = $this->get('bk.wh.back.update_controller');

        return $updateController->update($this->getEntityPathConfig(), $id, $request);
    }

    /**
     * @Route("/delete/{id}", name="bk_user_user_delete")
     *
     * @param         $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {
        $deleteController = $this->get('bk.wh.back.delete_controller');

        return $deleteController->delete($this->getEntityPathConfig(), $id);
    }

}
