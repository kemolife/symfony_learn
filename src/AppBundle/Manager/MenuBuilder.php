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
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', array('route' => 'blog'));

        return $menu;
    }
}