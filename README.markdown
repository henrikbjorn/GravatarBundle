Simple wrapper to the gravatar API
http://en.gravatar.com/site/implement/url

## Usage

    $imageUrl = Bundle\GravatarBundle\Api::getUrl('joe@mail.com');
    
    $imageUrl = Bundle\GravatarBundle\Api::getUrl('joe@mail.com', array(
        'size'    => 40
        'default' => 'monsterid',
        'rating'  => 'g'
    ));

## Installation

Register the bundle in your application kernel:

    public function registerBundles()
    {
        $bundles = array(
            new Bundle\GravatarBundle\Bundle(),
        );
    }
