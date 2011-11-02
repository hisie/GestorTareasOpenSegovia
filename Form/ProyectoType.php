<?php

namespace Opensegovia\GestorTiempoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProyectoType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('fechaEntrega')
            ->add('horasAcumuladas')
        ;
    }

    public function getName()
    {
        return 'opensegovia_gestortiempobundle_proyectotype';
    }
}
