<?php
/**
 * CSS Shrinker v0.0.3
 * http://adykto.github.com/CSS-Shrinker
 *
 * Includes:
 * LESS css compiler, adapted from http://lesscss.org
 *
 * Licensed as GPL2. Read the readme.me
 *
 *	Changelog:
 *	V.0.0.3 - July 2012 - Added CSSMin to reduce CSS file size.
 *	V.0.0.2 - Feb. 2012 - CSS Tidy shrinked in only on .class.php file.
 *	V.0.0.1 - Oct. 2011 - First release.
 *
 * @package		CSSShrinker
 * @link		https://github.com/adykto/CSSShrinker
 * @author		Adykto <alonsomendez@gmail.com>
 * @copyright	2012 Alonso Mendez <alonsomendez@gmail.com>
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GPL 2.0 License
 * @version		0.0.3
 *
 * **/

 	define('LIB_ROOT', './lib/');
	define('DEBUG_MODE', true);

	include(LIB_ROOT.'less.class.php');
	include(LIB_ROOT.'cssmin.class.php');
	include(LIB_ROOT.'csstidy.class.php');

	$lessFile = './less/style.less';
	$lessCache = './cache/style.css.cached';

	$lessCached = (file_exists($lessCache)) ? unserialize(file_get_contents($lessCache)) : $lessFile;
	$lessParsed = lessc::cexecute($lessCached);

	if(!is_array($lessCached) || $lessParsed['updated'] > $lessCached['updated']) {
		file_put_contents($lessCache, serialize($lessParsed));
	}

	$css = new csstidy();
	$css->set_cfg('preserve_css', false);
	$css->set_cfg('optimise_shorthands', 3);
	$css->set_cfg('merge_selectors', 1);
	$css->set_cfg('discard_invalid_properties', 1);
	$css->parse($lessParsed['compiled']);
	$cssCode = $css->print->plain();

	header('Content-type: text/css');
	if(DEBUG_MODE) {
		header("Cache-Control: no-cache");
		header("Pragma: no-cache");
		echo $cssCode;
	} else {
		echo CssMin::minify($cssCode);
	}
	die();