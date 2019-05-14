<?Php 
namespace Config;

class Config 
{
	private static $path = 'http://localhost/adv-search/';
	public static function path()
	{
		return self::$path;
	}
}