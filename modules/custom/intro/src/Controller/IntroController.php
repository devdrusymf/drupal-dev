<?php

namespace Drupal\intro\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller de test
 * @return array
 */
class IntroController extends ControllerBase {

    private $message = "Bonjour à tous, meilleurs voeux !";

    /**
     * Méthode coucou
     */
     public function coucou() {
       // renvoi d'un tableau associatif avec certaines clés permettant
       //au système de rendu de drupal de créer la réponse  à retourner au client

       return [
         '#markup' => '<p> Coucou les <span>amis</span> !</p>',
       ];

     }

     /**
      * Méthode list
      * @return array
      */
      public function greet() {
        // renvoi d'un tableau associatif avec certaines clés permettant
        // au système de rendu de drupal de créer la réponse  à retourner au client

        $message = '';
        $output= '';
        if($message !=''){
          $output = $message;
        }else {
          $output = $this->message;
        }


        return [
          '#markup' => $output,
        ];

      }



}
