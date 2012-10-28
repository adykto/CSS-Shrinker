<?php

/**
 * CSSTidy - CSS Parser and Optimiser
 *
 * CSS ctype functions
 * Defines some functions that can be not defined.
 *
 * This file is part of CSSTidy.
 *
 * CSSTidy is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * CSSTidy is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CSSTidy; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package csstidy
 * @author Nikolay Matsievsky (speed at webo dot name) 2009-2010
 * @version 1.0
 */
/* ctype_space  Check for whitespace character(s) */
if (!function_exists('ctype_space')) {

	function ctype_space($text) {
		return!preg_match("/[^\s\r\n\t\f]/", $text);
	}

}
/* ctype_alpha  Check for alphabetic character(s) */
if (!function_exists('ctype_alpha')) {

	function ctype_alpha($text) {
		return preg_match("/[a-zA-Z]/", $text);
	}

}


/**
 * Various CSS Data for CSSTidy
 *
 * This file is part of CSSTidy.
 *
 * CSSTidy is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * CSSTidy is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CSSTidy; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package csstidy
 * @author Florian Schmitz (floele at gmail dot com) 2005
 * @author Nikolay Matsievsky (speed at webo dot name) 2010
 */

define('AT_START',    1);
define('AT_END',      2);
define('SEL_START',   3);
define('SEL_END',     4);
define('PROPERTY',    5);
define('VALUE',       6);
define('COMMENT',     7);
define('DEFAULT_AT', 41);

/**
 * All whitespace allowed in CSS
 *
 * @global array $GLOBALS['csstidy']['whitespace']
 * @version 1.0
 */
$GLOBALS['csstidy']['whitespace'] = array(' ',"\n","\t","\r","\x0B");

/**
 * All CSS tokens used by csstidy
 *
 * @global string $GLOBALS['csstidy']['tokens']
 * @version 1.0
 */
$GLOBALS['csstidy']['tokens'] = '/@}{;:=\'"(,\\!$%&)*+.<>?[]^`|~';

/**
 * All CSS units (CSS 3 units included)
 *
 * @see compress_numbers()
 * @global array $GLOBALS['csstidy']['units']
 * @version 1.0
 */
$GLOBALS['csstidy']['units'] = array('in','cm','mm','pt','pc','px','rem','em','%','ex','gd','vw','vh','vm','deg','grad','rad','ms','s','khz','hz');

/**
 * Available at-rules
 *
 * @global array $GLOBALS['csstidy']['at_rules']
 * @version 1.1
 */
$GLOBALS['csstidy']['at_rules'] = array('page' => 'is','font-face' => 'atis','charset' => 'iv', 'import' => 'iv','namespace' => 'iv','media' => 'at','keyframes' => 'at','-moz-keyframes' => 'at','-o-keyframes' => 'at','-webkit-keyframes' => 'at','-ms-keyframes' => 'at');

 /**
 * Properties that need a value with unit
 *
 * @todo CSS3 properties
 * @see compress_numbers();
 * @global array $GLOBALS['csstidy']['unit_values']
 * @version 1.2
 */
$GLOBALS['csstidy']['unit_values'] = array ('background', 'background-position', 'background-size', 'border', 'border-top', 'border-right', 'border-bottom', 'border-left', 'border-width',
											'border-top-width', 'border-right-width', 'border-left-width', 'border-bottom-width', 'bottom', 'border-spacing', 'column-gap', 'column-width',
											'font-size', 'height', 'left', 'margin', 'margin-top', 'margin-right', 'margin-bottom', 'margin-left', 'max-height',
											'max-width', 'min-height', 'min-width', 'outline', 'outline-width', 'padding', 'padding-top', 'padding-right',
											'padding-bottom', 'padding-left', 'perspective', 'right', 'top', 'text-indent', 'letter-spacing', 'word-spacing', 'width');

/**
 * Properties that allow <color> as value
 *
 * @todo CSS3 properties
 * @see compress_numbers();
 * @global array $GLOBALS['csstidy']['color_values']
 * @version 1.0
 */
$GLOBALS['csstidy']['color_values'] = array();
$GLOBALS['csstidy']['color_values'][] = 'background-color';
$GLOBALS['csstidy']['color_values'][] = 'border-color';
$GLOBALS['csstidy']['color_values'][] = 'border-top-color';
$GLOBALS['csstidy']['color_values'][] = 'border-right-color';
$GLOBALS['csstidy']['color_values'][] = 'border-bottom-color';
$GLOBALS['csstidy']['color_values'][] = 'border-left-color';
$GLOBALS['csstidy']['color_values'][] = 'color';
$GLOBALS['csstidy']['color_values'][] = 'outline-color';
$GLOBALS['csstidy']['color_values'][] = 'column-rule-color';

/**
 * Default values for the background properties
 *
 * @todo Possibly property names will change during CSS3 development
 * @global array $GLOBALS['csstidy']['background_prop_default']
 * @see dissolve_short_bg()
 * @see merge_bg()
 * @version 1.0
 */
$GLOBALS['csstidy']['background_prop_default'] = array();
$GLOBALS['csstidy']['background_prop_default']['background-image'] = 'none';
$GLOBALS['csstidy']['background_prop_default']['background-size'] = 'auto';
$GLOBALS['csstidy']['background_prop_default']['background-repeat'] = 'repeat';
$GLOBALS['csstidy']['background_prop_default']['background-position'] = '0 0';
$GLOBALS['csstidy']['background_prop_default']['background-attachment'] = 'scroll';
$GLOBALS['csstidy']['background_prop_default']['background-clip'] = 'border';
$GLOBALS['csstidy']['background_prop_default']['background-origin'] = 'padding';
$GLOBALS['csstidy']['background_prop_default']['background-color'] = 'transparent';

/**
 * Default values for the font properties
 *
 * @global array $GLOBALS['csstidy']['font_prop_default']
 * @see merge_fonts()
 * @version 1.3
 */
$GLOBALS['csstidy']['font_prop_default'] = array();
$GLOBALS['csstidy']['font_prop_default']['font-style'] = 'normal';
$GLOBALS['csstidy']['font_prop_default']['font-variant'] = 'normal';
$GLOBALS['csstidy']['font_prop_default']['font-weight'] = 'normal';
$GLOBALS['csstidy']['font_prop_default']['font-size'] = '';
$GLOBALS['csstidy']['font_prop_default']['line-height'] = '';
$GLOBALS['csstidy']['font_prop_default']['font-family'] = '';

/**
 * A list of non-W3C color names which get replaced by their hex-codes
 *
 * @global array $GLOBALS['csstidy']['replace_colors']
 * @see cut_color()
 * @version 1.0
 */
$GLOBALS['csstidy']['replace_colors'] = array();
$GLOBALS['csstidy']['replace_colors']['aliceblue'] = '#f0f8ff';
$GLOBALS['csstidy']['replace_colors']['antiquewhite'] = '#faebd7';
$GLOBALS['csstidy']['replace_colors']['aquamarine'] = '#7fffd4';
$GLOBALS['csstidy']['replace_colors']['azure'] = '#f0ffff';
$GLOBALS['csstidy']['replace_colors']['beige'] = '#f5f5dc';
$GLOBALS['csstidy']['replace_colors']['bisque'] = '#ffe4c4';
$GLOBALS['csstidy']['replace_colors']['blanchedalmond'] = '#ffebcd';
$GLOBALS['csstidy']['replace_colors']['blueviolet'] = '#8a2be2';
$GLOBALS['csstidy']['replace_colors']['brown'] = '#a52a2a';
$GLOBALS['csstidy']['replace_colors']['burlywood'] = '#deb887';
$GLOBALS['csstidy']['replace_colors']['cadetblue'] = '#5f9ea0';
$GLOBALS['csstidy']['replace_colors']['chartreuse'] = '#7fff00';
$GLOBALS['csstidy']['replace_colors']['chocolate'] = '#d2691e';
$GLOBALS['csstidy']['replace_colors']['coral'] = '#ff7f50';
$GLOBALS['csstidy']['replace_colors']['cornflowerblue'] = '#6495ed';
$GLOBALS['csstidy']['replace_colors']['cornsilk'] = '#fff8dc';
$GLOBALS['csstidy']['replace_colors']['crimson'] = '#dc143c';
$GLOBALS['csstidy']['replace_colors']['cyan'] = '#00ffff';
$GLOBALS['csstidy']['replace_colors']['darkblue'] = '#00008b';
$GLOBALS['csstidy']['replace_colors']['darkcyan'] = '#008b8b';
$GLOBALS['csstidy']['replace_colors']['darkgoldenrod'] = '#b8860b';
$GLOBALS['csstidy']['replace_colors']['darkgray'] = '#a9a9a9';
$GLOBALS['csstidy']['replace_colors']['darkgreen'] = '#006400';
$GLOBALS['csstidy']['replace_colors']['darkkhaki'] = '#bdb76b';
$GLOBALS['csstidy']['replace_colors']['darkmagenta'] = '#8b008b';
$GLOBALS['csstidy']['replace_colors']['darkolivegreen'] = '#556b2f';
$GLOBALS['csstidy']['replace_colors']['darkorange'] = '#ff8c00';
$GLOBALS['csstidy']['replace_colors']['darkorchid'] = '#9932cc';
$GLOBALS['csstidy']['replace_colors']['darkred'] = '#8b0000';
$GLOBALS['csstidy']['replace_colors']['darksalmon'] = '#e9967a';
$GLOBALS['csstidy']['replace_colors']['darkseagreen'] = '#8fbc8f';
$GLOBALS['csstidy']['replace_colors']['darkslateblue'] = '#483d8b';
$GLOBALS['csstidy']['replace_colors']['darkslategray'] = '#2f4f4f';
$GLOBALS['csstidy']['replace_colors']['darkturquoise'] = '#00ced1';
$GLOBALS['csstidy']['replace_colors']['darkviolet'] = '#9400d3';
$GLOBALS['csstidy']['replace_colors']['deeppink'] = '#ff1493';
$GLOBALS['csstidy']['replace_colors']['deepskyblue'] = '#00bfff';
$GLOBALS['csstidy']['replace_colors']['dimgray'] = '#696969';
$GLOBALS['csstidy']['replace_colors']['dodgerblue'] = '#1e90ff';
$GLOBALS['csstidy']['replace_colors']['feldspar'] = '#d19275';
$GLOBALS['csstidy']['replace_colors']['firebrick'] = '#b22222';
$GLOBALS['csstidy']['replace_colors']['floralwhite'] = '#fffaf0';
$GLOBALS['csstidy']['replace_colors']['forestgreen'] = '#228b22';
$GLOBALS['csstidy']['replace_colors']['gainsboro'] = '#dcdcdc';
$GLOBALS['csstidy']['replace_colors']['ghostwhite'] = '#f8f8ff';
$GLOBALS['csstidy']['replace_colors']['gold'] = '#ffd700';
$GLOBALS['csstidy']['replace_colors']['goldenrod'] = '#daa520';
$GLOBALS['csstidy']['replace_colors']['greenyellow'] = '#adff2f';
$GLOBALS['csstidy']['replace_colors']['honeydew'] = '#f0fff0';
$GLOBALS['csstidy']['replace_colors']['hotpink'] = '#ff69b4';
$GLOBALS['csstidy']['replace_colors']['indianred'] = '#cd5c5c';
$GLOBALS['csstidy']['replace_colors']['indigo'] = '#4b0082';
$GLOBALS['csstidy']['replace_colors']['ivory'] = '#fffff0';
$GLOBALS['csstidy']['replace_colors']['khaki'] = '#f0e68c';
$GLOBALS['csstidy']['replace_colors']['lavender'] = '#e6e6fa';
$GLOBALS['csstidy']['replace_colors']['lavenderblush'] = '#fff0f5';
$GLOBALS['csstidy']['replace_colors']['lawngreen'] = '#7cfc00';
$GLOBALS['csstidy']['replace_colors']['lemonchiffon'] = '#fffacd';
$GLOBALS['csstidy']['replace_colors']['lightblue'] = '#add8e6';
$GLOBALS['csstidy']['replace_colors']['lightcoral'] = '#f08080';
$GLOBALS['csstidy']['replace_colors']['lightcyan'] = '#e0ffff';
$GLOBALS['csstidy']['replace_colors']['lightgoldenrodyellow'] = '#fafad2';
$GLOBALS['csstidy']['replace_colors']['lightgrey'] = '#d3d3d3';
$GLOBALS['csstidy']['replace_colors']['lightgreen'] = '#90ee90';
$GLOBALS['csstidy']['replace_colors']['lightpink'] = '#ffb6c1';
$GLOBALS['csstidy']['replace_colors']['lightsalmon'] = '#ffa07a';
$GLOBALS['csstidy']['replace_colors']['lightseagreen'] = '#20b2aa';
$GLOBALS['csstidy']['replace_colors']['lightskyblue'] = '#87cefa';
$GLOBALS['csstidy']['replace_colors']['lightslateblue'] = '#8470ff';
$GLOBALS['csstidy']['replace_colors']['lightslategray'] = '#778899';
$GLOBALS['csstidy']['replace_colors']['lightsteelblue'] = '#b0c4de';
$GLOBALS['csstidy']['replace_colors']['lightyellow'] = '#ffffe0';
$GLOBALS['csstidy']['replace_colors']['limegreen'] = '#32cd32';
$GLOBALS['csstidy']['replace_colors']['linen'] = '#faf0e6';
$GLOBALS['csstidy']['replace_colors']['magenta'] = '#ff00ff';
$GLOBALS['csstidy']['replace_colors']['mediumaquamarine'] = '#66cdaa';
$GLOBALS['csstidy']['replace_colors']['mediumblue'] = '#0000cd';
$GLOBALS['csstidy']['replace_colors']['mediumorchid'] = '#ba55d3';
$GLOBALS['csstidy']['replace_colors']['mediumpurple'] = '#9370d8';
$GLOBALS['csstidy']['replace_colors']['mediumseagreen'] = '#3cb371';
$GLOBALS['csstidy']['replace_colors']['mediumslateblue'] = '#7b68ee';
$GLOBALS['csstidy']['replace_colors']['mediumspringgreen'] = '#00fa9a';
$GLOBALS['csstidy']['replace_colors']['mediumturquoise'] = '#48d1cc';
$GLOBALS['csstidy']['replace_colors']['mediumvioletred'] = '#c71585';
$GLOBALS['csstidy']['replace_colors']['midnightblue'] = '#191970';
$GLOBALS['csstidy']['replace_colors']['mintcream'] = '#f5fffa';
$GLOBALS['csstidy']['replace_colors']['mistyrose'] = '#ffe4e1';
$GLOBALS['csstidy']['replace_colors']['moccasin'] = '#ffe4b5';
$GLOBALS['csstidy']['replace_colors']['navajowhite'] = '#ffdead';
$GLOBALS['csstidy']['replace_colors']['oldlace'] = '#fdf5e6';
$GLOBALS['csstidy']['replace_colors']['olivedrab'] = '#6b8e23';
$GLOBALS['csstidy']['replace_colors']['orangered'] = '#ff4500';
$GLOBALS['csstidy']['replace_colors']['orchid'] = '#da70d6';
$GLOBALS['csstidy']['replace_colors']['palegoldenrod'] = '#eee8aa';
$GLOBALS['csstidy']['replace_colors']['palegreen'] = '#98fb98';
$GLOBALS['csstidy']['replace_colors']['paleturquoise'] = '#afeeee';
$GLOBALS['csstidy']['replace_colors']['palevioletred'] = '#d87093';
$GLOBALS['csstidy']['replace_colors']['papayawhip'] = '#ffefd5';
$GLOBALS['csstidy']['replace_colors']['peachpuff'] = '#ffdab9';
$GLOBALS['csstidy']['replace_colors']['peru'] = '#cd853f';
$GLOBALS['csstidy']['replace_colors']['pink'] = '#ffc0cb';
$GLOBALS['csstidy']['replace_colors']['plum'] = '#dda0dd';
$GLOBALS['csstidy']['replace_colors']['powderblue'] = '#b0e0e6';
$GLOBALS['csstidy']['replace_colors']['rosybrown'] = '#bc8f8f';
$GLOBALS['csstidy']['replace_colors']['royalblue'] = '#4169e1';
$GLOBALS['csstidy']['replace_colors']['saddlebrown'] = '#8b4513';
$GLOBALS['csstidy']['replace_colors']['salmon'] = '#fa8072';
$GLOBALS['csstidy']['replace_colors']['sandybrown'] = '#f4a460';
$GLOBALS['csstidy']['replace_colors']['seagreen'] = '#2e8b57';
$GLOBALS['csstidy']['replace_colors']['seashell'] = '#fff5ee';
$GLOBALS['csstidy']['replace_colors']['sienna'] = '#a0522d';
$GLOBALS['csstidy']['replace_colors']['skyblue'] = '#87ceeb';
$GLOBALS['csstidy']['replace_colors']['slateblue'] = '#6a5acd';
$GLOBALS['csstidy']['replace_colors']['slategray'] = '#708090';
$GLOBALS['csstidy']['replace_colors']['snow'] = '#fffafa';
$GLOBALS['csstidy']['replace_colors']['springgreen'] = '#00ff7f';
$GLOBALS['csstidy']['replace_colors']['steelblue'] = '#4682b4';
$GLOBALS['csstidy']['replace_colors']['tan'] = '#d2b48c';
$GLOBALS['csstidy']['replace_colors']['thistle'] = '#d8bfd8';
$GLOBALS['csstidy']['replace_colors']['tomato'] = '#ff6347';
$GLOBALS['csstidy']['replace_colors']['turquoise'] = '#40e0d0';
$GLOBALS['csstidy']['replace_colors']['violet'] = '#ee82ee';
$GLOBALS['csstidy']['replace_colors']['violetred'] = '#d02090';
$GLOBALS['csstidy']['replace_colors']['wheat'] = '#f5deb3';
$GLOBALS['csstidy']['replace_colors']['whitesmoke'] = '#f5f5f5';
$GLOBALS['csstidy']['replace_colors']['yellowgreen'] = '#9acd32';

/**
 * A list of all shorthand properties that are devided into four properties and/or have four subvalues
 *
 * @global array $GLOBALS['csstidy']['shorthands']
 * @todo Are there new ones in CSS3?
 * @see dissolve_4value_shorthands()
 * @see merge_4value_shorthands()
 * @version 1.0
 */
$GLOBALS['csstidy']['shorthands'] = array();
$GLOBALS['csstidy']['shorthands']['border-color'] = array('border-top-color','border-right-color','border-bottom-color','border-left-color');
$GLOBALS['csstidy']['shorthands']['border-style'] = array('border-top-style','border-right-style','border-bottom-style','border-left-style');
$GLOBALS['csstidy']['shorthands']['border-width'] = array('border-top-width','border-right-width','border-bottom-width','border-left-width');
$GLOBALS['csstidy']['shorthands']['margin'] = array('margin-top','margin-right','margin-bottom','margin-left');
$GLOBALS['csstidy']['shorthands']['padding'] = array('padding-top','padding-right','padding-bottom','padding-left');
$GLOBALS['csstidy']['shorthands']['-moz-border-radius'] = 0;

/**
 * All CSS Properties. Needed for csstidy::property_is_next()
 *
 * @global array $GLOBALS['csstidy']['all_properties']
 * @version 1.1
 * @see csstidy::property_is_next()
 */
$GLOBALS['csstidy']['all_properties']['alignment-adjust'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['alignment-baseline'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['animation'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['animation-delay'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['animation-direction'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['animation-duration'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['animation-iteration-count'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['animation-name'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['animation-play-state'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['animation-timing-function'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['appearance'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['azimuth'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['backface-visibility'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['background'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['background-attachment'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['background-clip'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['background-color'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['background-image'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['background-origin'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['background-position'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['background-repeat'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['background-size'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['baseline-shift'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['binding'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['bleed'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['bookmark-label'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['bookmark-level'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['bookmark-state'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['bookmark-target'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-bottom'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-bottom-color'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-bottom-left-radius'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-bottom-right-radius'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-bottom-style'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-bottom-width'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-collapse'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-color'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-image'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-image-outset'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-image-repeat'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-image-slice'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-image-source'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-image-width'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-left'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-left-color'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-left-style'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-left-width'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-radius'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-right'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-right-color'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-right-style'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-right-width'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-spacing'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-style'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-top'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-top-color'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-top-left-radius'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-top-right-radius'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-top-style'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-top-width'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['border-width'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['bottom'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['box-decoration-break'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['box-shadow'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['box-sizing'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['break-after'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['break-before'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['break-inside'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['caption-side'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['clear'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['clip'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['color'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['color-profile'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-count'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-fill'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-gap'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-rule'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-rule-color'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-rule-style'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-rule-width'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-span'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['column-width'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['columns'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['content'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['counter-increment'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['counter-reset'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['crop'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['cue'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['cue-after'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['cue-before'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['cursor'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['direction'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['display'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['dominant-baseline'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['drop-initial-after-adjust'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['drop-initial-after-align'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['drop-initial-before-adjust'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['drop-initial-before-align'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['drop-initial-size'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['drop-initial-value'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['elevation'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['empty-cells'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['fit'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['fit-position'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['flex-align'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['flex-flow'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['flex-line-pack'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['flex-order'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['flex-pack'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['float'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['float-offset'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['font'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['font-family'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['font-size'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['font-size-adjust'] = 'CSS2.0,CSS3.0';
$GLOBALS['csstidy']['all_properties']['font-stretch'] = 'CSS2.0,CSS3.0';
$GLOBALS['csstidy']['all_properties']['font-style'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['font-variant'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['font-weight'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['grid-columns'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['grid-rows'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['hanging-punctuation'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['height'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['hyphenate-after'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['hyphenate-before'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['hyphenate-character'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['hyphenate-lines'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['hyphenate-resource'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['hyphens'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['icon'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['image-orientation'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['image-rendering'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['image-resolution'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['inline-box-align'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['left'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['letter-spacing'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['line-break'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['line-height'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['line-stacking'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['line-stacking-ruby'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['line-stacking-shift'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['line-stacking-strategy'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['list-style'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['list-style-image'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['list-style-position'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['list-style-type'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['margin'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['margin-bottom'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['margin-left'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['margin-right'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['margin-top'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['marker-offset'] = 'CSS2.0,CSS3.0';
$GLOBALS['csstidy']['all_properties']['marks'] = 'CSS2.0,CSS3.0';
$GLOBALS['csstidy']['all_properties']['marquee-direction'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['marquee-loop'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['marquee-play-count'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['marquee-speed'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['marquee-style'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['max-height'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['max-width'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['min-height'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['min-width'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['move-to'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['nav-down'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['nav-index'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['nav-left'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['nav-right'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['nav-up'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['opacity'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['orphans'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['outline'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['outline-color'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['outline-offset'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['outline-style'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['outline-width'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['overflow'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['overflow-style'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['overflow-wrap'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['overflow-x'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['overflow-y'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['padding'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['padding-bottom'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['padding-left'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['padding-right'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['padding-top'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['page'] = 'CSS2.0,CSS3.0';
$GLOBALS['csstidy']['all_properties']['page-break-after'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['page-break-before'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['page-break-inside'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['page-policy'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['pause'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['pause-after'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['pause-before'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['perspective'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['perspective-origin'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['phonemes'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['pitch'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['pitch-range'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['play-during'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['position'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['presentation-level'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['punctuation-trim'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['quotes'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['rendering-intent'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['resize'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['rest'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['rest-after'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['rest-before'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['richness'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['right'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['rotation'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['rotation-point'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['ruby-align'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['ruby-overhang'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['ruby-position'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['ruby-span'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['size'] = 'CSS2.0,CSS3.0';
$GLOBALS['csstidy']['all_properties']['speak'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['speak-header'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['speak-numeral'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['speak-punctuation'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['speech-rate'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['src'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['stress'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['string-set'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['tab-size'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['table-layout'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['target'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['target-name'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['target-new'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['target-position'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-align'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-align-last'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-decoration'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-decoration-color'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-decoration-line'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-decoration-skip'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-decoration-style'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-emphasis'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-emphasis-color'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-emphasis-position'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-emphasis-style'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-height'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-indent'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-justify'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-outline'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-shadow'] = 'CSS2.0,CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-space-collapse'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-transform'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-underline-position'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['text-wrap'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['top'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['transform'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['transform-origin'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['transform-style'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['transition'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['transition-delay'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['transition-duration'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['transition-property'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['transition-timing-function'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['unicode-bidi'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['vertical-align'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['visibility'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['voice-balance'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['voice-duration'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['voice-family'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['voice-pitch'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['voice-pitch-range'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['voice-rate'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['voice-stress'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['voice-volume'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['volume'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['white-space'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['widows'] = 'CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['width'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['word-break'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['word-spacing'] = 'CSS1.0,CSS2.0,CSS2.1,CSS3.0';
$GLOBALS['csstidy']['all_properties']['word-wrap'] = 'CSS3.0';
$GLOBALS['csstidy']['all_properties']['z-index'] = 'CSS2.0,CSS2.1,CSS3.0';

/**
 * An array containing all properties that can accept a quoted string as a value.
 *
 * @global array $GLOBALS['csstidy']['quoted_string_properties']
 */
$GLOBALS['csstidy']['quoted_string_properties'] = array('content', 'font-family', 'quotes');

/**
 * An array containing all properties that can be defined multiple times without being overwritten.
 *
 * @global array $GLOBALS['csstidy']['quoted_string_properties']
 */
$GLOBALS['csstidy']['multiple_properties'] = array('background', 'background-image');

/**
 * An array containing all predefined templates.
 *
 * @global array $GLOBALS['csstidy']['predefined_templates']
 * @version 1.0
 * @see csstidy::load_template()
 */
$GLOBALS['csstidy']['predefined_templates']['default'][] = '<span class="at">'; //string before @rule
$GLOBALS['csstidy']['predefined_templates']['default'][] = '</span> <span class="format">{</span>'."\n"; //bracket after @-rule
$GLOBALS['csstidy']['predefined_templates']['default'][] = '<span class="selector">'; //string before selector
$GLOBALS['csstidy']['predefined_templates']['default'][] = '</span> <span class="format">{</span>'."\n"; //bracket after selector
$GLOBALS['csstidy']['predefined_templates']['default'][] = '<span class="property">'; //string before property
$GLOBALS['csstidy']['predefined_templates']['default'][] = '</span><span class="value">'; //string after property+before value
$GLOBALS['csstidy']['predefined_templates']['default'][] = '</span><span class="format">;</span>'."\n"; //string after value
$GLOBALS['csstidy']['predefined_templates']['default'][] = '<span class="format">}</span>'; //closing bracket - selector
$GLOBALS['csstidy']['predefined_templates']['default'][] = "\n\n"; //space between blocks {...}
$GLOBALS['csstidy']['predefined_templates']['default'][] = "\n".'<span class="format">}</span>'. "\n\n"; //closing bracket @-rule
$GLOBALS['csstidy']['predefined_templates']['default'][] = ''; //indent in @-rule
$GLOBALS['csstidy']['predefined_templates']['default'][] = '<span class="comment">'; // before comment
$GLOBALS['csstidy']['predefined_templates']['default'][] = '</span>'."\n"; // after comment
$GLOBALS['csstidy']['predefined_templates']['default'][] = "\n"; // after each line @-rule

$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '<span class="at">';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '</span> <span class="format">{</span>'."\n";
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '<span class="selector">';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '</span><span class="format">{</span>';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '<span class="property">';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '</span><span class="value">';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '</span><span class="format">;</span>';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '<span class="format">}</span>';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = "\n";
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = "\n". '<span class="format">}'."\n".'</span>';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '';
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '<span class="comment">'; // before comment
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = '</span>'; // after comment
$GLOBALS['csstidy']['predefined_templates']['high_compression'][] = "\n";

$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '<span class="at">';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '</span><span class="format">{</span>';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '<span class="selector">';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '</span><span class="format">{</span>';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '<span class="property">';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '</span><span class="value">';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '</span><span class="format">;</span>';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '<span class="format">}</span>';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '<span class="format">}</span>';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '';
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '<span class="comment">'; // before comment
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '</span>'; // after comment
$GLOBALS['csstidy']['predefined_templates']['highest_compression'][] = '';

$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '<span class="at">';
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '</span> <span class="format">{</span>'."\n";
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '<span class="selector">';
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '</span>'."\n".'<span class="format">{</span>'."\n";
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '	<span class="property">';
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '</span><span class="value">';
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '</span><span class="format">;</span>'."\n";
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '<span class="format">}</span>';
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = "\n\n";
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = "\n".'<span class="format">}</span>'."\n\n";
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '	';
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '<span class="comment">'; // before comment
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = '</span>'."\n"; // after comment
$GLOBALS['csstidy']['predefined_templates']['low_compression'][] = "\n";


/**
 * CSSTidy - CSS Parser and Optimiser
 *
 * CSS Printing class
 * This class prints CSS data generated by csstidy.
 *
 * Copyright 2005, 2006, 2007 Florian Schmitz
 *
 * This file is part of CSSTidy.
 *
 *   CSSTidy is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU Lesser General Public License as published by
 *   the Free Software Foundation; either version 2.1 of the License, or
 *   (at your option) any later version.
 *
 *   CSSTidy is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Lesser General Public License for more details.
 *
 *   You should have received a copy of the GNU Lesser General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 * @package csstidy
 * @author Florian Schmitz (floele at gmail dot com) 2005-2007
 * @author Brett Zamir (brettz9 at yahoo dot com) 2007
 * @author Cedric Morin (cedric at yterium dot com) 2010-2012
 */

/**
 * CSS Printing class
 *
 * This class prints CSS data generated by csstidy.
 *
 * @package csstidy
 * @author Florian Schmitz (floele at gmail dot com) 2005-2006
 * @version 1.1.0
 */
class csstidy_print {

	/**
	 * Saves the input CSS string
	 * @var string
	 * @access private
	 */
	var $input_css = '';
	/**
	 * Saves the formatted CSS string
	 * @var string
	 * @access public
	 */
	var $output_css = '';
	/**
	 * Saves the formatted CSS string (plain text)
	 * @var string
	 * @access public
	 */
	var $output_css_plain = '';

	/**
	 * Constructor
	 * @param array $css contains the class csstidy
	 * @access private
	 * @version 1.0
	 */
	function csstidy_print(&$css) {
		$this->parser = & $css;
		$this->css = & $css->css;
		$this->template = & $css->template;
		$this->tokens = & $css->tokens;
		$this->charset = & $css->charset;
		$this->import = & $css->import;
		$this->namespace = & $css->namespace;
	}

	/**
	 * Resets output_css and output_css_plain (new css code)
	 * @access private
	 * @version 1.0
	 */
	function _reset() {
		$this->output_css = '';
		$this->output_css_plain = '';
	}

	/**
	 * Returns the CSS code as plain text
	 * @param string $default_media default @media to add to selectors without any @media
	 * @return string
	 * @access public
	 * @version 1.0
	 */
	function plain($default_media='') {
		$this->_print(true, $default_media);
		return $this->output_css_plain;
	}

	/**
	 * Returns the formatted CSS code
	 * @param string $default_media default @media to add to selectors without any @media
	 * @return string
	 * @access public
	 * @version 1.0
	 */
	function formatted($default_media='') {
		$this->_print(false, $default_media);
		return $this->output_css;
	}

	/**
	 * Returns the formatted CSS code to make a complete webpage
	 * @param string $doctype shorthand for the document type
	 * @param bool $externalcss indicates whether styles to be attached internally or as an external stylesheet
	 * @param string $title title to be added in the head of the document
	 * @param string $lang two-letter language code to be added to the output
	 * @return string
	 * @access public
	 * @version 1.4
	 */
	function formatted_page($doctype='xhtml1.1', $externalcss=true, $title='', $lang='en') {
		switch ($doctype) {
			case 'xhtml1.0strict':
				$doctype_output = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
				break;
			case 'xhtml1.1':
			default:
				$doctype_output = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
				"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
				break;
		}

		$output = $cssparsed = '';
		$this->output_css_plain = & $output;

		$output .= $doctype_output . "\n" . '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $lang . '"';
		$output .= ( $doctype === 'xhtml1.1') ? '>' : ' lang="' . $lang . '">';
		$output .= "\n<head>\n    <title>$title</title>";

		if ($externalcss) {
			$output .= "\n    <style type=\"text/css\">\n";
			$cssparsed = file_get_contents('cssparsed.css');
			$output .= $cssparsed; // Adds an invisible BOM or something, but not in css_optimised.php
			$output .= "\n</style>";
		} else {
			$output .= "\n" . '    <link rel="stylesheet" type="text/css" href="cssparsed.css" />';
//			}
		}
		$output .= "\n</head>\n<body><code id=\"copytext\">";
		$output .= $this->formatted();
		$output .= '</code>' . "\n" . '</body></html>';
		return $this->output_css_plain;
	}

	/**
	 * Returns the formatted CSS Code and saves it into $this->output_css and $this->output_css_plain
	 * @param bool $plain plain text or not
	 * @param string $default_media default @media to add to selectors without any @media
	 * @access private
	 * @version 2.0
	 */
	function _print($plain = false, $default_media='') {
		if ($this->output_css && $this->output_css_plain) {
			return;
		}

		$output = '';
		if (!$this->parser->get_cfg('preserve_css')) {
			$this->_convert_raw_css($default_media);
		}

		$template = & $this->template;

		if ($plain) {
			$template = array_map('strip_tags', $template);
		}

		if ($this->parser->get_cfg('timestamp')) {
			array_unshift($this->tokens, array(COMMENT, ' CSSTidy ' . $this->parser->version . ': ' . date('r') . ' '));
		}

		if (!empty($this->charset)) {
			$output .= $template[0] . '@charset ' . $template[5] . $this->charset . $template[6] . $template[13];
		}

		if (!empty($this->import)) {
			for ($i = 0, $size = count($this->import); $i < $size; $i++) {
				if (substr($this->import[$i], 0, 4) === 'url(' && substr($this->import[$i], -1, 1) === ')') {
					$this->import[$i] = '"' . substr($this->import[$i], 4, -1) . '"';
					$this->parser->log('Optimised @import : Removed "url("', 'Information');
				}
				$output .= $template[0] . '@import ' . $template[5] . $this->import[$i] . $template[6] . $template[13];
			}
		}

		if (!empty($this->namespace)) {
			if (($p=strpos($this->namespace,"url("))!==false && substr($this->namespace, -1, 1) === ')') {
				$this->namespace = substr_replace($this->namespace,'"',$p,4);
				$this->namespace = substr($this->namespace, 0, -1) . '"';
				$this->parser->log('Optimised @namespace : Removed "url("', 'Information');
			}
			$output .= $template[0] . '@namespace ' . $template[5] . $this->namespace . $template[6] . $template[13];
		}

		$in_at_out = '';
		$out = & $output;

		foreach ($this->tokens as $key => $token) {
			switch ($token[0]) {
				case AT_START:
					$out .= $template[0] . $this->_htmlsp($token[1], $plain) . $template[1];
					$out = & $in_at_out;
					break;

				case SEL_START:
					if ($this->parser->get_cfg('lowercase_s'))
						$token[1] = strtolower($token[1]);
					$out .= ( $token[1]{0} !== '@') ? $template[2] . $this->_htmlsp($token[1], $plain) : $template[0] . $this->_htmlsp($token[1], $plain);
					$out .= $template[3];
					break;

				case PROPERTY:
					if ($this->parser->get_cfg('case_properties') === 2) {
						$token[1] = strtoupper($token[1]);
					} elseif ($this->parser->get_cfg('case_properties') === 1) {
						$token[1] = strtolower($token[1]);
					}
					$out .= $template[4] . $this->_htmlsp($token[1], $plain) . ':' . $template[5];
					break;

				case VALUE:
					$out .= $this->_htmlsp($token[1], $plain);
					if ($this->_seeknocomment($key, 1) == SEL_END && $this->parser->get_cfg('remove_last_;')) {
						$out .= str_replace(';', '', $template[6]);
					} else {
						$out .= $template[6];
					}
					break;

				case SEL_END:
					$out .= $template[7];
					if ($this->_seeknocomment($key, 1) != AT_END)
						$out .= $template[8];
					break;

				case AT_END:
					$out = & $output;
					$out .= $template[10] . str_replace("\n", "\n" . $template[10], $in_at_out);
					$in_at_out = '';
					$out .= $template[9];
					break;

				case COMMENT:
					$out .= $template[11] . '/*' . $this->_htmlsp($token[1], $plain) . '*/' . $template[12];
					break;
			}
		}

		$output = trim($output);

		if (!$plain) {
			$this->output_css = $output;
			$this->_print(true);
		} else {
			// If using spaces in the template, don't want these to appear in the plain output
			$this->output_css_plain = str_replace('&#160;', '', $output);
		}
	}

	/**
	 * Gets the next token type which is $move away from $key, excluding comments
	 * @param integer $key current position
	 * @param integer $move move this far
	 * @return mixed a token type
	 * @access private
	 * @version 1.0
	 */
	function _seeknocomment($key, $move) {
		$go = ($move > 0) ? 1 : -1;
		for ($i = $key + 1; abs($key - $i) - 1 < abs($move); $i += $go) {
			if (!isset($this->tokens[$i])) {
				return;
			}
			if ($this->tokens[$i][0] == COMMENT) {
				$move += 1;
				continue;
			}
			return $this->tokens[$i][0];
		}
	}

	/**
	 * Converts $this->css array to a raw array ($this->tokens)
	 * @param string $default_media default @media to add to selectors without any @media
	 * @access private
	 * @version 1.0
	 */
	function _convert_raw_css($default_media='') {
		$this->tokens = array();
		$sort_selectors = $this->parser->get_cfg('sort_selectors');
		$sort_properties = $this->parser->get_cfg('sort_properties');

		foreach ($this->css as $medium => $val) {
			if ($sort_selectors)
				ksort($val);
			if (intval($medium) < DEFAULT_AT) {
				// un medium vide (contenant @font-face ou autre @) ne produit aucun conteneur
				if (strlen(trim($medium))) {
					$this->parser->_add_token(AT_START, $medium, true);
				}
			} elseif ($default_media) {
				$this->parser->_add_token(AT_START, $default_media, true);
			}

			foreach ($val as $selector => $vali) {
				if ($sort_properties)
					ksort($vali);
				$this->parser->_add_token(SEL_START, $selector, true);

				$invalid = array(
					'*' => array(), // IE7 hacks first
					'_' => array(), // IE6 hacks
					'/' => array(), // IE6 hacks
					'-' => array()  // IE6 hacks
				);
				foreach ($vali as $property => $valj) {
					if (strncmp($property,"//",2)!==0) {
						$matches = array();
						if ($sort_properties && preg_match('/^(\*|_|\/|-)(?!(ms|moz|o\b|xv|atsc|wap|khtml|webkit|ah|hp|ro|rim|tc)-)/', $property, $matches)) {
							$invalid[$matches[1]][$property] = $valj;
						} else {
							$this->parser->_add_token(PROPERTY, $property, true);
							$this->parser->_add_token(VALUE, $valj, true);
						}
					}
				}
				foreach ($invalid as $prefix => $props) {
					foreach ($props as $property => $valj) {
						$this->parser->_add_token(PROPERTY, $property, true);
						$this->parser->_add_token(VALUE, $valj, true);
					}
				}
				$this->parser->_add_token(SEL_END, $selector, true);
			}

			if (intval($medium) < DEFAULT_AT) {
				// un medium vide (contenant @font-face ou autre @) ne produit aucun conteneur
				if (strlen(trim($medium))) {
					$this->parser->_add_token(AT_END, $medium, true);
				}
			} elseif ($default_media) {
				$this->parser->_add_token(AT_END, $default_media, true);
			}
		}
	}

	/**
	 * Same as htmlspecialchars, only that chars are not replaced if $plain !== true. This makes  print_code() cleaner.
	 * @param string $string
	 * @param bool $plain
	 * @return string
	 * @see csstidy_print::_print()
	 * @access private
	 * @version 1.0
	 */
	function _htmlsp($string, $plain) {
		if (!$plain) {
			return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
		}
		return $string;
	}

	/**
	 * Get compression ratio
	 * @access public
	 * @return float
	 * @version 1.2
	 */
	function get_ratio() {
		if (!$this->output_css_plain) {
			$this->formatted();
		}
		return round((strlen($this->input_css) - strlen($this->output_css_plain)) / strlen($this->input_css), 3) * 100;
	}

	/**
	 * Get difference between the old and new code in bytes and prints the code if necessary.
	 * @access public
	 * @return string
	 * @version 1.1
	 */
	function get_diff() {
		if (!$this->output_css_plain) {
			$this->formatted();
		}

		$diff = strlen($this->output_css_plain) - strlen($this->input_css);

		if ($diff > 0) {
			return '+' . $diff;
		} elseif ($diff == 0) {
			return '+-' . $diff;
		}

		return $diff;
	}

	/**
	 * Get the size of either input or output CSS in KB
	 * @param string $loc default is "output"
	 * @access public
	 * @return integer
	 * @version 1.0
	 */
	function size($loc = 'output') {
		if ($loc === 'output' && !$this->output_css) {
			$this->formatted();
		}

		if ($loc === 'input') {
			return (strlen($this->input_css) / 1000);
		} else {
			return (strlen($this->output_css_plain) / 1000);
		}
	}

}


/**
 * CSSTidy - CSS Parser and Optimiser
 *
 * CSS Optimising Class
 * This class optimises CSS data generated by csstidy.
 *
 * Copyright 2005, 2006, 2007 Florian Schmitz
 *
 * This file is part of CSSTidy.
 *
 *   CSSTidy is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU Lesser General Public License as published by
 *   the Free Software Foundation; either version 2.1 of the License, or
 *   (at your option) any later version.
 *
 *   CSSTidy is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Lesser General Public License for more details.
 *
 *   You should have received a copy of the GNU Lesser General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 * @package csstidy
 * @author Florian Schmitz (floele at gmail dot com) 2005-2007
 * @author Brett Zamir (brettz9 at yahoo dot com) 2007
 * @author Nikolay Matsievsky (speed at webo dot name) 2009-2010
 * @author Cedric Morin (cedric at yterium dot com) 2010-2012
 */

/**
 * CSS Optimising Class
 *
 * This class optimises CSS data generated by csstidy.
 *
 * @package csstidy
 * @author Florian Schmitz (floele at gmail dot com) 2005-2006
 * @version 1.0
 */
class csstidy_optimise {

	/**
	 * Constructor
	 * @param array $css contains the class csstidy
	 * @access private
	 * @version 1.0
	 */
	function csstidy_optimise(&$css) {
		$this->parser = & $css;
		$this->css = & $css->css;
		$this->sub_value = & $css->sub_value;
		$this->at = & $css->at;
		$this->selector = & $css->selector;
		$this->property = & $css->property;
		$this->value = & $css->value;
	}

	/**
	 * Optimises $css after parsing
	 * @access public
	 * @version 1.0
	 */
	function postparse() {
		if ($this->parser->get_cfg('preserve_css')) {
			return;
		}

		if ($this->parser->get_cfg('merge_selectors') === 2) {
			foreach ($this->css as $medium => $value) {
				$this->merge_selectors($this->css[$medium]);
			}
		}

		if ($this->parser->get_cfg('discard_invalid_selectors')) {
			foreach ($this->css as $medium => $value) {
				$this->discard_invalid_selectors($this->css[$medium]);
			}
		}

		if ($this->parser->get_cfg('optimise_shorthands') > 0) {
			foreach ($this->css as $medium => $value) {
				foreach ($value as $selector => $value1) {
					$this->css[$medium][$selector] = csstidy_optimise::merge_4value_shorthands($this->css[$medium][$selector]);

					if ($this->parser->get_cfg('optimise_shorthands') < 2) {
						continue;
					}

					$this->css[$medium][$selector] = csstidy_optimise::merge_font($this->css[$medium][$selector]);

					if ($this->parser->get_cfg('optimise_shorthands') < 3) {
						continue;
					}

					$this->css[$medium][$selector] = csstidy_optimise::merge_bg($this->css[$medium][$selector]);
					if (empty($this->css[$medium][$selector])) {
						unset($this->css[$medium][$selector]);
					}
				}
			}
		}
	}

	/**
	 * Optimises values
	 * @access public
	 * @version 1.0
	 */
	function value() {
		$shorthands = & $GLOBALS['csstidy']['shorthands'];

		// optimise shorthand properties
		if (isset($shorthands[$this->property])) {
			$temp = csstidy_optimise::shorthand($this->value); // FIXME - move
			if ($temp != $this->value) {
				$this->parser->log('Optimised shorthand notation (' . $this->property . '): Changed "' . $this->value . '" to "' . $temp . '"', 'Information');
			}
			$this->value = $temp;
		}

		// Remove whitespace at ! important
		if ($this->value != $this->compress_important($this->value)) {
			$this->parser->log('Optimised !important', 'Information');
		}
	}

	/**
	 * Optimises shorthands
	 * @access public
	 * @version 1.0
	 */
	function shorthands() {
		$shorthands = & $GLOBALS['csstidy']['shorthands'];

		if (!$this->parser->get_cfg('optimise_shorthands') || $this->parser->get_cfg('preserve_css')) {
			return;
		}

		if ($this->property === 'font' && $this->parser->get_cfg('optimise_shorthands') > 1) {
			$this->css[$this->at][$this->selector]['font']='';
			$this->parser->merge_css_blocks($this->at, $this->selector, csstidy_optimise::dissolve_short_font($this->value));
		}
		if ($this->property === 'background' && $this->parser->get_cfg('optimise_shorthands') > 2) {
			$this->css[$this->at][$this->selector]['background']='';
			$this->parser->merge_css_blocks($this->at, $this->selector, csstidy_optimise::dissolve_short_bg($this->value));
		}
		if (isset($shorthands[$this->property])) {
			$this->parser->merge_css_blocks($this->at, $this->selector, csstidy_optimise::dissolve_4value_shorthands($this->property, $this->value));
			if (is_array($shorthands[$this->property])) {
				$this->css[$this->at][$this->selector][$this->property] = '';
			}
		}
	}

	/**
	 * Optimises a sub-value
	 * @access public
	 * @version 1.0
	 */
	function subvalue() {
		$replace_colors = & $GLOBALS['csstidy']['replace_colors'];

		$this->sub_value = trim($this->sub_value);
		if ($this->sub_value == '') { // caution : '0'
			return;
		}

		$important = '';
		if (csstidy::is_important($this->sub_value)) {
			$important = '!important';
		}
		$this->sub_value = csstidy::gvw_important($this->sub_value);

		// Compress font-weight
		if ($this->property === 'font-weight' && $this->parser->get_cfg('compress_font-weight')) {
			if ($this->sub_value === 'bold') {
				$this->sub_value = '700';
				$this->parser->log('Optimised font-weight: Changed "bold" to "700"', 'Information');
			} elseif ($this->sub_value === 'normal') {
				$this->sub_value = '400';
				$this->parser->log('Optimised font-weight: Changed "normal" to "400"', 'Information');
			}
		}

		$temp = $this->compress_numbers($this->sub_value);
		if (strcasecmp($temp, $this->sub_value) !== 0) {
			if (strlen($temp) > strlen($this->sub_value)) {
				$this->parser->log('Fixed invalid number: Changed "' . $this->sub_value . '" to "' . $temp . '"', 'Warning');
			} else {
				$this->parser->log('Optimised number: Changed "' . $this->sub_value . '" to "' . $temp . '"', 'Information');
			}
			$this->sub_value = $temp;
		}
		if ($this->parser->get_cfg('compress_colors')) {
			$temp = $this->cut_color($this->sub_value);
			if ($temp !== $this->sub_value) {
				if (isset($replace_colors[$this->sub_value])) {
					$this->parser->log('Fixed invalid color name: Changed "' . $this->sub_value . '" to "' . $temp . '"', 'Warning');
				} else {
					$this->parser->log('Optimised color: Changed "' . $this->sub_value . '" to "' . $temp . '"', 'Information');
				}
				$this->sub_value = $temp;
			}
		}
		$this->sub_value .= $important;
	}

	/**
	 * Compresses shorthand values. Example: margin:1px 1px 1px 1px -> margin:1px
	 * @param string $value
	 * @access public
	 * @return string
	 * @version 1.0
	 */
	function shorthand($value) {
		$important = '';
		if (csstidy::is_important($value)) {
			$values = csstidy::gvw_important($value);
			$important = '!important';
		}
		else
			$values = $value;

		$values = explode(' ', $values);
		switch (count($values)) {
			case 4:
				if ($values[0] == $values[1] && $values[0] == $values[2] && $values[0] == $values[3]) {
					return $values[0] . $important;
				} elseif ($values[1] == $values[3] && $values[0] == $values[2]) {
					return $values[0] . ' ' . $values[1] . $important;
				} elseif ($values[1] == $values[3]) {
					return $values[0] . ' ' . $values[1] . ' ' . $values[2] . $important;
				}
				break;

			case 3:
				if ($values[0] == $values[1] && $values[0] == $values[2]) {
					return $values[0] . $important;
				} elseif ($values[0] == $values[2]) {
					return $values[0] . ' ' . $values[1] . $important;
				}
				break;

			case 2:
				if ($values[0] == $values[1]) {
					return $values[0] . $important;
				}
				break;
		}

		return $value;
	}

	/**
	 * Removes unnecessary whitespace in ! important
	 * @param string $string
	 * @return string
	 * @access public
	 * @version 1.1
	 */
	function compress_important(&$string) {
		if (csstidy::is_important($string)) {
			$string = csstidy::gvw_important($string) . '!important';
		}
		return $string;
	}

	/**
	 * Color compression function. Converts all rgb() values to #-values and uses the short-form if possible. Also replaces 4 color names by #-values.
	 * @param string $color
	 * @return string
	 * @version 1.1
	 */
	function cut_color($color) {
		$replace_colors = & $GLOBALS['csstidy']['replace_colors'];

		// if it's a string, don't touch !
		if (strncmp($color,"'",1)==0 OR strncmp($color,'"',1)==0)
			return $color;

		/* expressions complexes de type gradient */
		if (strpos($color,"(")!==false AND strncmp($color,'rgb(',4)!=0) {
			// on ne touche pas aux couleurs dans les expression ms, c'est trop sensible
			if (stripos($color,"progid:")!==false)
				return $color;
			preg_match_all(",rgb\([^)]+\),i",$color,$matches,PREG_SET_ORDER);
			if (count($matches)) {
				foreach ($matches as $m) {
					$color = str_replace($m[0],$this->cut_color($m[0]),$color);
				}
			}
			preg_match_all(",#[0-9a-f]{6}(?=[^0-9a-f]),i",$color,$matches,PREG_SET_ORDER);
			if (count($matches)) {
				foreach ($matches as $m) {
					$color = str_replace($m[0],$this->cut_color($m[0]),$color);
				}
			}
			return $color;
		}

		// rgb(0,0,0) -> #000000 (or #000 in this case later)
		if (strncasecmp($color, 'rgb(', 4)==0) {
			$color_tmp = substr($color, 4, strlen($color) - 5);
			$color_tmp = explode(',', $color_tmp);
			for ($i = 0; $i < count($color_tmp); $i++) {
				$color_tmp[$i] = trim($color_tmp[$i]);
				if (substr($color_tmp[$i], -1) === '%') {
					$color_tmp[$i] = round((255 * $color_tmp[$i]) / 100);
				}
				if ($color_tmp[$i] > 255)
					$color_tmp[$i] = 255;
			}
			$color = '#';
			for ($i = 0; $i < 3; $i++) {
				if ($color_tmp[$i] < 16) {
					$color .= '0' . dechex($color_tmp[$i]);
				} else {
					$color .= dechex($color_tmp[$i]);
				}
			}
		}

		// Fix bad color names
		if (isset($replace_colors[strtolower($color)])) {
			$color = $replace_colors[strtolower($color)];
		}

		// #aabbcc -> #abc
		if (strlen($color) == 7) {
			$color_temp = strtolower($color);
			if ($color_temp{0} === '#' && $color_temp{1} == $color_temp{2} && $color_temp{3} == $color_temp{4} && $color_temp{5} == $color_temp{6}) {
				$color = '#' . $color{1} . $color{3} . $color{5};
			}
		}

		switch (strtolower($color)) {
			/* color name -> hex code */
			case 'black': return '#000';
			case 'fuchsia': return '#f0f';
			case 'white': return '#fff';
			case 'yellow': return '#ff0';

			/* hex code -> color name */
			case '#800000': return 'maroon';
			case '#ffa500': return 'orange';
			case '#808000': return 'olive';
			case '#800080': return 'purple';
			case '#008000': return 'green';
			case '#000080': return 'navy';
			case '#008080': return 'teal';
			case '#c0c0c0': return 'silver';
			case '#808080': return 'gray';
			case '#f00': return 'red';
		}

		return $color;
	}

	/**
	 * Compresses numbers (ie. 1.0 becomes 1 or 1.100 becomes 1.1 )
	 * @param string $subvalue
	 * @return string
	 * @version 1.2
	 */
	function compress_numbers($subvalue) {
		$unit_values = & $GLOBALS['csstidy']['unit_values'];
		$color_values = & $GLOBALS['csstidy']['color_values'];

		// for font:1em/1em sans-serif...;
		if ($this->property === 'font') {
			$temp = explode('/', $subvalue);
		} else {
			$temp = array($subvalue);
		}
		for ($l = 0; $l < count($temp); $l++) {
			// if we are not dealing with a number at this point, do not optimise anything
			$number = $this->AnalyseCssNumber($temp[$l]);
			if ($number === false) {
				return $subvalue;
			}

			// Fix bad colors
			if (in_array($this->property, $color_values)) {
				$temp[$l] = '#' . $temp[$l];
				continue;
			}

			if (abs($number[0]) > 0) {
				if ($number[1] == '' && in_array($this->property, $unit_values, true)) {
					$number[1] = 'px';
				}
			} else {
				$number[1] = '';
			}

			$temp[$l] = $number[0] . $number[1];
		}

		return ((count($temp) > 1) ? $temp[0] . '/' . $temp[1] : $temp[0]);
	}

	/**
	 * Checks if a given string is a CSS valid number. If it is,
	 * an array containing the value and unit is returned
	 * @param string $string
	 * @return array ('unit' if unit is found or '' if no unit exists, number value) or false if no number
	 */
	function AnalyseCssNumber($string) {
		// most simple checks first
		if (strlen($string) == 0 || ctype_alpha($string{0})) {
			return false;
		}

		$units = & $GLOBALS['csstidy']['units'];
		$return = array(0, '');

		$return[0] = floatval($string);
		if (abs($return[0]) > 0 && abs($return[0]) < 1) {
			if ($return[0] < 0) {
				$return[0] = '-' . ltrim(substr($return[0], 1), '0');
			} else {
				$return[0] = ltrim($return[0], '0');
			}
		}

		// Look for unit and split from value if exists
		foreach ($units as $unit) {
			$expectUnitAt = strlen($string) - strlen($unit);
			if (!($unitInString = stristr($string, $unit))) { // mb_strpos() fails with "false"
				continue;
			}
			$actualPosition = strpos($string, $unitInString);
			if ($expectUnitAt === $actualPosition) {
				$return[1] = $unit;
				$string = substr($string, 0, - strlen($unit));
				break;
			}
		}
		if (!is_numeric($string)) {
			return false;
		}
		return $return;
	}

	/**
	 * Merges selectors with same properties. Example: a{color:red} b{color:red} -> a,b{color:red}
	 * Very basic and has at least one bug. Hopefully there is a replacement soon.
	 * @param array $array
	 * @return array
	 * @access public
	 * @version 1.2
	 */
	function merge_selectors(&$array) {
		$css = $array;
		foreach ($css as $key => $value) {
			if (!isset($css[$key])) {
				continue;
			}
			$newsel = '';

			// Check if properties also exist in another selector
			$keys = array();
			// PHP bug (?) without $css = $array; here
			foreach ($css as $selector => $vali) {
				if ($selector == $key) {
					continue;
				}

				if ($css[$key] === $vali) {
					$keys[] = $selector;
				}
			}

			if (!empty($keys)) {
				$newsel = $key;
				unset($css[$key]);
				foreach ($keys as $selector) {
					unset($css[$selector]);
					$newsel .= ',' . $selector;
				}
				$css[$newsel] = $value;
			}
		}
		$array = $css;
	}

	/**
	 * Removes invalid selectors and their corresponding rule-sets as
	 * defined by 4.1.7 in REC-CSS2. This is a very rudimentary check
	 * and should be replaced by a full-blown parsing algorithm or
	 * regular expression
	 * @version 1.4
	 */
	function discard_invalid_selectors(&$array) {
		$invalid = array('+' => true, '~' => true, ',' => true, '>' => true);
		foreach ($array as $selector => $decls) {
			$ok = true;
			$selectors = array_map('trim', explode(',', $selector));
			foreach ($selectors as $s) {
				$simple_selectors = preg_split('/\s*[+>~\s]\s*/', $s);
				foreach ($simple_selectors as $ss) {
					if ($ss === '')
						$ok = false;
					// could also check $ss for internal structure,
					// but that probably would be too slow
				}
			}
			if (!$ok)
				unset($array[$selector]);
		}
	}

	/**
	 * Dissolves properties like padding:10px 10px 10px to padding-top:10px;padding-bottom:10px;...
	 * @param string $property
	 * @param string $value
	 * @return array
	 * @version 1.0
	 * @see merge_4value_shorthands()
	 */
	function dissolve_4value_shorthands($property, $value) {
		$shorthands = & $GLOBALS['csstidy']['shorthands'];
		if (!is_array($shorthands[$property])) {
			$return[$property] = $value;
			return $return;
		}

		$important = '';
		if (csstidy::is_important($value)) {
			$value = csstidy::gvw_important($value);
			$important = '!important';
		}
		$values = explode(' ', $value);


		$return = array();
		if (count($values) == 4) {
			for ($i = 0; $i < 4; $i++) {
				$return[$shorthands[$property][$i]] = $values[$i] . $important;
			}
		} elseif (count($values) == 3) {
			$return[$shorthands[$property][0]] = $values[0] . $important;
			$return[$shorthands[$property][1]] = $values[1] . $important;
			$return[$shorthands[$property][3]] = $values[1] . $important;
			$return[$shorthands[$property][2]] = $values[2] . $important;
		} elseif (count($values) == 2) {
			for ($i = 0; $i < 4; $i++) {
				$return[$shorthands[$property][$i]] = (($i % 2 != 0)) ? $values[1] . $important : $values[0] . $important;
			}
		} else {
			for ($i = 0; $i < 4; $i++) {
				$return[$shorthands[$property][$i]] = $values[0] . $important;
			}
		}

		return $return;
	}

	/**
	 * Explodes a string as explode() does, however, not if $sep is escaped or within a string.
	 * @param string $sep seperator
	 * @param string $string
	 * @return array
	 * @version 1.0
	 */
	function explode_ws($sep, $string) {
		$status = 'st';
		$to = '';

		$output = array();
		$num = 0;
		for ($i = 0, $len = strlen($string); $i < $len; $i++) {
			switch ($status) {
				case 'st':
					if ($string{$i} == $sep && !csstidy::escaped($string, $i)) {
						++$num;
					} elseif ($string{$i} === '"' || $string{$i} === '\'' || $string{$i} === '(' && !csstidy::escaped($string, $i)) {
						$status = 'str';
						$to = ($string{$i} === '(') ? ')' : $string{$i};
						(isset($output[$num])) ? $output[$num] .= $string{$i} : $output[$num] = $string{$i};
					} else {
						(isset($output[$num])) ? $output[$num] .= $string{$i} : $output[$num] = $string{$i};
					}
					break;

				case 'str':
					if ($string{$i} == $to && !csstidy::escaped($string, $i)) {
						$status = 'st';
					}
					(isset($output[$num])) ? $output[$num] .= $string{$i} : $output[$num] = $string{$i};
					break;
			}
		}

		if (isset($output[0])) {
			return $output;
		} else {
			return array($output);
		}
	}

	/**
	 * Merges Shorthand properties again, the opposite of dissolve_4value_shorthands()
	 * @param array $array
	 * @return array
	 * @version 1.2
	 * @see dissolve_4value_shorthands()
	 */
	function merge_4value_shorthands($array) {
		$return = $array;
		$shorthands = & $GLOBALS['csstidy']['shorthands'];

		foreach ($shorthands as $key => $value) {
			if (isset($array[$value[0]]) && isset($array[$value[1]])
							&& isset($array[$value[2]]) && isset($array[$value[3]]) && $value !== 0) {
				$return[$key] = '';

				$important = '';
				for ($i = 0; $i < 4; $i++) {
					$val = $array[$value[$i]];
					if (csstidy::is_important($val)) {
						$important = '!important';
						$return[$key] .= csstidy::gvw_important($val) . ' ';
					} else {
						$return[$key] .= $val . ' ';
					}
					unset($return[$value[$i]]);
				}
				$return[$key] = csstidy_optimise::shorthand(trim($return[$key] . $important));
			}
		}
		return $return;
	}

	/**
	 * Dissolve background property
	 * @param string $str_value
	 * @return array
	 * @version 1.0
	 * @see merge_bg()
	 * @todo full CSS 3 compliance
	 */
	function dissolve_short_bg($str_value) {
		// don't try to explose background gradient !
		if (stripos($str_value, "gradient(")!==FALSE)
			return array('background'=>$str_value);

		$background_prop_default = & $GLOBALS['csstidy']['background_prop_default'];
		$repeat = array('repeat', 'repeat-x', 'repeat-y', 'no-repeat', 'space');
		$attachment = array('scroll', 'fixed', 'local');
		$clip = array('border', 'padding');
		$origin = array('border', 'padding', 'content');
		$pos = array('top', 'center', 'bottom', 'left', 'right');
		$important = '';
		$return = array('background-image' => null, 'background-size' => null, 'background-repeat' => null, 'background-position' => null, 'background-attachment' => null, 'background-clip' => null, 'background-origin' => null, 'background-color' => null);

		if (csstidy::is_important($str_value)) {
			$important = ' !important';
			$str_value = csstidy::gvw_important($str_value);
		}

		$str_value = csstidy_optimise::explode_ws(',', $str_value);
		for ($i = 0; $i < count($str_value); $i++) {
			$have['clip'] = false;
			$have['pos'] = false;
			$have['color'] = false;
			$have['bg'] = false;

			if (is_array($str_value[$i])) {
				$str_value[$i] = $str_value[$i][0];
			}
			$str_value[$i] = csstidy_optimise::explode_ws(' ', trim($str_value[$i]));

			for ($j = 0; $j < count($str_value[$i]); $j++) {
				if ($have['bg'] === false && (substr($str_value[$i][$j], 0, 4) === 'url(' || $str_value[$i][$j] === 'none')) {
					$return['background-image'] .= $str_value[$i][$j] . ',';
					$have['bg'] = true;
				} elseif (in_array($str_value[$i][$j], $repeat, true)) {
					$return['background-repeat'] .= $str_value[$i][$j] . ',';
				} elseif (in_array($str_value[$i][$j], $attachment, true)) {
					$return['background-attachment'] .= $str_value[$i][$j] . ',';
				} elseif (in_array($str_value[$i][$j], $clip, true) && !$have['clip']) {
					$return['background-clip'] .= $str_value[$i][$j] . ',';
					$have['clip'] = true;
				} elseif (in_array($str_value[$i][$j], $origin, true)) {
					$return['background-origin'] .= $str_value[$i][$j] . ',';
				} elseif ($str_value[$i][$j]{0} === '(') {
					$return['background-size'] .= substr($str_value[$i][$j], 1, -1) . ',';
				} elseif (in_array($str_value[$i][$j], $pos, true) || is_numeric($str_value[$i][$j]{0}) || $str_value[$i][$j]{0} === null || $str_value[$i][$j]{0} === '-' || $str_value[$i][$j]{0} === '.') {
					$return['background-position'] .= $str_value[$i][$j];
					if (!$have['pos'])
						$return['background-position'] .= ' '; else
						$return['background-position'].= ',';
					$have['pos'] = true;
				} elseif (!$have['color']) {
					$return['background-color'] .= $str_value[$i][$j] . ',';
					$have['color'] = true;
				}
			}
		}

		foreach ($background_prop_default as $bg_prop => $default_value) {
			if ($return[$bg_prop] !== null) {
				$return[$bg_prop] = substr($return[$bg_prop], 0, -1) . $important;
			}
			else
				$return[$bg_prop] = $default_value . $important;
		}
		return $return;
	}

	/**
	 * Merges all background properties
	 * @param array $input_css
	 * @return array
	 * @version 1.0
	 * @see dissolve_short_bg()
	 * @todo full CSS 3 compliance
	 */
	function merge_bg($input_css) {
		$background_prop_default = & $GLOBALS['csstidy']['background_prop_default'];
		// Max number of background images. CSS3 not yet fully implemented
		$number_of_values = @max(count(csstidy_optimise::explode_ws(',', $input_css['background-image'])), count(csstidy_optimise::explode_ws(',', $input_css['background-color'])), 1);
		// Array with background images to check if BG image exists
		$bg_img_array = @csstidy_optimise::explode_ws(',', csstidy::gvw_important($input_css['background-image']));
		$new_bg_value = '';
		$important = '';

		// if background properties is here and not empty, don't try anything
		if (isset($input_css['background']) AND $input_css['background'])
			return $input_css;

		for ($i = 0; $i < $number_of_values; $i++) {
			foreach ($background_prop_default as $bg_property => $default_value) {
				// Skip if property does not exist
				if (!isset($input_css[$bg_property])) {
					continue;
				}

				$cur_value = $input_css[$bg_property];
				// skip all optimisation if gradient() somewhere
				if (stripos($cur_value, "gradient(")!==FALSE)
					return $input_css;

				// Skip some properties if there is no background image
				if ((!isset($bg_img_array[$i]) || $bg_img_array[$i] === 'none')
								&& ($bg_property === 'background-size' || $bg_property === 'background-position'
								|| $bg_property === 'background-attachment' || $bg_property === 'background-repeat')) {
					continue;
				}

				// Remove !important
				if (csstidy::is_important($cur_value)) {
					$important = ' !important';
					$cur_value = csstidy::gvw_important($cur_value);
				}

				// Do not add default values
				if ($cur_value === $default_value) {
					continue;
				}

				$temp = csstidy_optimise::explode_ws(',', $cur_value);

				if (isset($temp[$i])) {
					if ($bg_property === 'background-size') {
						$new_bg_value .= '(' . $temp[$i] . ') ';
					} else {
						$new_bg_value .= $temp[$i] . ' ';
					}
				}
			}

			$new_bg_value = trim($new_bg_value);
			if ($i != $number_of_values - 1)
				$new_bg_value .= ',';
		}

		// Delete all background-properties
		foreach ($background_prop_default as $bg_property => $default_value) {
			unset($input_css[$bg_property]);
		}

		// Add new background property
		if ($new_bg_value !== '')
			$input_css['background'] = $new_bg_value . $important;
		elseif(isset ($input_css['background']))
			$input_css['background'] = 'none';

		return $input_css;
	}

	/**
	 * Dissolve font property
	 * @param string $str_value
	 * @return array
	 * @version 1.3
	 * @see merge_font()
	 */
	function dissolve_short_font($str_value) {
		$font_prop_default = & $GLOBALS['csstidy']['font_prop_default'];
		$font_weight = array('normal', 'bold', 'bolder', 'lighter', 100, 200, 300, 400, 500, 600, 700, 800, 900);
		$font_variant = array('normal', 'small-caps');
		$font_style = array('normal', 'italic', 'oblique');
		$important = '';
		$return = array('font-style' => null, 'font-variant' => null, 'font-weight' => null, 'font-size' => null, 'line-height' => null, 'font-family' => null);

		if (csstidy::is_important($str_value)) {
			$important = '!important';
			$str_value = csstidy::gvw_important($str_value);
		}

		$have['style'] = false;
		$have['variant'] = false;
		$have['weight'] = false;
		$have['size'] = false;
		// Detects if font-family consists of several words w/o quotes
		$multiwords = false;

		// Workaround with multiple font-family
		$str_value = csstidy_optimise::explode_ws(',', trim($str_value));

		$str_value[0] = csstidy_optimise::explode_ws(' ', trim($str_value[0]));

		for ($j = 0; $j < count($str_value[0]); $j++) {
			if ($have['weight'] === false && in_array($str_value[0][$j], $font_weight)) {
				$return['font-weight'] = $str_value[0][$j];
				$have['weight'] = true;
			} elseif ($have['variant'] === false && in_array($str_value[0][$j], $font_variant)) {
				$return['font-variant'] = $str_value[0][$j];
				$have['variant'] = true;
			} elseif ($have['style'] === false && in_array($str_value[0][$j], $font_style)) {
				$return['font-style'] = $str_value[0][$j];
				$have['style'] = true;
			} elseif ($have['size'] === false && (is_numeric($str_value[0][$j]{0}) || $str_value[0][$j]{0} === null || $str_value[0][$j]{0} === '.')) {
				$size = csstidy_optimise::explode_ws('/', trim($str_value[0][$j]));
				$return['font-size'] = $size[0];
				if (isset($size[1])) {
					$return['line-height'] = $size[1];
				} else {
					$return['line-height'] = ''; // don't add 'normal' !
				}
				$have['size'] = true;
			} else {
				if (isset($return['font-family'])) {
					$return['font-family'] .= ' ' . $str_value[0][$j];
					$multiwords = true;
				} else {
					$return['font-family'] = $str_value[0][$j];
				}
			}
		}
		// add quotes if we have several qords in font-family
		if ($multiwords !== false) {
			$return['font-family'] = '"' . $return['font-family'] . '"';
		}
		$i = 1;
		while (isset($str_value[$i])) {
			$return['font-family'] .= ',' . trim($str_value[$i]);
			$i++;
		}

		// Fix for 100 and more font-size
		if ($have['size'] === false && isset($return['font-weight']) &&
						is_numeric($return['font-weight']{0})) {
			$return['font-size'] = $return['font-weight'];
			unset($return['font-weight']);
		}

		foreach ($font_prop_default as $font_prop => $default_value) {
			if ($return[$font_prop] !== null) {
				$return[$font_prop] = $return[$font_prop] . $important;
			}
			else
				$return[$font_prop] = $default_value . $important;
		}
		return $return;
	}

	/**
	 * Merges all fonts properties
	 * @param array $input_css
	 * @return array
	 * @version 1.3
	 * @see dissolve_short_font()
	 */
	function merge_font($input_css) {
		$font_prop_default = & $GLOBALS['csstidy']['font_prop_default'];
		$new_font_value = '';
		$important = '';
		// Skip if not font-family and font-size set
		if (isset($input_css['font-family']) && isset($input_css['font-size'])) {
			// fix several words in font-family - add quotes
			if (isset($input_css['font-family'])) {
				$families = explode(",", $input_css['font-family']);
				$result_families = array();
				foreach ($families as $family) {
					$family = trim($family);
					$len = strlen($family);
					if (strpos($family, " ") &&
									!(($family{0} == '"' && $family{$len - 1} == '"') ||
									($family{0} == "'" && $family{$len - 1} == "'"))) {
						$family = '"' . $family . '"';
					}
					$result_families[] = $family;
				}
				$input_css['font-family'] = implode(",", $result_families);
			}
			foreach ($font_prop_default as $font_property => $default_value) {

				// Skip if property does not exist
				if (!isset($input_css[$font_property])) {
					continue;
				}

				$cur_value = $input_css[$font_property];

				// Skip if default value is used
				if ($cur_value === $default_value) {
					continue;
				}

				// Remove !important
				if (csstidy::is_important($cur_value)) {
					$important = '!important';
					$cur_value = csstidy::gvw_important($cur_value);
				}

				$new_font_value .= $cur_value;
				// Add delimiter
				$new_font_value .= ( $font_property === 'font-size' &&
								isset($input_css['line-height'])) ? '/' : ' ';
			}

			$new_font_value = trim($new_font_value);

			// Delete all font-properties
			foreach ($font_prop_default as $font_property => $default_value) {
				if ($font_property!=='font' OR !$new_font_value)
					unset($input_css[$font_property]);
			}

			// Add new font property
			if ($new_font_value !== '') {
				$input_css['font'] = $new_font_value . $important;
			}
		}

		return $input_css;
	}

}


/**
 * CSSTidy - CSS Parser and Optimiser
 *
 * CSS Parser class
 *
 * Copyright 2005, 2006, 2007 Florian Schmitz
 *
 * This file is part of CSSTidy.
 *
 *   CSSTidy is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU Lesser General Public License as published by
 *   the Free Software Foundation; either version 2.1 of the License, or
 *   (at your option) any later version.
 *
 *   CSSTidy is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Lesser General Public License for more details.
 *
 *   You should have received a copy of the GNU Lesser General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 * @package csstidy
 * @author Florian Schmitz (floele at gmail dot com) 2005-2007
 * @author Brett Zamir (brettz9 at yahoo dot com) 2007
 * @author Nikolay Matsievsky (speed at webo dot name) 2009-2010
 * @author Cedric Morin (cedric at yterium dot com) 2010-2012
 * @author Christopher Finke (cfinke at gmail.com) 2012
 */
/**
 * Defines ctype functions if required
 *
 * @version 1.0
 */

/**
 * Various CSS data needed for correct optimisations etc.
 *
 * @version 1.3
 */

/**
 * Contains a class for printing CSS code
 *
 * @version 1.0
 */

/**
 * Contains a class for optimising CSS code
 *
 * @version 1.0
 */

/**
 * CSS Parser class
 *

 * This class represents a CSS parser which reads CSS code and saves it in an array.
 * In opposite to most other CSS parsers, it does not use regular expressions and
 * thus has full CSS2 support and a higher reliability.
 * Additional to that it applies some optimisations and fixes to the CSS code.
 * An online version should be available here: http://cdburnerxp.se/cssparse/css_optimiser.php
 * @package csstidy
 * @author Florian Schmitz (floele at gmail dot com) 2005-2006
 * @version 1.4.0
 */
class csstidy {

	/**
	 * Saves the parsed CSS. This array is empty if preserve_css is on.
	 * @var array
	 * @access public
	 */
	var $css = array();
	/**
	 * Saves the parsed CSS (raw)
	 * @var array
	 * @access private
	 */
	var $tokens = array();
	/**
	 * Printer class
	 * @see csstidy_print
	 * @var object
	 * @access public
	 */
	var $print;
	/**
	 * Optimiser class
	 * @see csstidy_optimise
	 * @var object
	 * @access private
	 */
	var $optimise;
	/**
	 * Saves the CSS charset (@charset)
	 * @var string
	 * @access private
	 */
	var $charset = '';
	/**
	 * Saves all @import URLs
	 * @var array
	 * @access private
	 */
	var $import = array();
	/**
	 * Saves the namespace
	 * @var string
	 * @access private
	 */
	var $namespace = '';
	/**
	 * Contains the version of csstidy
	 * @var string
	 * @access private
	 */
	var $version = '1.3';
	/**
	 * Stores the settings
	 * @var array
	 * @access private
	 */
	var $settings = array();
	/**
	 * Saves the parser-status.
	 *
	 * Possible values:
	 * - is = in selector
	 * - ip = in property
	 * - iv = in value
	 * - instr = in string (started at " or ' or ( )
	 * - ic = in comment (ignore everything)
	 * - at = in @-block
	 *
	 * @var string
	 * @access private
	 */
	var $status = 'is';
	/**
	 * Saves the current at rule (@media)
	 * @var string
	 * @access private
	 */
	var $at = '';
	/**
	 * Saves the at rule for next selector (during @font-face or other @)
	 * @var string
	 * @access private
	 */
	var $next_selector_at = '';

	/**
	 * Saves the current selector
	 * @var string
	 * @access private
	 */
	var $selector = '';
	/**
	 * Saves the current property
	 * @var string
	 * @access private
	 */
	var $property = '';
	/**
	 * Saves the position of , in selectors
	 * @var array
	 * @access private
	 */
	var $sel_separate = array();
	/**
	 * Saves the current value
	 * @var string
	 * @access private
	 */
	var $value = '';
	/**
	 * Saves the current sub-value
	 *
	 * Example for a subvalue:
	 * background:url(foo.png) red no-repeat;
	 * "url(foo.png)", "red", and  "no-repeat" are subvalues,
	 * seperated by whitespace
	 * @var string
	 * @access private
	 */
	var $sub_value = '';
	/**
	 * Array which saves all subvalues for a property.
	 * @var array
	 * @see sub_value
	 * @access private
	 */
	var $sub_value_arr = array();
	/**
	 * Saves the stack of characters that opened the current strings
	 * @var array
	 * @access private
	 */
	var $str_char = array();
	var $cur_string = array();
	/**
	 * Status from which the parser switched to ic or instr
	 * @var array
	 * @access private
	 */
	var $from = array();
	/**
	/**
	 * =true if in invalid at-rule
	 * @var bool
	 * @access private
	 */
	var $invalid_at = false;
	/**
	 * =true if something has been added to the current selector
	 * @var bool
	 * @access private
	 */
	var $added = false;
	/**
	 * Array which saves the message log
	 * @var array
	 * @access private
	 */
	var $log = array();
	/**
	 * Saves the line number
	 * @var integer
	 * @access private
	 */
	var $line = 1;
	/**
	 * Marks if we need to leave quotes for a string
	 * @var array
	 * @access private
	 */
	var $quoted_string = array();

	/**
	 * List of tokens
	 * @var string
	 */
	var $tokens_list = "";
	/**
	 * Loads standard template and sets default settings
	 * @access private
	 * @version 1.3
	 */
	function csstidy() {
		$this->settings['remove_bslash'] = true;
		$this->settings['compress_colors'] = true;
		$this->settings['compress_font-weight'] = true;
		$this->settings['lowercase_s'] = false;
		/*
			1 common shorthands optimization
			2 + font property optimization
			3 + background property optimization
		 */
		$this->settings['optimise_shorthands'] = 1;
		$this->settings['remove_last_;'] = true;
		/* rewrite all properties with low case, better for later gzip OK, safe*/
		$this->settings['case_properties'] = 1;
		/* sort properties in alpabetic order, better for later gzip
		 * but can cause trouble in case of overiding same propertie or using hack
		 */
		$this->settings['sort_properties'] = false;
		/*
			1, 3, 5, etc -- enable sorting selectors inside @media: a{}b{}c{}
			2, 5, 8, etc -- enable sorting selectors inside one CSS declaration: a,b,c{}
			preserve order by default cause it can break functionnality
		 */
		$this->settings['sort_selectors'] = 0;
		/* is dangeroues to be used: CSS is broken sometimes */
		$this->settings['merge_selectors'] = 0;
		/* preserve or not browser hacks */
		$this->settings['discard_invalid_selectors'] = false;
		$this->settings['discard_invalid_properties'] = false;
		$this->settings['css_level'] = 'CSS3.0';
		$this->settings['preserve_css'] = false;
		$this->settings['timestamp'] = false;
		$this->settings['template'] = ''; // say that propertie exist
		$this->set_cfg('template','default'); // call load_template
		$this->optimise = new csstidy_optimise($this);

		$this->tokens_list = & $GLOBALS['csstidy']['tokens'];
	}

	/**
	 * Get the value of a setting.
	 * @param string $setting
	 * @access public
	 * @return mixed
	 * @version 1.0
	 */
	function get_cfg($setting) {
		if (isset($this->settings[$setting])) {
			return $this->settings[$setting];
		}
		return false;
	}

	/**
	 * Load a template
	 * @param string $template used by set_cfg to load a template via a configuration setting
	 * @access private
	 * @version 1.4
	 */
	function _load_template($template) {
		switch ($template) {
			case 'default':
				$this->load_template('default');
				break;

			case 'highest':
				$this->load_template('highest_compression');
				break;

			case 'high':
				$this->load_template('high_compression');
				break;

			case 'low':
				$this->load_template('low_compression');
				break;

			default:
				$this->load_template($template);
				break;
		}
	}

	/**
	 * Set the value of a setting.
	 * @param string $setting
	 * @param mixed $value
	 * @access public
	 * @return bool
	 * @version 1.0
	 */
	function set_cfg($setting, $value=null) {
		if (is_array($setting) && $value === null) {
			foreach ($setting as $setprop => $setval) {
				$this->settings[$setprop] = $setval;
			}
			if (array_key_exists('template', $setting)) {
				$this->_load_template($this->settings['template']);
			}
			return true;
		} elseif (isset($this->settings[$setting]) && $value !== '') {
			$this->settings[$setting] = $value;
			if ($setting === 'template') {
				$this->_load_template($this->settings['template']);
			}
			return true;
		}
		return false;
	}

	/**
	 * Adds a token to $this->tokens
	 * @param mixed $type
	 * @param string $data
	 * @param bool $do add a token even if preserve_css is off
	 * @access private
	 * @version 1.0
	 */
	function _add_token($type, $data, $do = false) {
		if ($this->get_cfg('preserve_css') || $do) {
			$this->tokens[] = array($type, ($type == COMMENT) ? $data : trim($data));
		}
	}

	/**
	 * Add a message to the message log
	 * @param string $message
	 * @param string $type
	 * @param integer $line
	 * @access private
	 * @version 1.0
	 */
	function log($message, $type, $line = -1) {
		if ($line === -1) {
			$line = $this->line;
		}
		$line = intval($line);
		$add = array('m' => $message, 't' => $type);
		if (!isset($this->log[$line]) || !in_array($add, $this->log[$line])) {
			$this->log[$line][] = $add;
		}
	}

	/**
	 * Parse unicode notations and find a replacement character
	 * @param string $string
	 * @param integer $i
	 * @access private
	 * @return string
	 * @version 1.2
	 */
	function _unicode(&$string, &$i) {
		++$i;
		$add = '';
		$replaced = false;

		while ($i < strlen($string) && (ctype_xdigit($string{$i}) || ctype_space($string{$i})) && strlen($add) < 6) {
			$add .= $string{$i};

			if (ctype_space($string{$i})) {
				break;
			}
			$i++;
		}

		if (hexdec($add) > 47 && hexdec($add) < 58 || hexdec($add) > 64 && hexdec($add) < 91 || hexdec($add) > 96 && hexdec($add) < 123) {
			$this->log('Replaced unicode notation: Changed \\' . $add . ' to ' . chr(hexdec($add)), 'Information');
			$add = chr(hexdec($add));
			$replaced = true;
		} else {
			$add = trim('\\' . $add);
		}

		if (@ctype_xdigit($string{$i + 1}) && ctype_space($string{$i})
						&& !$replaced || !ctype_space($string{$i})) {
			$i--;
		}

		if ($add !== '\\' || !$this->get_cfg('remove_bslash') || strpos($this->tokens_list, $string{$i + 1}) !== false) {
			return $add;
		}

		if ($add === '\\') {
			$this->log('Removed unnecessary backslash', 'Information');
		}
		return '';
	}

	/**
	 * Write formatted output to a file
	 * @param string $filename
	 * @param string $doctype when printing formatted, is a shorthand for the document type
	 * @param bool $externalcss when printing formatted, indicates whether styles to be attached internally or as an external stylesheet
	 * @param string $title when printing formatted, is the title to be added in the head of the document
	 * @param string $lang when printing formatted, gives a two-letter language code to be added to the output
	 * @access public
	 * @version 1.4
	 */
	function write_page($filename, $doctype='xhtml1.1', $externalcss=true, $title='', $lang='en') {
		$this->write($filename, true);
	}

	/**
	 * Write plain output to a file
	 * @param string $filename
	 * @param bool $formatted whether to print formatted or not
	 * @param string $doctype when printing formatted, is a shorthand for the document type
	 * @param bool $externalcss when printing formatted, indicates whether styles to be attached internally or as an external stylesheet
	 * @param string $title when printing formatted, is the title to be added in the head of the document
	 * @param string $lang when printing formatted, gives a two-letter language code to be added to the output
	 * @param bool $pre_code whether to add pre and code tags around the code (for light HTML formatted templates)
	 * @access public
	 * @version 1.4
	 */
	function write($filename, $formatted=false, $doctype='xhtml1.1', $externalcss=true, $title='', $lang='en', $pre_code=true) {
		$filename .= ( $formatted) ? '.xhtml' : '.css';

		if (!is_dir('temp')) {
			$madedir = mkdir('temp');
			if (!$madedir) {
				print 'Could not make directory "temp" in ' . dirname(__FILE__);
				exit;
			}
		}
		$handle = fopen('temp/' . $filename, 'w');
		if ($handle) {
			if (!$formatted) {
				fwrite($handle, $this->print->plain());
			} else {
				fwrite($handle, $this->print->formatted_page($doctype, $externalcss, $title, $lang, $pre_code));
			}
		}
		fclose($handle);
	}

	/**
	 * Loads a new template
	 * @param string $content either filename (if $from_file == true), content of a template file, "high_compression", "highest_compression", "low_compression", or "default"
	 * @param bool $from_file uses $content as filename if true
	 * @access public
	 * @version 1.1
	 * @see http://csstidy.sourceforge.net/templates.php
	 */
	function load_template($content, $from_file=true) {
		$predefined_templates = & $GLOBALS['csstidy']['predefined_templates'];
		if ($content === 'high_compression' || $content === 'default' || $content === 'highest_compression' || $content === 'low_compression') {
			$this->template = $predefined_templates[$content];
			return;
		}


		if ($from_file) {
			$content = strip_tags(file_get_contents($content), '<span>');
		}
		$content = str_replace("\r\n", "\n", $content); // Unify newlines (because the output also only uses \n)
		$template = explode('|', $content);

		for ($i = 0; $i < count($template); $i++) {
			$this->template[$i] = $template[$i];
		}
	}

	/**
	 * Starts parsing from URL
	 * @param string $url
	 * @access public
	 * @version 1.0
	 */
	function parse_from_url($url) {
		return $this->parse(@file_get_contents($url));
	}

	/**
	 * Checks if there is a token at the current position
	 * @param string $string
	 * @param integer $i
	 * @access public
	 * @version 1.11
	 */
	function is_token(&$string, $i) {
		return (strpos($this->tokens_list, $string{$i}) !== false && !csstidy::escaped($string, $i));
	}

	/**
	 * Parses CSS in $string. The code is saved as array in $this->css
	 * @param string $string the CSS code
	 * @access public
	 * @return bool
	 * @version 1.1
	 */
	function parse($string) {
		// Temporarily set locale to en_US in order to handle floats properly
		$old = @setlocale(LC_ALL, 0);
		@setlocale(LC_ALL, 'C');

		// PHP bug? Settings need to be refreshed in PHP4
		$this->print = new csstidy_print($this);
		$this->optimise = new csstidy_optimise($this);

		$all_properties = & $GLOBALS['csstidy']['all_properties'];
		$at_rules = & $GLOBALS['csstidy']['at_rules'];
		$quoted_string_properties = & $GLOBALS['csstidy']['quoted_string_properties'];

		$this->css = array();
		$this->print->input_css = $string;
		$string = str_replace("\r\n", "\n", $string) . ' ';
		$cur_comment = '';

		for ($i = 0, $size = strlen($string); $i < $size; $i++) {
			if ($string{$i} === "\n" || $string{$i} === "\r") {
				++$this->line;
			}

			switch ($this->status) {
				/* Case in at-block */
				case 'at':
					if (csstidy::is_token($string, $i)) {
						if ($string{$i} === '/' && @$string{$i + 1} === '*') {
							$this->status = 'ic';
							++$i;
							$this->from[] = 'at';
						} elseif ($string{$i} === '{') {
							$this->status = 'is';
							$this->at = $this->css_new_media_section($this->at);
							$this->_add_token(AT_START, $this->at);
						} elseif ($string{$i} === ',') {
							$this->at = trim($this->at) . ',';
						} elseif ($string{$i} === '\\') {
							$this->at .= $this->_unicode($string, $i);
						}
						// fix for complicated media, i.e @media screen and (-webkit-min-device-pixel-ratio:1.5)
						elseif (in_array($string{$i}, array('(', ')', ':', '.'))) {
							$this->at .= $string{$i};
						}
					} else {
						$lastpos = strlen($this->at) - 1;
						if (!( (ctype_space($this->at{$lastpos}) || csstidy::is_token($this->at, $lastpos) && $this->at{$lastpos} === ',') && ctype_space($string{$i}))) {
							$this->at .= $string{$i};
						}
					}
					break;

				/* Case in-selector */
				case 'is':
					if (csstidy::is_token($string, $i)) {
						if ($string{$i} === '/' && @$string{$i + 1} === '*' && trim($this->selector) == '') {
							$this->status = 'ic';
							++$i;
							$this->from[] = 'is';
						} elseif ($string{$i} === '@' && trim($this->selector) == '') {
							// Check for at-rule
							$this->invalid_at = true;
							foreach ($at_rules as $name => $type) {
								if (!strcasecmp(substr($string, $i + 1, strlen($name)), $name)) {
									($type === 'at') ? $this->at = '@' . $name : $this->selector = '@' . $name;
									if ($type === "atis") {
										$this->next_selector_at = ($this->next_selector_at?$this->next_selector_at:($this->at?$this->at:DEFAULT_AT));
										$this->at = $this->css_new_media_section(' ');
										$type = "is";
									}
									$this->status = $type;
									$i += strlen($name);
									$this->invalid_at = false;
								}
							}

							if ($this->invalid_at) {
								$this->selector = '@';
								$invalid_at_name = '';
								for ($j = $i + 1; $j < $size; ++$j) {
									if (!ctype_alpha($string{$j})) {
										break;
									}
									$invalid_at_name .= $string{$j};
								}
								$this->log('Invalid @-rule: ' . $invalid_at_name . ' (removed)', 'Warning');
							}
						} elseif (($string{$i} === '"' || $string{$i} === "'")) {
							$this->cur_string[] = $string{$i};
							$this->status = 'instr';
							$this->str_char[] = $string{$i};
							$this->from[] = 'is';
							/* fixing CSS3 attribute selectors, i.e. a[href$=".mp3" */
							$this->quoted_string[] = ($string{$i - 1} == '=' );
						} elseif ($this->invalid_at && $string{$i} === ';') {
							$this->invalid_at = false;
							$this->status = 'is';
							if ($this->next_selector_at) {
								$this->at = $this->css_new_media_section($this->next_selector_at);
								$this->next_selector_at = '';
							}
						} elseif ($string{$i} === '{') {
							$this->status = 'ip';
							if ($this->at == '') {
								$this->at = $this->css_new_media_section(DEFAULT_AT);
							}
							$this->selector = $this->css_new_selector($this->at,$this->selector);
							$this->_add_token(SEL_START, $this->selector);
							$this->added = false;
						} elseif ($string{$i} === '}') {
							$this->_add_token(AT_END, $this->at);
							$this->at = '';
							$this->selector = '';
							$this->sel_separate = array();
						} elseif ($string{$i} === ',') {
							$this->selector = trim($this->selector) . ',';
							$this->sel_separate[] = strlen($this->selector);
						} elseif ($string{$i} === '\\') {
							$this->selector .= $this->_unicode($string, $i);
						} elseif ($string{$i} === '*' && @in_array($string{$i + 1}, array('.', '#', '[', ':'))) {
							// remove unnecessary universal selector, FS#147
						} else {
							$this->selector .= $string{$i};
						}
					} else {
						$lastpos = strlen($this->selector) - 1;
						if ($lastpos == -1 || !( (ctype_space($this->selector{$lastpos}) || csstidy::is_token($this->selector, $lastpos) && $this->selector{$lastpos} === ',') && ctype_space($string{$i}))) {
							$this->selector .= $string{$i};
						}
					}
					break;

				/* Case in-property */
				case 'ip':
					if (csstidy::is_token($string, $i)) {
						if (($string{$i} === ':' || $string{$i} === '=') && $this->property != '') {
							$this->status = 'iv';
							if (!$this->get_cfg('discard_invalid_properties') || csstidy::property_is_valid($this->property)) {
								$this->property = $this->css_new_property($this->at,$this->selector,$this->property);
								$this->_add_token(PROPERTY, $this->property);
							}
						} elseif ($string{$i} === '/' && @$string{$i + 1} === '*' && $this->property == '') {
							$this->status = 'ic';
							++$i;
							$this->from[] = 'ip';
						} elseif ($string{$i} === '}') {
							$this->explode_selectors();
							$this->status = 'is';
							$this->invalid_at = false;
							$this->_add_token(SEL_END, $this->selector);
							$this->selector = '';
							$this->property = '';
							if ($this->next_selector_at) {
								$this->at = $this->css_new_media_section($this->next_selector_at);
								$this->next_selector_at = '';
							}
						} elseif ($string{$i} === ';') {
							$this->property = '';
						} elseif ($string{$i} === '\\') {
							$this->property .= $this->_unicode($string, $i);
						}
						// else this is dumb IE a hack, keep it
						// including //
						elseif (($this->property=='' AND !ctype_space($string{$i}))
							OR ($this->property=='/' OR $string{$i}=="/")) {
							$this->property .= $string{$i};
						}
					} elseif (!ctype_space($string{$i})) {
						$this->property .= $string{$i};
					}
					break;

				/* Case in-value */
				case 'iv':
					$pn = (($string{$i} === "\n" || $string{$i} === "\r") && $this->property_is_next($string, $i + 1) || $i == strlen($string) - 1);
					if (csstidy::is_token($string, $i) || $pn) {
						if ($string{$i} === '/' && @$string{$i + 1} === '*') {
							$this->status = 'ic';
							++$i;
							$this->from[] = 'iv';
						} elseif (($string{$i} === '"' || $string{$i} === "'" || $string{$i} === '(')) {
							$this->cur_string[] = $string{$i};
							$this->str_char[] = ($string{$i} === '(') ? ')' : $string{$i};
							$this->status = 'instr';
							$this->from[] = 'iv';
							$this->quoted_string[] = in_array(strtolower($this->property), $quoted_string_properties);
						} elseif ($string{$i} === ',') {
							$this->sub_value = trim($this->sub_value) . ',';
						} elseif ($string{$i} === '\\') {
							$this->sub_value .= $this->_unicode($string, $i);
						} elseif ($string{$i} === ';' || $pn) {
							if ($this->selector{0} === '@' && isset($at_rules[substr($this->selector, 1)]) && $at_rules[substr($this->selector, 1)] === 'iv') {
								/* Add quotes to charset, import, namespace */
								$this->sub_value_arr[] = trim($this->sub_value);

								$this->status = 'is';

								switch ($this->selector) {
									case '@charset': $this->charset = '"'.$this->sub_value_arr[0].'"';
										break;
									case '@namespace': $this->namespace = implode(' ', $this->sub_value_arr);
										break;
									case '@import': $this->import[] = implode(' ', $this->sub_value_arr);
										break;
								}

								$this->sub_value_arr = array();
								$this->sub_value = '';
								$this->selector = '';
								$this->sel_separate = array();
							} else {
								$this->status = 'ip';
							}
						} elseif ($string{$i} !== '}') {
							$this->sub_value .= $string{$i};
						}
						if (($string{$i} === '}' || $string{$i} === ';' || $pn) && !empty($this->selector)) {
							if ($this->at == '') {
								$this->at = $this->css_new_media_section(DEFAULT_AT);
							}

							// case settings
							if ($this->get_cfg('lowercase_s')) {
								$this->selector = strtolower($this->selector);
							}
							$this->property = strtolower($this->property);

							$this->optimise->subvalue();
							if ($this->sub_value != '') {
								$this->sub_value_arr[] = $this->sub_value;
								$this->sub_value = '';
							}

							$this->value = '';
							while (count($this->sub_value_arr)) {
								$sub = array_shift($this->sub_value_arr);
								if (strstr($this->selector, "font-face")) {
									$sub = $this->quote_font_format($sub);
								}

								if ($sub != '')
									$this->value .= ((!strlen($this->value) OR substr($this->value,-1,1)==',')?'':' ').$sub;
							}

							$this->optimise->value();

							$valid = csstidy::property_is_valid($this->property);
							if ((!$this->invalid_at || $this->get_cfg('preserve_css')) && (!$this->get_cfg('discard_invalid_properties') || $valid)) {
								$this->css_add_property($this->at, $this->selector, $this->property, $this->value);
								$this->_add_token(VALUE, $this->value);
								$this->optimise->shorthands();
							}
							if (!$valid) {
								if ($this->get_cfg('discard_invalid_properties')) {
									$this->log('Removed invalid property: ' . $this->property, 'Warning');
								} else {
									$this->log('Invalid property in ' . strtoupper($this->get_cfg('css_level')) . ': ' . $this->property, 'Warning');
								}
							}

							$this->property = '';
							$this->sub_value_arr = array();
							$this->value = '';
						}
						if ($string{$i} === '}') {
							$this->explode_selectors();
							$this->_add_token(SEL_END, $this->selector);
							$this->status = 'is';
							$this->invalid_at = false;
							$this->selector = '';
							if ($this->next_selector_at) {
								$this->at = $this->css_new_media_section($this->next_selector_at);
								$this->next_selector_at = '';
							}
						}
					} elseif (!$pn) {
						$this->sub_value .= $string{$i};

						if (ctype_space($string{$i})) {
							$this->optimise->subvalue();
							if ($this->sub_value != '') {
								$this->sub_value_arr[] = $this->sub_value;
								$this->sub_value = '';
							}
						}
					}
					break;

				/* Case in string */
				case 'instr':
					$_str_char = $this->str_char[count($this->str_char)-1];
					$_cur_string = $this->cur_string[count($this->cur_string)-1];
					$_quoted_string = $this->quoted_string[count($this->quoted_string)-1];
					$temp_add = $string{$i};

					// Add another string to the stack. Strings can't be nested inside of quotes, only parentheses, but
					// parentheticals can be nested more than once.
					if ($_str_char === ")" && ($string{$i} === "(" || $string{$i} === '"' || $string{$i} === '\'') && !csstidy::escaped($string, $i)) {
						$this->cur_string[] = $string{$i};
						$this->str_char[] = $string{$i} == "(" ? ")" : $string{$i};
						$this->from[] = 'instr';
						$this->quoted_string[] = ($_str_char === ")" AND $string{$i} !== "(" AND trim($_cur_string)=="(")?$_quoted_string:!($string{$i} === "(");
						continue;
					}

					if ($_str_char !== ")" && ($string{$i} === "\n" || $string{$i} === "\r") && !($string{$i - 1} === '\\' && !csstidy::escaped($string, $i - 1))) {
						$temp_add = "\\A";
						$this->log('Fixed incorrect newline in string', 'Warning');
					}

					$_cur_string .= $temp_add;

					if ($string{$i} === $_str_char && !csstidy::escaped($string, $i)) {
						$this->status = array_pop($this->from);

						if (!preg_match('|[' . implode('', $GLOBALS['csstidy']['whitespace']) . ']|uis', $_cur_string) && $this->property !== 'content') {
							if (!$_quoted_string) {
								if ($_str_char !== ')') {
									// Convert properties like
									// font-family: 'Arial';
									// to
									// font-family: Arial;
									// or
									// url("abc")
									// to
									// url(abc)
									$_cur_string = substr($_cur_string, 1, -1);
								}
							} else {
								$_quoted_string = false;
							}
						}

						array_pop($this->cur_string);
						array_pop($this->quoted_string);
						array_pop($this->str_char);

						if ($_str_char === ")") {
							$_cur_string = "(" . trim(substr($_cur_string, 1, -1)) . ")";
						}

						if ($this->status === 'iv') {
							if (!$_quoted_string) {
								if (strpos($_cur_string,',')!==false)
									// we can on only remove space next to ','
									$_cur_string = implode(',',array_map('trim',explode(',',$_cur_string)));
								// and multiple spaces (too expensive)
								if (strpos($_cur_string,'  ')!==false)
									$_cur_string = preg_replace(",\s+,"," ",$_cur_string);
							}
							$this->sub_value .= $_cur_string;
						} elseif ($this->status === 'is') {
							$this->selector .= $_cur_string;
						} elseif ($this->status === 'instr') {
							$this->cur_string[count($this->cur_string)-1] .= $_cur_string;
						}
					} else {
						$this->cur_string[count($this->cur_string)-1] = $_cur_string;
					}
					break;

				/* Case in-comment */
				case 'ic':
					if ($string{$i} === '*' && $string{$i + 1} === '/') {
						$this->status = array_pop($this->from);
						$i++;
						$this->_add_token(COMMENT, $cur_comment);
						$cur_comment = '';
					} else {
						$cur_comment .= $string{$i};
					}
					break;
			}
		}

		$this->optimise->postparse();

		$this->print->_reset();

		@setlocale(LC_ALL, $old); // Set locale back to original setting

		return!(empty($this->css) && empty($this->import) && empty($this->charset) && empty($this->tokens) && empty($this->namespace));
	}


	/**
	 * format() in font-face needs quoted values for somes browser (FF at least)
	 *
	 * @param $value
	 * @return string
	 */
	function quote_font_format($value) {
		if (strncmp($value,'format',6)==0) {
			$p = strrpos($value,")");
			$end = substr($value,$p);
			$format_strings = csstidy::parse_string_list(substr($value, 7, $p-7));
			if (!$format_strings) {
				$value = "";
			} else {
				$value = "format(";

				foreach ($format_strings as $format_string) {
					$value .= '"' . str_replace('"', '\\"', $format_string) . '",';
				}

				$value = substr($value, 0, -1) . $end;
			}
		}
		return $value;
	}

	/**
	 * Explodes selectors
	 * @access private
	 * @version 1.0
	 */
	function explode_selectors() {
		// Explode multiple selectors
		if ($this->get_cfg('merge_selectors') === 1) {
			$new_sels = array();
			$lastpos = 0;
			$this->sel_separate[] = strlen($this->selector);
			foreach ($this->sel_separate as $num => $pos) {
				if ($num == count($this->sel_separate) - 1) {
					$pos += 1;
				}

				$new_sels[] = substr($this->selector, $lastpos, $pos - $lastpos - 1);
				$lastpos = $pos;
			}

			if (count($new_sels) > 1) {
				foreach ($new_sels as $selector) {
					if (isset($this->css[$this->at][$this->selector])) {
						$this->merge_css_blocks($this->at, $selector, $this->css[$this->at][$this->selector]);
					}
				}
				unset($this->css[$this->at][$this->selector]);
			}
		}
		$this->sel_separate = array();
	}

	/**
	 * Checks if a character is escaped (and returns true if it is)
	 * @param string $string
	 * @param integer $pos
	 * @access public
	 * @return bool
	 * @version 1.02
	 */
	static function escaped(&$string, $pos) {
		return!(@($string{$pos - 1} !== '\\') || csstidy::escaped($string, $pos - 1));
	}

	/**
	 * Adds a property with value to the existing CSS code
	 * @param string $media
	 * @param string $selector
	 * @param string $property
	 * @param string $new_val
	 * @access private
	 * @version 1.2
	 */
	function css_add_property($media, $selector, $property, $new_val) {
		if ($this->get_cfg('preserve_css') || trim($new_val) == '') {
			return;
		}

		$this->added = true;
		if (isset($this->css[$media][$selector][$property])) {
			if ((csstidy::is_important($this->css[$media][$selector][$property]) && csstidy::is_important($new_val)) || !csstidy::is_important($this->css[$media][$selector][$property])) {
				$this->css[$media][$selector][$property] = trim($new_val);
			}
		} else {
			$this->css[$media][$selector][$property] = trim($new_val);
		}
	}

	/**
	 * Start a new media section.
	 * Check if the media is not already known,
	 * else rename it with extra spaces
	 * to avoid merging
	 *
	 * @param string $media
	 * @return string
	 */
	function css_new_media_section($media) {
		if ($this->get_cfg('preserve_css')) {
			return $media;
		}

		// if the last @media is the same as this
		// keep it
		if (!$this->css OR !is_array($this->css) OR empty($this->css)) {
			return $media;
		}
		end($this->css);
		list($at,) = each($this->css);
		if ($at == $media) {
			return $media;
		}
		while (isset($this->css[$media]))
			if (is_numeric($media))
				$media++;
			else
				$media .= " ";
		return $media;
	}

	/**
	 * Start a new selector.
	 * If already referenced in this media section,
	 * rename it with extra space to avoid merging
	 * except if merging is required,
	 * or last selector is the same (merge siblings)
	 *
	 * never merge @font-face
	 *
	 * @param string $media
	 * @param string $selector
	 * @return string
	 */
	function css_new_selector($media,$selector) {
		if ($this->get_cfg('preserve_css')) {
			return $selector;
		}
		$selector = trim($selector);
		if (strncmp($selector,"@font-face",10)!=0) {
			if ($this->settings['merge_selectors'] != false)
				return $selector;

			if (!$this->css OR !isset($this->css[$media]) OR !$this->css[$media])
				return $selector;

			// if last is the same, keep it
			end($this->css[$media]);
			list($sel,) = each($this->css[$media]);
			if ($sel == $selector) {
				return $selector;
			}
		}

		while (isset($this->css[$media][$selector]))
			$selector .= " ";
		return $selector;
	}

	/**
	 * Start a new propertie.
	 * If already references in this selector,
	 * rename it with extra space to avoid override
	 *
	 * @param string $media
	 * @param string $selector
	 * @param string $property
	 * @return string
	 */
	function css_new_property($media, $selector, $property) {
		if ($this->get_cfg('preserve_css')) {
			return $property;
		}
		if (!$this->css OR !isset($this->css[$media][$selector]) OR !$this->css[$media][$selector])
			return $property;

		while (isset($this->css[$media][$selector][$property]))
			$property .= " ";

		return $property;
	}

	/**
	 * Adds CSS to an existing media/selector
	 * @param string $media
	 * @param string $selector
	 * @param array $css_add
	 * @access private
	 * @version 1.1
	 */
	function merge_css_blocks($media, $selector, $css_add) {
		foreach ($css_add as $property => $value) {
			$this->css_add_property($media, $selector, $property, $value, false);
		}
	}

	/**
	 * Checks if $value is !important.
	 * @param string $value
	 * @return bool
	 * @access public
	 * @version 1.0
	 */
	static function is_important(&$value) {
		return (
			strpos($value,"!")!==false // quick test
			AND !strcasecmp(substr(str_replace($GLOBALS['csstidy']['whitespace'], '', $value), -10, 10), '!important'));
	}

	/**
	 * Returns a value without !important
	 * @param string $value
	 * @return string
	 * @access public
	 * @version 1.0
	 */
	static function gvw_important($value) {
		if (csstidy::is_important($value)) {
			$value = trim($value);
			$value = substr($value, 0, -9);
			$value = trim($value);
			$value = substr($value, 0, -1);
			$value = trim($value);
			return $value;
		}
		return $value;
	}

	/**
	 * Checks if the next word in a string from pos is a CSS property
	 * @param string $istring
	 * @param integer $pos
	 * @return bool
	 * @access private
	 * @version 1.2
	 */
	function property_is_next($istring, $pos) {
		$all_properties = & $GLOBALS['csstidy']['all_properties'];
		$istring = substr($istring, $pos, strlen($istring) - $pos);
		$pos = strpos($istring, ':');
		if ($pos === false) {
			return false;
		}
		$istring = strtolower(trim(substr($istring, 0, $pos)));
		if (isset($all_properties[$istring])) {
			$this->log('Added semicolon to the end of declaration', 'Warning');
			return true;
		}
		return false;
	}

	/**
	 * Checks if a property is valid
	 * @param string $property
	 * @return bool;
	 * @access public
	 * @version 1.0
	 */
	function property_is_valid($property) {
		if (in_array(trim($property), $GLOBALS['csstidy']['multiple_properties'])) $property = trim($property);
		$all_properties = & $GLOBALS['csstidy']['all_properties'];
		return (isset($all_properties[$property]) && strpos($all_properties[$property], strtoupper($this->get_cfg('css_level'))) !== false );
	}

	/**
	 * Accepts a list of strings (e.g., the argument to format() in a @font-face src property)
	 * and returns a list of the strings.  Converts things like:
	 *
	 * format(abc) => format("abc")
	 * format(abc def) => format("abc","def")
	 * format(abc "def") => format("abc","def")
	 * format(abc, def, ghi) => format("abc","def","ghi")
	 * format("abc",'def') => format("abc","def")
	 * format("abc, def, ghi") => format("abc, def, ghi")
	 *
	 * @param string
	 * @return array
	 */

	function parse_string_list($value) {
		$value = trim($value);

		// Case: empty
		if (!$value) return array();

		$strings = array();

		$in_str = false;
		$current_string = "";

		for ($i = 0, $_len = strlen($value); $i < $_len; $i++) {
			if (($value{$i} == "," || $value{$i} === " ") && $in_str === true) {
				$in_str = false;
				$strings[] = $current_string;
				$current_string = "";
			} elseif ($value{$i} == '"' || $value{$i} == "'") {
				if ($in_str === $value{$i}) {
					$strings[] = $current_string;
					$in_str = false;
					$current_string = "";
					continue;
				} elseif (!$in_str) {
					$in_str = $value{$i};
				}
			} else {
				if ($in_str) {
					$current_string .= $value{$i};
				} else {
					if (!preg_match("/[\s,]/", $value{$i})) {
						$in_str = true;
						$current_string = $value{$i};
					}
				}
			}
		}

		if ($current_string) {
			$strings[] = $current_string;
		}

		return $strings;
	}
}
