<?php
/**
 * @brief       Default configuration for clock plugin
 * @license:    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author:     Luis Machuca Bezzaza <luis.machuca [at] gulix.cl>
 */

/* default clock object ID 
  Note 1: this can't be changed from Config Manager
  Note 2: if you change this value, you must change the IDs for 
          the CSS styles as well! (Javascript will update itself)
 */
$conf['clock_id']         = 'dw_clock_object';
/* digital or analog */
$conf['clock_type']       = 'digital';
$conf['clock_style']      = 'plain';
$conf['clock_is_date']    = 1;
$conf['clock_fmt_date']   = '%Y/%M/%D(%W)';
$conf['clock_fmt_time']   = '%h:%m:%s';
/* helpbar: controls whether the helpbar will be visible */
$conf['clock_is_helpbar'] = 1;
/* clock_infopage: wikilink for helpbar (the official plugin page if empty) */
$conf['clock_infopage']   = ':wiki:clock';
/* nojs_fallback: behaviour when JavaScript is not enabled */
$conf['nojs_fallback']    = 0;