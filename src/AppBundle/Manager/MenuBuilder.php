<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 06.08.17
 * Time: 16:29
 */

namespace AppBundle\Manager;

use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root',
            array(
                'childrenAttributes'    => array(
                    'class'             => 'nav navbar-nav',
                ),
            )
        );
        $menu->addChild('Home', array('route' => 'blog'));
        $menu->addChild('Login', array('route' => 'fos_user_security_login'));
        $menu->addChild('Logout', array('route' => 'fos_user_security_logout'));

        return $menu;
    }
}