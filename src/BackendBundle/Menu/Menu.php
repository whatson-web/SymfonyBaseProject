<?php

namespace BackendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class Menu
 *
 * @package BackendBundle\Menu
 */
class Menu implements ContainerAwareInterface
{

	use ContainerAwareTrait;

	/**
	 * @param FactoryInterface $factory
	 *
	 * @return \Knp\Menu\ItemInterface
	 */
	public function backendMenu(FactoryInterface $factory)
	{
		$menuClass = 'nav navbar-nav';

		$menu = $factory->createItem(
			'root',
			array(
				'childrenAttributes' => array(
					'class' => $menuClass,
				),
			)
		);

		$menu->addChild(
			'home',
			array(
				'label'  => $this->getLabel('home', 'Accueil'),
				'route'  => 'bk_wh_dashboard',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		$menu->addChild(
			'users',
			array(
				'label'  => $this->getLabel('user', 'Utilisateurs'),
				'route'  => 'bk_wh_user_user_index',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		$menu->addChild(
			'parameters',
			array(
				'label'  => $this->getLabel('cog', 'Paramètres'),
				'route'  => 'bk_wh_parameter_parameter_index',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		return $menu;
	}

	/**
	 * @param FactoryInterface $factory
	 *
	 * @return \Knp\Menu\ItemInterface
	 */
	public function backendMenuRight(FactoryInterface $factory)
	{
		$menuClass = 'nav navbar-nav navbar-right';

		$menu = $factory->createItem(
			'root',
			array(
				'childrenAttributes' => array(
					'class' => $menuClass,
				),
			)
		);

		$welcomeLabel = 'Bienvenue dans l\'interface d\'administration de "';
		$welcomeLabel .= $this->container->getParameter('project_name') . '"';
		$menu->addChild(
			'projectName',
			array(
				'label'           => $welcomeLabel,
				'extras'          => array(
					'safe_label' => true,
				),
				'labelAttributes' => array(
					'class' => 'm-r-sm text-muted welcome-message',
				),
			)
		);

		$menu->addChild(
			'parameters',
			array(
				'label'  => $this->getLabel('sign-out', 'Déconnexion'),
				'route'  => 'bk_wh_user_security_logout',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		return $menu;
	}

	/**
	 * @param FactoryInterface $factory
	 *
	 * @return \Knp\Menu\ItemInterface
	 */
	public function superAdminMenu(FactoryInterface $factory)
	{
		$menuClass = 'nav navbar-nav';

		$menu = $factory->createItem(
			'root',
			array(
				'childrenAttributes' => array(
					'class' => $menuClass,
				),
			)
		);

		$menu->addChild(
			'home',
			array(
				'label'  => $this->getLabel('home', 'Accueil'),
				'route'  => 'sudo_wh_dashboard',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		$menu->addChild(
			'seo',
			array(
				'label'  => $this->getLabel('google', 'SEO', true),
				'uri'    => '#',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		$menu['seo']->addChild(
			'configurations',
			array(
				'label'  => $this->getLabel('cog', 'Configurations'),
				'route'  => 'sudo_wh_seo_config_preview',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		$menu['seo']->addChild(
			'urls',
			array(
				'label'  => $this->getLabel('link', 'Urls'),
				'route'  => 'sudo_wh_seo_url_index',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		$menu['seo']->addChild(
			'redirections',
			array(
				'label'  => $this->getLabel('long-arrow-right', 'Redirections'),
				'route'  => 'sudo_wh_seo_redirection_index',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		$menu->addChild(
			'commands',
			array(
				'label'  => $this->getLabel('terminal', 'Commandes'),
				'route'  => 'sudo_wh_superadmin_command_list',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		return $menu;
	}

	/**
	 * @param FactoryInterface $factory
	 *
	 * @return \Knp\Menu\ItemInterface
	 */
	public function superAdminMenuRight(FactoryInterface $factory)
	{
		$menuClass = 'nav navbar-nav navbar-right';

		$menu = $factory->createItem(
			'root',
			array(
				'childrenAttributes' => array(
					'class' => $menuClass,
				),
			)
		);

		$welcomeLabel = 'Bienvenue dans l\'interface d\'administration ultra secrète de "';
		$welcomeLabel .= $this->container->getParameter('project_name') . '"';
		$menu->addChild(
			'projectName',
			array(
				'label'           => $welcomeLabel,
				'extras'          => array(
					'safe_label' => true,
				),
				'labelAttributes' => array(
					'class' => 'm-r-sm text-muted welcome-message',
				),
			)
		);

		$menu->addChild(
			'parameters',
			array(
				'label'  => $this->getLabel('sign-out', 'Déconnexion'),
				'route'  => 'bk_wh_user_security_logout',
				'extras' => array(
					'safe_label' => true,
				),
			)
		);

		return $menu;
	}

	/**
	 * @param      $icon
	 * @param      $label
	 * @param bool $hasChildren
	 *
	 * @return string
	 */
	private function getLabel($icon, $label, $hasChildren = false)
	{
		$html = '<i class="fa fa-' . $icon . '"></i>';
		$html .= '<span class="nav-label">' . $label . '</span>';
		if ($hasChildren) {
			$html .= '<span class="fa arrow"></span>';
		}

		return $html;
	}

}