<?php
// permet d'enregistrer un nouveau block
namespace Drupal\intro\Plugin\Block; // indique le chemin de la classe

use Drupal\Core\Block\BlockBase;

// class GreetBlock
/**
 *  @Block(
 *  id = "intro_greet_block",
 *  admin_label = "Greeting Block"
 * )
 */
 class GreetBlock extends BlockBase {
   // id => reference à getFormId
   // admin_label => donne un nom au block
   // la méthode config n'est pas dispnible pour un block
   // $config = $this->config('intro.custom_greeting');
   $config = $this->getConfiguration();

   // $config renvoi un tableau associatif representant le block courant
   // ne permet pas d'acceder à la table config dela base de données

   var_dump($config);

   public function build(){
     return [
       '#markup' => "bla bla",
     ];
   }


 }
