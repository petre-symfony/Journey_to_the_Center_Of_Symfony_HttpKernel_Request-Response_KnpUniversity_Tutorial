<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dinosaur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DinosaurController extends Controller {
  /**
   * @Route("/", name="dinosaur_list")
   */
  public function indexAction($isLinux){
    $dinos = $this->getDoctrine()
      ->getRepository('AppBundle:Dinosaur')
      ->findAll();

    return $this->render('dinosaurs/index.html.twig', [
      'dinos' => $dinos,
      'isLinux' => $isLinux  
    ]);
  }

  /**
   * @Route("/dinosaurs/{id}", name="dinosaur_show")
   */
  public function showAction($id){
    $dino = $this->getDoctrine()
      ->getRepository('AppBundle:Dinosaur')
      ->find($id);

    if (!$dino) {
      throw $this->createNotFoundException('That dino is extinct!');
    }

    return $this->render('dinosaurs/show.html.twig', [
      'dino' => $dino,
    ]);
  }
  
  public function _latestTweetsAction($isLinux){
    $tweets = [
      'Dinosaur can have existential crises too you know.',
      'Eating lallipaps...',
      'Rock climbing...'
    ];
    
    return $this->render('dinosaurs/_latestTweets.html.twig', [
      'tweets'  => $tweets,
      'isLinux' => $isLinux  
    ]);
  }
} 