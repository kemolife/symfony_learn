<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 30.07.17
 * Time: 20:23
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class CommentsAdmin extends AbstractAdmin
{

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' => array(),
                )
            ))
            ->add('massage')
            ->add('author','entity', array(
                'class' => 'AppBundle\Entity\User',
                'choice_label' => 'username',
            ))
            ->add('created');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('created', 'doctrine_orm_datetime', array('field_type'=>'sonata_type_datetime_picker',))
            ->add('author', null, array(), 'entity', array(
                'class' => 'AppBundle\Entity\User',
                'choice_label' => 'username',
            ));
    }
}