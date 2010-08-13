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


Usage
=====

All you have to do is use the helper like this example:

      <img src="<?php echo $view->gravatar->render('name@domain.com') ?>" />

Or with parameters:

      <img src="<?php echo $view->gravatar->render('name@domain.com', array('size' => 20)) ?>" />

Available options:
    - size : the size of the avatar (default to 80px)
    - rating : is the type of content in the image (default to G)
    - default_image: the default image (default to null)
    
For more information, check the gravatar page : http://fr.gravatar.com/site/implement/images/