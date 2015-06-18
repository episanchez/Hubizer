<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HB\ConnectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('country', 'country')
                ->add('city', 'text')
                ->add('domain', 'text')
                ->add('describe', 'textarea');
    }

    public function getParent()
    {
        return 'fos_user_group';
    }
    public function getName()
    {
        return 'hb_connect_user_group';
    }
}