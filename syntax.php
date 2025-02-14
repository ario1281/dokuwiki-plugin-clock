<?php
/**
 * @file       clock/syntax.php
 * @brief      Show a clock in wikipage
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Luis Machuca Bezzaza <luis.machuca [at] gulix.cl>
 * @version    3.0
 * @date       2025-02-14
 * @link       http://www.dokuwiki.org/plugin:clock
 *
 *  This plugin's purpose is to display a clock using both 
 *  CSS and JavaScript techniques normally available.
 *  For a live test point a decent web browser to my wiki.
 *  http://ryan.gulix.cl/dw/desarrollo/
 *
 *  Greetings.
 *        - Luis Machuca Bezzaza a.k.a. 'ryan.chappelle'
**/

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN'))
	define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
 
/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
**/
class syntax_plugin_clock extends DokuWiki_Syntax_Plugin {
	function getType() { return 'substition'; }
	function getAllowedTypes() { return array(); }
	function getSort() { return 290; }
	function getPType() { return 'block'; }
	function connectTo($mode) {
		$this->Lexer->addSpecialPattern (
			'^\{\{clock\}\}$', $mode,
			'plugin_clock'
		);
	}
 
    function handle($match, $state, $pos, $handler){
      $data = array();
      /* get config clock value */
      // clock
      $clock = array();
      $clock['id']       = $this->getConf('clock_id');
      $clock['type']     = $this->getConf('clock_type');
      $clock['is_date']  = $this->getConf('clock_is_date');
  
      $theNoJS = $this->getConf('nojs_fallback');
      $clock['txt_date'] = !$theNoJS ? '　　　' : 'clock';
      $clock['txt_time'] = !$theNoJS ? '　　　' : 'plugin';
  
      // helpbar
      $help = array();
      $help['is_help'] = $this->getConf('clock_is_helpbar');
      $help['link']    = $this->getConf('clock_infopage');
  
      $conf = array();
      $conf['style'] = $this->getConf('clock_style');
      $conf['clock'] = $clock;
      $conf['help']  = $help;
  
      /* javascript */
      $js = array();
      $js['fmt_date'] = $this->getConf('clock_fmt_date') ?? '%H/%M/%D(%W)';
      $js['fmt_time'] = $this->getConf('clock_fmt_time') ?? '%h:%m:%s';
  
      $data = array('conf' => $conf, 'js' => $js);
  
      /* Are we ready yet? */
      return $data;
    }  
    function render($mode, $renderer, $data) {
        static $wasRendered = false;
        if ($wasRendered) { return true; }

        if ($mode == 'xhtml') {
			/** @var Doku_Renderer_xhtml $renderer */
			$wasRendered = true;

            // html code
            $renderer->doc .= "<!-- clock clock -->";
			$renderer->doc .= $this->create_html_clock($data);
			$renderer->doc .= "<!-- /clock clock -->";

            return true;
        }
        if ($mode == 'odt') {
            // may be implemented in the future
            return false;
        }
        if ($mode == 'text') {
			$wasRendered = true;

            $id = $data['id'];
			$date = date('H:i:s');
			$renderer->doc .= " $id $date ";
            
            return true;
        }
        /* That's all about rendering that needs to be done, at the moment */
        return false;
    }

	/**
	 * Summary of create_html_clock
	 * @param mixed $data	data related to the clock plugin
	 * @return string		the html of clock-block
	**/
	private function create_html_clock($data) {
		$theStyle = $data['conf']['style'] ?? 'plain';

		$clock_doc  = $this->draw_clock($data['conf']['clock']);
		$help_doc   = $this->draw_helpbar($data['conf']['help']);
		$sendjs_doc = $this->draw_send_js($data['js']);

		// html code
		$html_doc = <<<EOF
		<div id="clock_wrapper" class="$theStyle">
			$sendjs_doc
			$clock_doc
			$help_doc
		</div>
		EOF;

		return $html_doc;
	}

	/**
	 * Summary of draw_clock
	 * @param mixed $data	clock-related data
	 * @return string		the contents of clock
	**/
	private function draw_clock($data) {
		$theId	 = $data['id'];
		$theType = $data['type'] ?? 'digital';
		$isDate	 = $data['is_date'];
		$txtDate = $data['txt_date'];
		$txtTime = $data['txt_time'];

		// clock contents
		$style = "display: " . ($isDate ? "block" : "none") . ";";
		$contents = <<<EOF
		<div id="$theId">
			<div class="clock_date" style="$style"> $txtDate </div>
			<div class="clock_time $theType"> $txtTime </div>
		</div>
		EOF;

		return $contents;
	}

	/**
	 * Summary of draw_helpbar
	 * @param mixed $data	helpbar-related data
	 * @return string		the contents of helpbar
	 * 
	 * The helpbar is displayed only when $conf['clock_helpbar'] is set.
	**/
	private function draw_helpbar($data) {
		if (!$data['is_help']) { return ""; }

		// point to plugin page by default
		$link = empty($data['link']) ? "doku>plugin:clock" : $data['link'];
		$info = "[[$link|Infomation]]";

		$info = p_render('xhtml', p_get_instructions($info), $info);
		// remove <p>, </p>
		$info = trim(substr($info, 4, -5));

		return "<p class=\"helpbar\"> $info </p>";
	}

    /**
	 * Summary of draw_send_js
	 * @param mixed $data	data to be sent to javascript
	 * @return string		the contents of send element
	**/
	private function draw_send_js($data) {
		$varidates = "";
		foreach ($data as $key => $value) {
			$varidates .= "$key=\"$value\" ";
		}
		return "<span class=\"varidates\" $varidates></span>";
	}
}
