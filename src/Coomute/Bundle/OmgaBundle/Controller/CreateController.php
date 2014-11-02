<?php

namespace Coomute\Bundle\OmgaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use  Coomute\Bundle\OmgaBundle\Form\GenreType;
use  Coomute\Bundle\OmgaBundle\Form\MetaType;
use  Coomute\Bundle\OmgaBundle\Entity\Genre;
use  Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation;

class CreateController extends Controller
{
    /**
     * @Route("/create/genre", name="create_genre")
     * @Template()
     */
    public function createGenreAction(Request $request){
      $genre = new Genre();
      $form = $this->createForm(new GenreType(), $genre);
      $form = $form->handleRequest($request);
      if($form->isValid()){

        $entity_manager = $this->getDoctrine()->getManager();
        $entity_manager->persist($genre);

        $meta_genre = $form->get('metas')->getData();
        if($meta_genre){
          foreach($meta_genre as $my_meta){
            $meta_relation = new MetaGenreRelation();

            $meta_relation->setGenre($genre);
            $meta_relation->setMeta($my_meta);

            $entity_manager->persist($meta_relation);

          }
        }
        $entity_manager->flush();
        return new Response('News added successfuly');
      }
      return array('form' => $form->createView());
    }
}
