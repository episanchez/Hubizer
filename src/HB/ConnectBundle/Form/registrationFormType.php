<?php

namespace HB\ConnectBundle\Form;

use HB\ConnectBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder->add('city', 'text');
        $builder->add('country', 'country');
        $builder->add('birth_date', 'birthday');
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'hb_connect_registration';
    }
}