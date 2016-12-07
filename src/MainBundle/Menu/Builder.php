<?php

namespace MainBundle\Menu;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\Menu\FactoryInterface;

/**
 * Class Builder
 *
 * @package MainBundle\Menu
 */
class Builder extends Controller
{

	/**
	 * @param FactoryInterface $factory
	 * @param array            $options
	 *
	 * @return \Knp\Menu\ItemInterface
	 */
	public function headerMenu1(FactoryInterface $factory, array $options = array())
	{
		$em = $this->getDoctrine()->getManager();

		$pageRepository = $em->getRepository('WHCmsBundle:Page');

		$pages = $pageRepository->get(
			'all',
			array(
				'conditions' => array(
					'page.menus LIKE' => '%header_menu_1%',
				),
			)
		);

		$menu = $factory->createItem(
			'root'
		);

		foreach ($pages as $page) {
			$menu->addChild(
				$page->getSlug(),
				array(
					'route'           => 'ft_wh_seo_router_dispatch',
					'routeParameters' => array(
						'url' => $page->getUrl()->getUrl(),
					),
					'label'           => $page->getName(),
				)
			);
		}

		return $menu;
	}

	/**
	 * @param FactoryInterface $factory
	 * @param array            $options
	 *
	 * @return \Knp\Menu\ItemInterface
	 */
	public function headerMenu2(FactoryInterface $factory, array $options = array())
	{
		$em = $this->getDoctrine()->getManager();

		$pageRepository = $em->getRepository('WHCmsBundle:Page');

		$pages = $pageRepository->get(
			'all',
			array(
				'conditions' => array(
					'page.menus LIKE' => '%header_menu_2%',
				),
			)
		);

		$sousPages = array();
		foreach ($pages as $page) {
			if ($page->getLvl() > 1) {
				$sousPages[$page->getParent()->getId()][] = $page;
			}
		}

		$menu = $factory->createItem(
			'root',
			array(
				'childrenAttributes' => array(
					'class' => 'nav navbar-nav',
				),
			)
		);

		foreach ($pages as $page) {

			if ($page->getLvl() == 1) {
				$menu->addChild(
					$page->getSlug(),
					array(
						'route'           => 'ft_wh_seo_router_dispatch',
						'routeParameters' => array(
							'url' => $page->getUrl()->getUrl(),
						),
						'label'           => $page->getName(),
					)
				);

				if (!empty($sousPages[$page->getId()])) {
					$this->headerSubMenu2($menu, $page->getSlug(), $sousPages[$page->getId()]);
				}
			}
		}

		return $menu;
	}

	/**
	 * @param $node
	 * @param $slug
	 * @param $sousPages
	 *
	 * @return mixed
	 */
	public function headerSubMenu2($node, $slug, $sousPages)
	{
		foreach ($sousPages as $sousPage) {
			$node[$slug]->addChild(
				$sousPage->getSlug(),
				array(
					'route'           => 'ft_wh_seo_router_dispatch',
					'routeParameters' => array(
						'url' => $sousPage->getUrl()->getUrl(),
					),
					'label'           => $sousPage->getName(),
				)
			);
		}

		return $node;
	}

	/**
	 * @param FactoryInterface $factory
	 * @param array            $options
	 *
	 * @return \Knp\Menu\ItemInterface
	 */
	public function footerMenu1(FactoryInterface $factory, array $options = array())
	{
		$em = $this->getDoctrine()->getManager();

		$pageRepository = $em->getRepository('WHCmsBundle:Page');

		$pages = $pageRepository->get(
			'all',
			array(
				'conditions' => array(
					'page.menus LIKE' => '%footer_menu_1%',
				),
			)
		);

		$menu = $factory->createItem(
			'root'
		);

		foreach ($pages as $page) {
			$menu->addChild(
				$page->getSlug(),
				array(
					'route'           => 'ft_wh_seo_router_dispatch',
					'routeParameters' => array(
						'url' => $page->getUrl()->getUrl(),
					),
					'label'           => $page->getName(),
				)
			);
		}

		return $menu;
	}

	/**
	 * @param FactoryInterface $factory
	 * @param array            $options
	 *
	 * @return \Knp\Menu\ItemInterface
	 */
	public function footerMenu2(FactoryInterface $factory, array $options = array())
	{
		$em = $this->getDoctrine()->getManager();

		$pageRepository = $em->getRepository('WHCmsBundle:Page');

		$pages = $pageRepository->get(
			'all',
			array(
				'conditions' => array(
					'page.menus LIKE' => '%footer_menu_2%',
				),
			)
		);

		$menu = $factory->createItem(
			'root'
		);

		foreach ($pages as $page) {
			$menu->addChild(
				$page->getSlug(),
				array(
					'route'           => 'ft_wh_seo_router_dispatch',
					'routeParameters' => array(
						'url' => $page->getUrl()->getUrl(),
					),
					'label'           => $page->getName(),
				)
			);
		}

		return $menu;
	}

}
