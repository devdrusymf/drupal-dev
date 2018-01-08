<?php

namespace Drupal\intro\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
  * Formulaire de configuration du message de souhait
  */
  class GreetingConfigurationForm extends ConfigFormBase {


    public function getEditableConfigNames(){
      // indique les elements qui editables c-a-d mutable
      return [
        'intro.custom_greeting'
      ];
    }

    public function getFormId(){
      return 'greeting_configuration_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state){
      // methode permet de lire les données d'un élémént dans la BDD
      $config = $this->config('intro.custom_greeting');


      // la méthode t (translation) héritée permet d'enregistrer la chaine caractere  passée en en entrée auprès du module de tarduction
       $form['greeting'] = array(
        '#type' => 'textfield',
        '#title' => $this->t('Message de souhait'),
        '#description' => 'Merci de fournir un message',
        '#default_value' => $config->get('greet'),
      );

      // renvoie du tableau associatif  vaia la méthode
      return parent::buildForm($form, $form_state);

    }

    public function submitForm(array &$form, FormStateInterface $form_state){
      $this->config('intro.custom_greeting')
      ->set('greet', $form_state->getValue('greeting'))
      ->save(); // declence une requete SQL insert into

      parent::submitForm($form, $form_state);
    }


  }
