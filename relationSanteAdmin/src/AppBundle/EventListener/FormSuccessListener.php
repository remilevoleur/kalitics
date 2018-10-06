<?php 

namespace AppBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Listener responsible to change the redirection when a form is successfully filled
 */
class FormSuccessListener implements EventSubscriberInterface
{
    private $router;
    private $em;

    public function __construct(UrlGeneratorInterface $router, EntityManagerInterface $em)
    {
        $this->router = $router;
        $this->em = $em;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_COMPLETED => array('onRegistrationSuccess',-10),
        );
    }

    public function onRegistrationSuccess(FilterUserResponseEvent $event)
    {
        $user = $event->getUser();
        $groupe = $this->em->getRepository('ApplicationSonataUserBundle:Group')->find(4);
        $user->addGroup($groupe);
        $this->em->persist($user);
        $this->em->flush();

        $url = $this->router->generate('homepage');
        $event->setResponse(new RedirectResponse($url));
    }
}

?>