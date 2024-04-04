<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    /**
     * @Route("/image/{imageName}", name="image_show")
     */
    public function show($imageName)
    {
        // Assuming images are stored in C:\xampp\htdocs\image
        $imagePath = 'C:\xampp\htdocs\image\\' . $imageName;

        // Check if the image file exists
        if (!file_exists($imagePath)) {
            throw $this->createNotFoundException('The image does not exist');
        }

        // Serve the image as a response
        $response = new Response();
        $response->headers->set('Content-Type', 'image/png');
        $response->headers->set('Content-Disposition', 'inline');
        $response->setContent(file_get_contents($imagePath));

        return $response;
    }
}
