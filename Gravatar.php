<?php
/*
 * @package		Gravatar Static Class
 * @version		1.0
 * @author		Karl Ballard
 * @link		https://github.com/ballard-k/gravatar-php-class
 */
namespace Gravatar;

class Gravatar
{

	public static $base_url = 'gravatar.com/avatar/';
	
	public static function get_image($id, $params = array())
	{		
		$image_url = (isset($_SERVER['HTTPS']) ? 'https://secure.' : 'http://') .
				self::$base_url . self::gen_hash($id);
				
		$opts = array();
		
		if (isset($params['default'])) $opts[] = 'default='. $params['default'];
		if (isset($params['size'])) $opts[] = 'size='. $params['size'];
		if (isset($params['rating'])) $opts[] = 'rating='. $params['rating'];
		if (isset($params['force_default']) && $params['force_default'] === TRUE) $opts[] = 'forcedefault=y';
		
		$gravatar = $image_url . '?' . implode($opts, '&');
		
		if (isset($params['generate_image']) OR $params['generate_image'] === FALSE)
		{
			$gravatar = '<img src="'. $gravatar .'" alt="Gravatar" class="'.
				(isset($params['css_id']) ? $params['css_id'] : 'gravatar') .'" />';
		}
		
		return $gravatar;
	}
	
	public static function gen_hash($identity)
	{
		if (filter_var($identity, FILTER_VALIDATE_EMAIL))
		{
			$identity = md5($identity);
		}
		
		return $identity;
	}

}