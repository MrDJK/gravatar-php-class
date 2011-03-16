# Gravatar PHP Class (PHP5)

A Gravatar class that interacts with the Gravatar API to retrieve images specified by the owner of the e-mail address on <http://gravatar.com/> or a generated default if no e-mail address or image can be found.


## Requirements

1. PHP 5.3+


## Documentation

Using this Gravatar class is incredibly simple and very easy to use. When using the class we only require a call to one static method what requires one parameter.

All we require, is an email address or a MD5()'d hash of an email address, for example:
	example@example.tld // Email address
	c1ec093716eb76ae6d92e8fdbd020c82 // MD5'd hash of the above email


It's quite simple, hey?


### Basic Usage

It is just as simple to use, include the library in your PHP script and to display a Gravatar all you need to do is
	echo Gravatar::get_image('example@example.tld');

	
But what if you want more control over what happens?


### Advanced Usage

Well, we will give it to you if you require it! We allow you to edit a bunch of things ranging from a default image the the css class! You can edit:

* default - The default images that Gravatar allows you to use (404, mm, identicon, monsterid, wavatar, retro) or, just link your own one up!
* size - The size of the gravatar
* rating - The rating of the image (G, PG, R, X)
* force_default - Whether to or not display the default by force

For those above, you can also check the Gravatar docs at: <http://en.gravatar.com/site/implement/images/>


We also give you another two extra options, just to increase the ease of using this class:

* generate_image - To generate HTML markup for the image
* css_id - Add a custom class name to the image if generate_image is TRUE
	
	
Right, how can we use these options? Simple, we just write out an array and then add a second parameter to the method call.
For example:
	$img_config = array(
		'default' => 'mm',
		'size' => 200,
		'rating' => 'G',
		'force_default' => FALSE,
		'generate_image' => TRUE,
		'css_id' => 'test'
	);

	echo Gravatar::get_image('example@example.tld', $img_config);

	
However, just remember you can include just the one configuration option, or all of them.. You choose, not us!