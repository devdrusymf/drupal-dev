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
        $default_message = 'ciao';
        $config  = $this->config('intro.custom_greeting');
        $output_final = '';

        $greet_num_enabled = boolval($config->get('greet_num_enabled'));

        //var_dump($greet_num_enabled);

        // recuperation du parametre et conversion en Int
        $number = intval($config->get('greet_num'));

        //var_dump($number);


        $message = $config->get('greet');

        // si drupal ne trouve aucune valeur associé à la clé demendée dans
        // la table Config, on renvoie au client une valeur par défaut
        $output = ($message != '') ? $message : $default_message;
        if($greet_num_enabled){
          for ($i=0; $i < $number ; $i++) {
            $output_final .= '<p>' . ($i+1) . ' '.  $output.  '</p>';
          }
        }else {
            $output_final = $output;
        }

        /*$message = '';
        $output= '';
        if($message !=''){
          $output = $message;
        }else {
          $output = $this->message;
        }*/

        // TO DO  ajouter au tableau contextuel les clés qui permettent d'afficher les liens contextuel

        return [
          '#markup' => $output_final,
        ];

      }



}
