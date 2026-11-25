<?php

namespace App\Controller;

use App\Form\RegistroType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RegistroController extends AbstractController
{
    #[Route('/registro', name: 'app_registro')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(RegistroType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            return $this->render('registro/response.html.twig', [
                'data' => $data,
                'renderData' => [
                    'nombre' => $data['nombre'],
                    'email' => $data['email'],
                    'edad' => $data['edad'],
                    'fecha_nacimiento' => $data['fecha_nacimiento'],
                    'genero' => $data['genero'],
                    'acepta_condiciones' => $data['acepta_condiciones'],
                ],
            ]);
        }

        return $this->render('registro/index.html.twig', [
            'form' => $form,
        ]);
    }
}
