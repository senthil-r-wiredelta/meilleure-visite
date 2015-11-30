<?php

namespace WireDelta\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
		$builder->add('date', 'text');
        $builder->add('description', 'text');
    }

    public function getName()
    {
        return 'new_event';
    }
}
