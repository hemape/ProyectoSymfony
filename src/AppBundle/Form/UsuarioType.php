<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('username', TextType::class)
            ->add('plainPassword', RepeatedType::class, array(
                     'type' => PasswordType::class,
                     'first_options'  => array('label' => 'Password'),
                     'second_options' => array('label' => 'Repeat Password'),
                 ))
            ->add('Edad', NumberType::class)
            ->add('Poblacion', TextType::class)
            ->add('Puntos', NumberType::class)
            ->add('Enviar', SubmitType::class)
        ;
    }

}
