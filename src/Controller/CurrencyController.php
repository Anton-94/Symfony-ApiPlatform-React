<?php

namespace App\Controller;

use App\DTO\CurrencyDTO;
use App\Exception\ApiException;
use App\Form\CurrencyForm;
use App\Service\CurrencyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurrencyController extends AbstractController
{
    private CurrencyService $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * @Route("/", name="currency_index")
     */
    public function index(Request $request): Response
    {
        $currencyDTO = new CurrencyDTO();
        $form = $this->createForm(CurrencyForm::class, $currencyDTO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $currencyData = $this->currencyService->getCurrencyRates($currencyDTO);

                return $this->render('currency/show.html.twig', [
                    'currencyData' => $currencyData
                ]);
            } catch (ApiException $e) {
                $this->addFlash('errors', $e->getMessage());
            }
        }

        return $this->render('currency/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}