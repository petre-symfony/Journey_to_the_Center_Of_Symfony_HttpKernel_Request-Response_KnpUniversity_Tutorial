<?php
namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

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
  }
  
  public static function getSubscribedEvents() {
    return array(
      'kernel.request' => 'onKernelRequest'
    );
  }
}
