<?php

namespace CmsBundle\Controller\Frontend;

use Symfony\Component\HttpFoundation\Request;
use WH\BackendBundle\Controller\Backend\BaseController;
use WH\LibBundle\Entity\Status;

/**
 * Class HomeController
 *
 * @package CmsBundle\Controller\Frontend
 */
class HomeController extends BaseController
{
    /**
     * @param         $id
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id, Request $request)
    {
        $em = $this->get('doctrine')->getManager();

        $pageRepository = $em->getRepository('CmsBundle:Page');
        $homeRepository = $em->getRepository('CmsBundle:Home');

        $page = $pageRepository->get(
            'one',
            [
                'conditions' => [
                    'page.id'     => $id,
                    'page.status' => Status::$STATUS_PUBLISHED,
                ],
            ]
        );

        $home = $homeRepository->get(
            'one',
            [
                'conditions' => [
                    'page.id'     => $id,
                    'page.status' => Status::$STATUS_PUBLISHED,
                ],
            ]
        );

        $pageTemplate = $page->getPageTemplateSlug();
        $pageTemplates = $this->getParameter('wh_cms_templates');
        $pageTemplate = $pageTemplates[$pageTemplate];

        $breadcrumb = $pageRepository->getPath($page);

        return $this->render(
            $pageTemplate['frontView'],
            [
                'home'       => $home,
                'page'       => $page,
                'breadcrumb' => $breadcrumb,
            ]
        );
    }

}
