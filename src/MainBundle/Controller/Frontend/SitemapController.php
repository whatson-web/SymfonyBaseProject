<?php

namespace MainBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use WH\LibBundle\Entity\Status;

/**
 * Class SitemapController
 *
 * @package MainBundle\Controller\Frontend
 */
class SitemapController extends Controller
{
    /**
     * @Route("/sitemap.{_format}", name="ft_main_sitemap_index", requirements={"_format": "xml"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->get('doctrine')->getManager();

        $sitemapUrls = [];

        $pages = $em->getRepository('CmsBundle:Page')->get(
            'all',
            [
                'conditions' => [
                    'page.status' => Status::$STATUS_PUBLISHED,
                ],
            ]
        );

        foreach ($pages as $page) {
            switch ($page->getLvl()) {
                case 0:
                    $priority = '1';
                    break;

                case 1:
                    $priority = '0.9';
                    break;
                default:
                    $priority = '0.8';
                    break;
            }

            $sitemapUrls[] = [
                'loc'        => $this->generateUrl(
                    'ft_wh_seo_router_dispatch',
                    [
                        'url' => $page->getUrl()->getUrl(),
                    ],
                    UrlGeneratorInterface::ABSOLUTE_URL
                ),
                'changefreq' => 'weekly',
                'priority'   => $priority,
            ];
        }

//        $otherEntities = $em->getRepository('ExempleBundle:OtherEntity')->get(
//            'all',
//            [
//                'conditions' => [
//                    'otherEntity.status' => Status::$STATUS_PUBLISHED,
//                ],
//            ]
//        );
//
//        foreach ($otherEntities as $otherEntity) {
//            $sitemapUrls[] = [
//                'loc'        => $this->generateUrl(
//                    'ft_wh_seo_router_dispatch',
//                    [
//                        'url' => $otherEntity->getUrl()->getUrl(),
//                    ],
//                    UrlGeneratorInterface::ABSOLUTE_URL
//                ),
//                'changefreq' => 'weekly',
//                'priority'   => '0.8',
//            ];
//        }

        return $this->render(
            '@Main/Frontend/Sitemap/index.xml.twig',
            [
                'urls' => $sitemapUrls,
            ]
        );
    }
}