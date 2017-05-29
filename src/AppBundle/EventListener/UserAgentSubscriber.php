<?php
namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserAgentSubscriber implements EventSubscriberInterface{
  public function onKernelRequest() {
    die('it works!');  
  }
  
  public static function getSubscribedEvents() {
    return array(
      'kernel.request' => 'onKernelRequest'
    );
  }

//put your code here
}
