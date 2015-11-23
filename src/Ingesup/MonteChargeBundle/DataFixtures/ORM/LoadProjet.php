<?php
namespace Ingesup\MonteChargeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Ingesup\MonteChargeBundle\Entity\Projet;
use Ingesup\MonteChargeBundle\Entity\Type;
use Ingesup\MonteChargeBundle\Entity\Difficulty;
use Ingesup\MonteChargeBundle\Entity\Classe;
use Ingesup\MonteChargeBundle\Entity\Groups;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\FOSUserEvents;


class LoadProjet implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $em)
    {



        $type1 = new Type;
        $type2 = new Type;
        $type3 = new Type;

        $difficulty1 = new Difficulty;
        $difficulty2 = new Difficulty;
        $difficulty3 = new Difficulty;

        $classe1 = new Classe;
        $classe2 = new Classe;
        $classe3 = new Classe;

        $group1 = new Groups;
        $group2 = new Groups;

        $type1->setName("Devoir");
        $type2->setName("Projet");
        $type3->setName("Partiel");

        $difficulty1->setName("Facile");
        $difficulty2->setName("Moyen");
        $difficulty3->setName("Difficile");


        $type1->setDifficulty($difficulty1);
        $type2->setDifficulty($difficulty2);
        $type3->setDifficulty($difficulty3);

        $classe1->setName("Bachelor 1");
        $classe2->setName("Bachelor 2");
        $classe3->setName("Bachelor 3");

        $group1->setName("A");
        $group2->setName("B");


        $projet1 = new Projet;
        $projet1->setName("First Devoir")
            ->setManager("Yohann")
            ->setType($type1)
            ->setGroups($group1)
            ->setClasse($classe1)
            ->setUrl("http://google.fr")
            ->setStartdate(\DateTime::createFromFormat('Y-m-d H:i:s', "2015-11-23 13:30:00"))
            ->setDeadline(\DateTime::createFromFormat('Y-m-d H:i:s', "2015-11-23 15:15:00"));

        $projet2 = new Projet;
        $projet2->setName("Partiel n°1")
            ->setManager("Partirl 1er semestre")
            ->setType($type3)
            ->setGroups($group1)
            ->setClasse($classe2)
            ->setUrl("http://google.fr")
            ->setStartdate(\DateTime::createFromFormat('Y-m-d H:i:s', "2015-11-25 08:00:00"))
            ->setDeadline(\DateTime::createFromFormat('Y-m-d H:i:s', "2015-11-27 21:00:00"));

        $projet3 = new Projet;
        $projet3->setName("Devoir C#")
            ->setManager("N.Bellino")
            ->setType($type1)
            ->setGroups($group2)
            ->setClasse($classe3)
            ->setUrl("http://google.fr")
            ->setStartdate(\DateTime::createFromFormat('Y-m-d H:i:s', "2015-12-12 08:45:00"))
            ->setDeadline(\DateTime::createFromFormat('Y-m-d H:i:s', "2015-12-12 10:30:00"));

        $projet4 = new Projet;
        $projet4->setName("Web")
            ->setManager("Yvonne")
            ->setType($type2)
            ->setGroups($group2)
            ->setClasse($classe1)
            ->setUrl("http://google.fr")
            ->setStartdate(\DateTime::createFromFormat('Y-m-d H:i:s', "2015-11-15 08:00:00"))
            ->setDeadline(\DateTime::createFromFormat('Y-m-d H:i:s', "2015-12-15 10:30:00"));

        $em->persist($projet1);
        $em->persist($projet2);
        $em->persist($projet3);
        $em->persist($projet4);

        $em->flush();

//        // Liste des noms de catégorie à ajouter
//        $names = array(
//            'Développement web',
//            'Développement mobile',
//            'Graphisme',
//            'Intégration',
//            'Réseau',
//            'Sécurité'
//        );
//
//        foreach ($names as $name) {
//            // On crée la catégorie
//            $category = new Category();
//            $category->setName($name);
//
//            // On la persiste
//            $manager->persist($category);
//        }
//
//        // On déclenche l'enregistrement de toutes les catégories
//        $manager->flush();
    }
}