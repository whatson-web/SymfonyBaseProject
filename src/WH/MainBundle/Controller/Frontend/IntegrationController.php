<?php

namespace WH\MainBundle\Controller\Frontend;

use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IntegrationController
 *
 * @package WH\MainBundle\Controller\Frontend
 */
class IntegrationController extends Controller
{

	private $categories = array(
		array(
			'name'  => 'Pages classiques',
			'slug'  => 'Pages',
			'pages' => array(
				'classicExample',
				'exampleWithController',
			),
		),
	);

	private $pages = array(
		'classicExample'        => array(
			'slug' => 'classicExample',
			'name' => 'Classic example',
		),
		'exampleWithController' => array(
			'slug'       => 'exampleWithController',
			'name'       => 'Example with controller',
			'controller' => 'APPMainBundle:Integration:exampleWithController',
		),
	);

	/**
	 * Retourne les catégories avec les informations des pages
	 *
	 * @return mixed
	 */
	private function getCategories()
	{
		$categories = $this->categories;

		foreach ($categories as &$category) {
			foreach ($category['pages'] as &$page) {
				$page = $this->pages[$page];
			}
		}

		return $categories;
	}

	/**
	 * @Route("/integration/{slug}", name="bk_wh_main_integration_index", defaults={"slug": null})
	 *
	 * @param null $slug
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function indexAction($slug = null)
	{
		if ($slug) {
			$page = $this->pages[$slug];

			$page['view'] = 'WHMainBundle:Frontend/Integration:';

			foreach ($this->categories as $category) {
				if (in_array($page['slug'], $category['pages'])) {
					$page['view'] .= $category['slug'] . '/';
				}
			}
			$page['view'] .= $page['slug'] . '.html.twig';

			if (!empty($page['controller'])) {
				return $this->forward(
					$page['controller'],
					array(
						'page' => $page,
					)
				);
			}

			return $this->render(
				$page['view']
			);
		}

		return $this->render(
			'WHMainBundle:Frontend/Integration:index.html.twig',
			array(
				'pages'      => $this->pages,
				'categories' => $this->getCategories(),
			)
		);
	}

	/**
	 * @param $page
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function exampleWithControllerAction($page)
	{
		$form = $this->createFormBuilder()
			->add(
				'field1',
				TextType::class,
				array(
					'label' => 'Label : ',
				)
			)
			->getForm();

		return $this->render(
			$page['view'],
			array(
				'form' => $form->createView(),
			)
		);
	}
}