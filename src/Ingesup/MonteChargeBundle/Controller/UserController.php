<?php

namespace Ingesup\MonteChargeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ingesup\MonteChargeBundle\Entity\Projet;
use Ingesup\MonteChargeBundle\Entity\Type;
use Ingesup\MonteChargeBundle\Entity\Classe;
use Ingesup\MonteChargeBundle\Entity\Groups;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\FOSUserEvents;

class UserController extends Controller
{

    public function showProfileAction()
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository('IngesupMonteChargeBundle:Projet')->findAll();
        $types = $em->getRepository('IngesupMonteChargeBundle:Type')->findAll();

        return $this->render('SonataUserBundle:Profile:show.html.twig', array(
            'types' => $types,
            'projects' => $projects,
            'user'   => $user,
            'blocks' => $this->container->getParameter('sonata.user.configuration.profile_blocks')
        ));
    }
}
