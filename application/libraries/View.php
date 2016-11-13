<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * View Object
 * 
 * Renders a layout with partials (blocks) inside.
 * Renders partials only (header, content, footer. etc).
 * Allows a plugin or module object to render a partial.
 * 
 * @copyright    Copyright (c) Wiredesignz 2010-11-08
 * @version     0.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class View
{ 
    public $layout;
    private $partials = array(), $vars = array();
    
    public function __construct($config = NULL) /* uses application/config/view.php */
    {
        if (is_array($config)) 
        {
            $this->layout = $config['layout'];
            $this->set($config);
        }
    }
    
    public static function factory($layout = NULL, $data = array())
    {
        return new View(array('layout' => $layout) + $data);
    }
       
    public function load($view, $layout, $data = array()) /* add a partial & config */
    {
        if ( ! isset($this->partials[$view]))
        {
            $this->partials[$view] = (is_object($layout)) ? $layout : self::factory($layout, $data);
        }
        
        return $this->partials[$view];
    }
    
    public function __set($partial, $config = NULL)
    {
        return $this->load($partial, $config);
    }
    
    public function set($var, $value = NULL) /* store data for partials */
    {
        ($var) ? (is_array($var)) ? $this->vars = $var + $this->vars : $this->vars[$var] = $value : NULL;
    }

    public function __get($partial)
    {
        return (isset($this->partials[$partial])) ? $this->partials[$partial] : NULL;
    }
        
    public function get($var = NULL) /* returns data value(s) */
    {
        return ($var) ? (isset($this->vars[$var])) ? $this->vars[$var] : NULL : $this->vars;
    }
        
    public function __toString()
    {        
        return $this->render(TRUE);
    }
    
    public function render($render = FALSE) /* render the view */
    {
        $ci = & get_instance();
        
        $ci->load->vars($this->partials);
        
        if ($this->layout)
        {
            return $ci->load->view($this->layout, $this->vars, $render);
        }
        else 
        {
            ob_start();
            
            foreach($this->partials as $partial) /* render partials */
            {
                $partial->render();
            }
                
            if ($render) return ob_get_clean();
            
            echo ob_get_clean();
        }
    }
}

?>