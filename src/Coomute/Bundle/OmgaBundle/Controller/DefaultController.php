<?php

namespace Coomute\Bundle\OmgaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
      $em = $this->getDoctrine()->getManager();
      $genre = $em->getRepository("CoomuteOmgaBundle:Genre")->findOneBy(array('id'=>$id));
      return array(
        'genre' => $genre,
      );
    }
    /**
    * @Route("genre/meta/{id}",name="genre_meta_list")
     * @Template("CoomuteOmgaBundle:Default:index.html.twig")
     */
    public function genreMetaListAction($id)
    {
      $em = $this->getDoctrine()->getManager();
      $query= $em->createQueryBuilder()
                 ->select('genre')
                 ->from('CoomuteOmgaBundle:Genre', 'genre') 
                 ->leftjoin('genre.metas', 'meta', 'WITH', 'meta.genre = genre.id') 
                 ->setParameters( ["id" => $id] )
                 ->where( 'meta.meta = :id' )
                 ->getQuery();

      
      
      $genres = $query->getResult();
      return array(
        'genres' => $genres,
      );
    }
}
