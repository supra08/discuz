<?php

namespace View;

	class Loader
	{
		public static function make ($cache = false) {
			$twig = new \Twig_Environment(new \Twig_Loader_Filesystem(dirname(__FILE__)), array('cache' => $cache));
			// $filter = new Twig_SimpleFilter('replace_new',function($string){
			// 	return strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $string));
			// });
			// $formatByte = new Twig_SimpleFilter('formatByte',function($size, $precision = 2){
			// 	$size = intval($size);
			// 	if($size == 0) return "Not Available";
			//     $base = log($size, 1024);
			//     $suffixes = array('', 'kB', 'MB', 'GB', 'TB');
			// 	return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
			// });
			// $twig -> addFilter($filter);
			// $twig -> addFilter($formatByte);
			return $twig;
		}
	}
