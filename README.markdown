Installation
============

  1. Add this bundle to your project as Git submodules:

          $ git submodule add git://github.com/dator/GravatarBundle.git src/Bundle/GravatarBundle


  2. Add this bundle to your application's kernel:

          // application/ApplicationKernel.php
          public function registerBundles()
          {
              return array(
                  // ...
                  new Bundle\GravatarBundle\GravatarBundle(),
                  // ...
              );
          }

  3. Configure the `gravatar` helper in your config:

          # application/config/config.yml
          gravatar.helper: ~

  4. If you always have some default for your gravatars such as size, rating or default it can be configured in your config.yml

         # application/config/config.yml
         gravatar.helper:
            rating: g
            size: 80
            default: ~


Usage
=====

All you have to do is use the helper like this example:

      <img src="<?php echo $view['gravatar']->render('name@domain.com') ?>" />

Or with parameters:

      <img src="<?php echo $view['gravatar']->render('mail@domain.tpl', '80', 'g', 'defaultimage.png') ?>" />

The only required parameter is the email adresse. The rest have default values.

For more information, check the gravatar page : http://fr.gravatar.com/site/implement/images/
