<?php

namespace Coomute\Bundle\OmgaBundle\Controller;

ini_set('max_execution_time', 300);
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

//BOUH 
use  Coomute\Bundle\OmgaBundle\Entity\Genre;
use  Coomute\Bundle\OmgaBundle\Form\GenreType;
use  Coomute\Bundle\OmgaBundle\Form\MetaType;
use  Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
      $em = $this->getDoctrine()->getEntitymanager();
      $genres = $em->getRepository("CoomuteOmgaBundle:Genre")->findAll();
      $genres_syn = $em->getRepository("CoomuteOmgaBundle:GenreSyn")->findAll();
      
     /* 
      $query= $em->createQueryBuilder()
                 ->addSelect('genre')
                 ->from('CoomuteOmgaBundle:Genre', 'genre') 
                 ->addSelect('genre_syn')
                 ->from('CoomuteOmgaBundle:GenreSyn', 'genre_syn') 
                 ->setMaxResults( 2 )
                 ->getQuery();

      
      
      $genre = $query->getResult();
      */
      $genres = array_merge($genres, $genres_syn);


        /* This is the static comparing function: */
        uasort($genres, function($a, $b) { return strcmp(strtolower($a->getName()), strtolower($b->getName())); } );


      return array(
        'genres' => $genres,
      );
    }
    /**
    * @Route("/genre/{id}",name="genre_full")
     * @Template()
     */
    public function genreFullAction($id)
    {
      $em = $this->getDoctrine()->getEntitymanager();
      $genre = $em->getRepository("CoomuteOmgaBundle:Genre")->findOneBy(array('id'=>$id));
      return array(
        'genre' => $genre,
      );
    }
}
