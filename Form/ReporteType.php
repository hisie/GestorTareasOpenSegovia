<?php

namespace Opensegovia\GestorTiempoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ReporteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('fechaReporte')
            ->add('horasReportadas')
            ->add('comentario')
            ->add('created_at')
            ->add('proyecto')
        ;
    }

    public function getName()
    {
        return 'opensegovia_gestortiempobundle_reportetype';
    }
}
