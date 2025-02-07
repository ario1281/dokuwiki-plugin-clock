<?php
/**
 * @brief       Configuration-manager metadata for clock plugin
 * @license:    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author:     Luis Machuca <luis.machuca@gulix.cl>
 */

$meta['clock_type']     = array('multichoice',
	'_choices' => array('digital', 'analog')
	);
$meta['clock_style']    = array('string');
$meta['clock_is_date']  = array('onoff');
$meta['clock_fmt_date'] = array('string');
$meta['clock_fmt_time'] = array('string');
$meta['clock_helpbar']  = array('onoff');
$meta['clock_infopage'] = array('string');
$meta['nojs_fallback']  = array('onoff');
