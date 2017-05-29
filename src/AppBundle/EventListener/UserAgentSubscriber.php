<?php
namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;

class UserAgentSubscriber implements EventSubscriberInterface{
  /**
   * @var LoggerInterface
   */
  private $logger;
  
  public function __construct(LoggerInterface $logger) {
    $this->logger = $logger;
  }

  public function onKernelRequest() {
    $this->logger->info('RRRRAAAAAWWWWR');  
  }
  
  public static function getSubscribedEvents() {
    return array(
      'kernel.request' => 'onKernelRequest'
    );
  }
}
