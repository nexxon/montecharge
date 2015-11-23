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
use Sonata\AdminBundle\Controller\CoreController;

use Sonata\AdminBundle\Admin\AdminInterface;


class UserController extends CoreController
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
    public function overrideDashboardAction()
    {

        $blocks = array(
            'top'    => array(),
            'left'   => array(),
            'center' => array(),
            'right'  => array(),
            'bottom' => array(),
        );

        foreach ($this->container->getParameter('sonata.admin.configuration.dashboard_blocks') as $block) {
            $blocks[$block['position']][] = $block;
        }

        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository('IngesupMonteChargeBundle:Projet')->findAll();
        $types = $em->getRepository('IngesupMonteChargeBundle:Type')->findAll();

        return $this->render($this->getAdminPool()->getTemplate('dashboard'), array(
            'projects'        => $projects,
            'types'           => $types,
            'base_template'   => $this->getBaseTemplate(),
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
            'blocks'          => $blocks,
        ));
    }
}
