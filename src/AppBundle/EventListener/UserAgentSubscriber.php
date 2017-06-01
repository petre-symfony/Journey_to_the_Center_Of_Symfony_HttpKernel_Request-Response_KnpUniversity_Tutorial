<?php
namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Response;

class UserAgentSubscriber implements EventSubscriberInterface{
  /**
   * @var LoggerInterface
   */
  private $logger;
  
  public function __construct(LoggerInterface $logger) {
    $this->logger = $logger;
  }
  
  public function onKernelRequest(GetResponseEvent $event) {
    $this->logger->info('RRRRAAAAAWWWWR');
    $request = $event->getRequest();
    $userAgent = $request->headers->get('User-Agent');
    $this->logger->info('The user agent is: '.$userAgent);
    
    if(rand(0, 100) > 50){
      $response = new Response('Come back later!');
      //$event->setResponse($response);
    }
    
    $isLinux = strpos($userAgent, 'Linux') !== false;
    if($request->query->get('notLinux')){
      $isLinux = false;
    }
    $request->attributes->set('isLinux', $isLinux);
    
    /*
    $request->attributes->set('_controller', function($id){
      return new Response('Hello ' . $id);
    });
    */
    
  }
  
  public static function getSubscribedEvents() {
    return array(
      //constant that means kernel.request  
      KernelEvents::REQUEST => 'onKernelRequest'
    );
  }
}