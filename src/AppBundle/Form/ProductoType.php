<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NombreProducto', TextType::class)
            ->add('Precio', NumberType::class)
            ->add('Categoria', TextType::class)
            ->add('Imagen', TextType::class)
            ->add('Enviar', SubmitType::class)
        ;
    }
}
