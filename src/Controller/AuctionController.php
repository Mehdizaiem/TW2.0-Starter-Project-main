<?php

namespace App\Controller;

use App\Entity\Auction;
use App\Form\AuctionType;
use App\Repository\AuctionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/auction')]
class AuctionController extends AbstractController
{
    #[Route('/', name: 'app_auction_index', methods: ['GET'])]
    public function index(AuctionRepository $auctionRepository): Response
    {
        return $this->render('auction/index.html.twig', [
            'auctions' => $auctionRepository->findAll(),
        ]);
    }
    #[Route('/new', name: 'app_auction_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $auction = new Auction();
        $form = $this->createForm(AuctionType::class, $auction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle file upload
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $uploadsDirectory = $this->getParameter('uploads_directory');
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'.'.$imageFile->guessExtension();

                // Move the uploaded file to the desired directory with its original name
                $imageFile->move(
                    $uploadsDirectory,
                    $newFilename
                );

                $auction->setImgpath($newFilename); // Set the image path to the original filename
            }

            // Persist auction to the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($auction);
            $entityManager->flush();

            // Redirect to the index page
            return $this->redirectToRoute('app_auction_index');
        }

        return $this->render('auction/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }



    #[Route('/{id}', name: 'app_auction_show', methods: ['GET'])]
    public function show(Auction $auction): Response
    {
        return $this->render('auction/show.html.twig', [
            'auction' => $auction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_auction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Auction $auction, AuctionRepository $auctionRepository): Response
    {
        $form = $this->createForm(AuctionType::class, $auction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle file upload
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $uploadsDirectory = $this->getParameter('uploads_directory');
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'.'.$imageFile->guessExtension();

                // Move the uploaded file to the desired directory with its original name
                $imageFile->move(
                    $uploadsDirectory,
                    $newFilename
                );

                $auction->setImgpath($newFilename); // Set the image path to the original filename
            }

            // Persist changes to the database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('app_auction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('auction/edit.html.twig', [
            'auction' => $auction,
            'form' => $form,
        ]);
    }


    #[Route('/{id}', name: 'app_auction_delete', methods: ['POST'])]
    public function delete(Request $request, Auction $auction, AuctionRepository $auctionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $auction->getId(), $request->request->get('_token'))) {
            $auctionRepository->delete($auction);
        }

        return $this->redirectToRoute('app_auction_index', [], Response::HTTP_SEE_OTHER);
    }
}
