<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class RegistrationJSONController extends AbstractController
{
    /**
     * @Route("/RegisterJSON/new", name="RegisterJSON")
     * @param Request $request
     * @param NormalizerInterface $Normalizer
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function RegisterJSON(Request $request,NormalizerInterface $Normalizer , UserPasswordEncoderInterface $encoder): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setFirstName($request->query->get('first_name'));
        $user->setLastName($request->query->get('last_name'));
        $user->setGenre($request->query->get('genre'));
        $user->setRole($request->query->get('role'));
        $user->setPicture($request->query->get('picture'));
//        $user->setBirthday($request->query->get('birthday'));
        $hash = $encoder->encodePassword($user,$request->query->get("hash"));
        $user->setAdresse($request->query->get('adresse'));
        $user->setHash($hash);
        $user->setCin($request->query->get('cin'));
        $user->setEmail($request->query->get('email'));
        $user->setPhoneNumber($request->query->get('phone_number'));


        $entityManager->persist($user);
        $entityManager->flush();
        $json = $Normalizer ->normalize($user, 'json',['groups'=>'post:read']);
        return new Response(json_encode($json));
    }
}