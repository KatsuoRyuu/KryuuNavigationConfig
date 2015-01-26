<?php

namespace KryuuNavigationConfig;

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

use Zend\Mvc\MvcEvent;
use Zend\View\HelperPluginManager;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\Permissions\Acl\Resource\GenericResource;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
	public function getViewHelperConfig()
	{
		return array(
			'factories' => array(
				// This will overwrite the native navigation helper
				'navigation' => function(HelperPluginManager $pm) {
					$sm = $pm->getServiceLocator();
					$authorize = $sm->get('BjyAuthorizeServiceAuthorize');
					$acl = $authorize->getAcl();
					$role = $authorize->getIdentity();
					// Get an instance of the proxy helper
					$navigation = $pm->get('Zend\View\Helper\Navigation');
					// Store ACL and role in the proxy helper:
					$navigation->setAcl($acl)
							->setRole($role);
					// Return the new navigation helper instance
					return $navigation;
				}
			)
		);
	}

}
