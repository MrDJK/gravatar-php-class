<?php
/* 
 * Gravatar PHP5 Class
 *
 * @author		Karl Ballard
 * @copyright 	Copyright (c) 2011
 * @license 	http://philsturgeon.co.uk/code/dbad-license
 * @link		https://github.com/ballard-k/gravatar-php-class
 * @version		1.0
 */
namespace Gravatar;

class Gravatar
{

	public static $base_url = 'gravatar.com/avatar/';
	
	/*
	 * Returns a image or the URL to the image of a Gravatar based off an email
	 * address.
	 *
	 *     echo Gravatar::get_image('example@example.tld', $img_config);
	 *
	 * @param   string 		Email adresss or a MD5'd hash of an Email
	 * @param   array 		Allows multiple keys with values to give more control
	 * @return  string
	 */
	public static function get_image($id, $params = array())
	{		
		$image_url = (isset($_SERVER['HTTPS']) ? 'https://secure.' : 'http://') .
				self::$base_url . self::gen_hash($id);
				
		$opts = array();
		
		if (isset($params['default'])) $opts[] = 'default='. $params['default'];
		if (isset($params['size'])) $opts[] = 'size='. $params['size'];
		if (isset($params['rating'])) $opts[] = 'rating='. $params['rating'];
		if (isset($params['force_default']) && $params['force_default'] === TRUE) $opts[] = 'forcedefault=y';
		
		$gravatar = $image_url . (sizeof($opts) > 0 ? '?' . implode($opts, '&') : FALSE);
		
		if (isset($params['generate_image']) && $params['generate_image'] === FALSE)
		{
			$gravatar = '<img src="'. $gravatar .'" alt="Gravatar" class="'.
				(isset($params['css_id']) ? $params['css_id'] : 'gravatar') .'" />';
		}
		
		return $gravatar;
	}
	
	/*
	 * Returns a hash of an email address.
	 *
	 *     echo Gravatar::gen_hash('example@example.tld');
	 *
	 * @param   string 		Email adresss or a MD5'd hash of an Email
	 * @return  string
	 */
	public static function gen_hash($identity)
	{
		if (filter_var($identity, FILTER_VALIDATE_EMAIL))
		{
			$identity = md5($identity);
		}
		
		return $identity;
	}

}

/* End of file Gravatar.php */