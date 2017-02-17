<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * Class AppKernel
 */
class AppKernel extends Kernel
{

	public function __construct($environment, $debug)
	{
		parent::__construct($environment, $debug);
		date_default_timezone_set('Europe/Paris');
	}

	public function registerBundles()
	{
		$bundles = array(
			new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
			new Symfony\Bundle\SecurityBundle\SecurityBundle(),
			new Symfony\Bundle\TwigBundle\TwigBundle(),
			new Symfony\Bundle\MonologBundle\MonologBundle(),
			new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
			new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
			new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
			new Symfony\Bundle\AsseticBundle\AsseticBundle(),
			new WH\LibBundle\WHLibBundle(),
			new WH\BackendTemplateBundle\WHBackendTemplateBundle(),
			new WH\BackendBundle\WHBackendBundle(),
			new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
			new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
			new WH\SuperAdminBundle\WHSuperAdminBundle(),
			new Knp\Bundle\MenuBundle\KnpMenuBundle(),
			new WH\SeoBundle\WHSeoBundle(),
			new Oneup\FlysystemBundle\OneupFlysystemBundle(),
			new FM\ElfinderBundle\FMElfinderBundle(),
			new WH\MediaBundle\WHMediaBundle(),
			new FOS\UserBundle\FOSUserBundle(),
			new WH\UserBundle\WHUserBundle(),
			new cspoo\Swiftmailer\MailgunBundle\cspooSwiftmailerMailgunBundle(),
			new Http\HttplugBundle\HttplugBundle(),
			new WH\ParameterBundle\WHParameterBundle(),
			new MainBundle\MainBundle(),
			new BackendBundle\BackendBundle(),
            new UserBundle\UserBundle(),
        );

		if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
			$bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
			$bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
			$bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
			$bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
			$bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
		}

		return $bundles;
	}

	public function registerContainerConfiguration(LoaderInterface $loader)
	{
		$loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
	}
}
