<?php

namespace Ingesup\MonteChargeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ingesup\MonteChargeBundle\Entity\Projet;
use Ingesup\MonteChargeBundle\Entity\Type;
use Ingesup\MonteChargeBundle\Entity\Classe;
use Ingesup\MonteChargeBundle\Entity\Groups;
use Symfony\Component\HttpFoundation\Request;
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
        $difficulties = $em->getRepository('IngesupMonteChargeBundle:Difficulty')->findAll();
        $classes = $em->getRepository('IngesupMonteChargeBundle:Classe')->findAll();
        $groups = $em->getRepository('IngesupMonteChargeBundle:Groups')->findAll();

        return $this->render($this->getAdminPool()->getTemplate('dashboard'), array(
            'projects'        => $projects,
            'types'           => $types,
            'difficulties'    => $difficulties,
            'classes'         => $classes,
            'groups'          => $groups,
            'base_template'   => $this->getBaseTemplate(),
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
            'blocks'          => $blocks,
        ));
    }
    public function newUserDashBoardAction(Request $request){


        if ($request->isMethod('POST')) {
            $_name       = $request->request->get('name');
            $_manager    = $request->request->get('manager');
            $_type       = $request->request->get('type');
            $_classe     = $request->request->get('classe');
            $_group      = $request->request->get('group' );
            $_difficulty = $request->request->get('difficulty');
            $_startdate  = $request->request->get('startdate');
            $_deadline   = $request->request->get('deadline');

            $_url        = $request->request->get('url');
        }

        $em = $this->getDoctrine()->getManager();

        $type = $em->getRepository('IngesupMonteChargeBundle:Type')->find((int)$_type);
        $difficulty = $em->getRepository('IngesupMonteChargeBundle:Difficulty')->find((int)$_difficulty);
        $classe = $em->getRepository('IngesupMonteChargeBundle:Classe')->find((int)$_classe);
        $group = $em->getRepository('IngesupMonteChargeBundle:Groups')->find((int)$_group);

        $projet = new Projet;


        $type->setDifficulty($difficulty);

        $projet->setName($_name)
            ->setManager($_manager)
            ->setClasse($classe)
            ->setUrl($_url);


            $type->setDifficulty($difficulty);
            $projet->setType($type);


            $projet->setGroups($group);

            $projet->setStartdate(\DateTime::createFromFormat('d/m/Y H:i:s', $_startdate));
            $projet->setDeadline(\DateTime::createFromFormat('d/m/Y H:i:s', $_deadline));

            $em->persist($projet);
            $em->flush();


        return new RedirectResponse($this->generateUrl('sonata_admin_dashboard'));

    }
    public function eraseTaskDashboardAction($id){
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('IngesupMonteChargeBundle:Projet')->find((int)$id);
        $em->remove($project);
        $em->flush();
        return new RedirectResponse($this->generateUrl('sonata_admin_dashboard'));
    }
}
