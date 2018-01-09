<?php

namespace Drupal\intro\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
  * Formulaire de configuration du message de souhait
  */
  class GreetingNumConfigurationForm extends ConfigFormBase {


    public function getEditableConfigNames(){
      // indique les elements qui editables c-a-d mutable
      return [
        'intro.custom_greeting' // on garde le meme lieu de stockage
      ];
    }

    public function getFormId(){
      return 'greeting_num_configuration_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state){
      // methode permet de lire les données d'un élémént dans la BDD
       $config = $this->config('intro.custom_greeting');

      // la méthode t (translation) héritée permet d'enregistrer la chaine caractere  passée en en entrée auprès du module de tarduction
       $form['greet_num'] = array(
        '#type' => 'number',
        '#title' => $this->t('Greeting Number'),
        '#description' => '',
        '#default_value' => '',
      );

      $form['greet_num_enabled'] = array(
        '#type' => 'checkbox',
        '#title' => $this->t('Actif'),
        '#description' => 'Enable greeting value',
        '#default_value' => $config->get('greet_num_enabled'),
      );

      // renvoie du tableau associatif  vaia la méthode
      return parent::buildForm($form, $form_state);

    }

    public function submitForm(array &$form, FormStateInterface $form_state){
       $this->config('intro.custom_greeting')
      ->set('greet_num', $form_state->getValue('greet_num'))
      ->set('greet_num_enabled', $form_state->getValue('greet_num_enabled'))
      ->save(); // declence une requete SQL insert into
      //drupal_set_message($this->t('The configuration options have been saved.'));
      return parent::submitForm($form, $form_state);
    }

  }
