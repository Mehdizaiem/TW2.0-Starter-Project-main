<?php

namespace App\Controller;

use App\Entity\Auction;
use App\Entity\Bid;
use App\Entity\Users;
use App\Form\BidType;
use App\Repository\BidRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
#[Route('/bid')]
class BidController extends AbstractController
{
    #[Route('/', name: 'app_bid_index', methods: ['GET'])]
    public function index(BidRepository $bidRepository): Response
    {
        return $this->render('bid/index.html.twig', [
            'bids' => $bidRepository->findAll(),
        ]);
    }

    #[Route('/for-auction/{idAuction}', name: 'app_bid_for_auction', methods: ['GET'])]
    public function bidsForAuction(int $idAuction, BidRepository $bidRepository): Response
    {
        $bids = $bidRepository->findBy(['idAuction' => $idAuction]);
        $entityManager = $this->getDoctrine()->getManager();
        $auctions = $entityManager->getRepository(Auction::class)->findAll();

        $totalDonation = 0;

        foreach ($auctions as $otherAuction) { // Rename the variable here
        $otherHighestBid = $this->highestBidForAuction($otherAuction->getId());
        $donationAmount = (float)$otherHighestBid * 0.1; // 10% of the highest bid
        $totalDonation += $donationAmount;
        }
        return $this->render('bid/index.html.twig', [
            'bids' => $bids,
            'totalDonation' => $totalDonation,
        ]);
    }

    #[Route('/for-auctionFront/{idAuction}', name: 'app_bidFront_for_auction', methods: ['GET'])]
    public function bidsFrontForAuction(int $idAuction, BidRepository $bidRepository): Response
    {
        $bids = $bidRepository->findBy(['idAuction' => $idAuction]);
        $entityManager = $this->getDoctrine()->getManager();
        $auctions = $entityManager->getRepository(Auction::class)->findAll();

        $totalDonation = 0;

        foreach ($auctions as $otherAuction) { // Rename the variable here
        $otherHighestBid = $this->highestBidForAuction($otherAuction->getId());
        $donationAmount = (float)$otherHighestBid * 0.1; // 10% of the highest bid
        $totalDonation += $donationAmount;
        }
        return $this->render('bid/showfrontbid.html.twig', [
            'bids' => $bids,
            'totalDonation' => $totalDonation,
        ]);
    }
    #[Route('/bid/frontbid/{idAuction}', name: 'app_bidfront_auction', methods: ['GET'])]
public function bidsfront(int $idAuction, BidRepository $bidRepository): Response
{
    $auction = $this->getDoctrine()->getRepository(Auction::class)->find($idAuction);

    if (!$auction) {
        throw $this->createNotFoundException('Auction not found');
    }

    $bids = $bidRepository->findBy(['idAuction' => $idAuction]);
    $highestBid = $this->highestBidForAuction($idAuction);
    
    // Calculate total donation amount
    $entityManager = $this->getDoctrine()->getManager();
    $auctions = $entityManager->getRepository(Auction::class)->findAll();

    $totalDonation = 0;

    foreach ($auctions as $otherAuction) { // Rename the variable here
        $otherHighestBid = $this->highestBidForAuction($otherAuction->getId());
        $donationAmount = (float)$otherHighestBid * 0.1; // 10% of the highest bid
        $totalDonation += $donationAmount;
    }

    return $this->render('bid/bidFront.html.twig', [
        'auction' => $auction,
        'bids' => $bids,
        'highestBid' => $highestBid,
        'totalDonation' => $totalDonation,
    ]);
}

    #[Route('/bid/submit-bid/{idAuction}', name: 'app_bid_submit_bid', methods: ['POST'])]
    public function submitBid(int $idAuction, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $auction = $entityManager->getRepository(Auction::class)->find($idAuction);
    
        if (!$auction) {
            throw $this->createNotFoundException('Auction not found');
        }
        $highestBid = $this->highestBidForAuction($idAuction);
        if ($highestBid === "No bids yet") {
            $highestBid = $auction->getPrice();
        }
    
        $bidAmount = $request->request->get('quantity'); // Get bid amount from request
        // You may want to add validation for bid amount here
     
        if ($bidAmount <= $highestBid) {
        // Bid amount should be higher than the current highest bid
        $errorMessage = 'Your bid amount must be higher than the current highest bid.';
        // Pass the error message to the template
        $bids = $this->getDoctrine()->getRepository(Bid::class)->findBy(['idAuction' => $idAuction]);
        $highestBid = $this->highestBidForAuction($idAuction);
         // Calculate total donation amount
        $entityManager = $this->getDoctrine()->getManager();
        $auctions = $entityManager->getRepository(Auction::class)->findAll();

         $totalDonation = 0;

         foreach ($auctions as $otherAuction) { // Rename the variable here
        $otherHighestBid = $this->highestBidForAuction($otherAuction->getId());
        $donationAmount = (float)$otherHighestBid * 0.1; // 10% of the highest bid
        $totalDonation += $donationAmount;
         }
        
        return $this->render('bid/bidFront.html.twig', [
            'auction' => $auction,
            'bids' => $bids,
            'highestBid' => $highestBid,
            'errorMessage' => $errorMessage,
            'totalDonation' => $totalDonation,
        ]);
      
    }
        $user = $entityManager->getRepository(Users::class)->find(36); // Assuming 36 is the user ID
        // Fetch the User entity corresponding to the user ID
    
        $bid = new Bid();
        $bid->setBidamount($bidAmount); // Set bid amount
        $bid->setIdAuction($auction);
        $bid->setUserid($user); // Set the User entity
    
        $entityManager->persist($bid);
        $entityManager->flush();
    
        // Redirect to the bid front page or wherever you want to redirect after successful bid submission
        return $this->redirectToRoute('app_bidfront_auction', ['idAuction' => $idAuction]);

        // If form is not valid or not submitted, render the bidFront template with the form
        $bids = $this->getDoctrine()->getRepository(Bid::class)->findBy(['idAuction' => $idAuction]);
        $highestBid = $this->highestBidForAuction($idAuction);
        
        return $this->render('bid/bidFront.html.twig', [
            'auction' => $auction,
            'bids' => $bids,
            'highestBid' => $highestBid,
            'totalDonation' => $totalDonation,
            'form' => $form->createView(),
            
        ]);
    }
    
    
    
    
    #[Route('/new', name: 'app_bid_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BidRepository $bidRepository): Response
    {
        $bid = new Bid();
        $form = $this->createForm(BidType::class, $bid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bidRepository->add($bid);

            return $this->redirectToRoute('app_bid_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bid/new.html.twig', [
            'bid' => $bid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bid_show', methods: ['GET'])]
    public function show(Bid $bid): Response
    {
        return $this->render('bid/show.html.twig', [
            'bid' => $bid,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bid_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bid $bid, BidRepository $bidRepository): Response
    {
        $form = $this->createForm(BidType::class, $bid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bidRepository->edit($bid);

            return $this->redirectToRoute('app_bid_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bid/edit.html.twig', [
            'bid' => $bid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bid_delete', methods: ['POST'])]
    public function delete(Request $request, Bid $bid, BidRepository $bidRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bid->getIdbid(), $request->request->get('_token'))) {
            $bidRepository->delete($bid);
        }

        return $this->redirectToRoute('app_auction_index', [], Response::HTTP_SEE_OTHER);
    }

    private function highestBidForAuction($auctionId) {
        // Your logic to retrieve the highest bid for this auction
        $highestBid = $this->getDoctrine()->getRepository(Bid::class)->findHighestBidForAuction($auctionId);
        
        // Assuming the highest bid is stored in a property called 'bidAmount' in the Bid entity
        if ($highestBid) {
            return $highestBid;
        } else {
            return "No bids yet";
        }
    }
    

}
