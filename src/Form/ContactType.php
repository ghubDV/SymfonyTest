<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::Class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'This field cannot be empty.']),
                    new Assert\Length([
                        'min'        => 3,
                        'max'        => 30,
                        'minMessage' => 'Your name must be at least {{ limit }} characters long.',
                        'maxMessage' => 'Your name must be less than {{ limit }} characters long.',
                    ]),
                    new Assert\Regex([
                        "pattern" => "/^[a-z]+$/i",
                        "htmlPattern" => "^[a-zA-Z]+$",
                        "message" => "Your name must only contain letters."
                    ])
                ],
            ])
            ->add('email',EmailType::Class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'This field cannot be empty.']),
                    new Assert\Email([
                        "message" => "The email {{ value }} is not a valid."
                    ])
                ],
            ])
            ->add('message',TextareaType::Class, [
                'constraints' => [
                    new Assert\Length([
                        'max'        => 255,
                        'maxMessage' => 'Your message must be less than {{ limit }} characters long.',
                    ]),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
