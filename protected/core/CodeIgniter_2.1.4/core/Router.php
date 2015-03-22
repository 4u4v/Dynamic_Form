<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * Router Class
 *
 * Parses URIs and determines routing
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @author		ExpressionEngine Dev Team
 * @category	Libraries
 * @link		http://codeigniter.com/user_guide/general/routing.html
 */
class CI_Router {

    /**
     * Config class
     *
     * @var object
     * @access public
     */
    var $config;

    /**
     * List of routes
     *
     * @var array
     * @access public
     */
    var $routes = array();

    /**
     * List of error routes
     *
     * @var array
     * @access public
     */
    var $error_routes = array();

    /**
     * Current module name
     *
     * @var string
     * @access public
     */
    var $module = NULL;

    /**
     * Current class name
     *
     * @var string
     * @access public
     */
    var $class = '';

    /**
     * Current method name
     *
     * @var string
     * @access public
     */
    var $method = 'index';

    /**
     * Sub-directory that contains the requested controller class
     *
     * @var string
     * @access public
     */
    var $directory = '';

    /**
     * Default controller (and method if specific)
     *
     * @var string
     * @access public
     */
    var $default_controller;

    /**
     * Constructor
     *
     * Runs the route mapping function.
     */
    function __construct() {
        $this->config = & load_class('Config', 'core');
        $this->uri = & load_class('URI', 'core');
        log_message('debug', "Router Class Initialized");
    }

    // --------------------------------------------------------------------

    /**
     * Set the route mapping
     *
     * This function determines what should be served based on the URI request,
     * as well as any "routes" that have been set in the routing config file.
     *
     * @access	private
     * @return	void
     */
    function _set_routing() {
        // Are query strings enabled in the config file?  Normally CI doesn't utilize query strings
        // since URI segments are more search-engine friendly, but they can optionally be used.
        // If this feature is enabled, we will gather the directory/class/method a little differently
        $segments = array();
        if ($this->config->item('enable_query_strings') === TRUE AND isset($_GET[$this->config->item('controller_trigger')])) {
            if (isset($_GET[$this->config->item('directory_trigger')])) {
                $this->set_directory(trim($this->uri->_filter_uri($_GET[$this->config->item('directory_trigger')])));
                $segments[] = $this->fetch_directory();
            }

            if (isset($_GET[$this->config->item('controller_trigger')])) {
                $this->set_class(trim($this->uri->_filter_uri($_GET[$this->config->item('controller_trigger')])));
                $segments[] = $this->fetch_class();
            }

            if (isset($_GET[$this->config->item('function_trigger')])) {
                $this->set_method(trim($this->uri->_filter_uri($_GET[$this->config->item('function_trigger')])));
                $segments[] = $this->fetch_method();
            }
        }

        // Load the routes.php file.
        if (is_file(APPPATH . 'config/routes.php')) {
            include(APPPATH . 'config/routes.php');
        } elseif (defined('ENVIRONMENT') AND is_file(APPPATH . 'config/' . ENVIRONMENT . '/routes.php')) {
            include(APPPATH . 'config/' . ENVIRONMENT . '/routes.php');
        }

        $this->routes = (!isset($route) OR ! is_array($route)) ? array() : $route;
        unset($route);

        // Set the default controller so we can display it in the event
        // the URI doesn't correlated to a valid controller.
        $this->default_controller = (!isset($this->routes['default_controller']) OR $this->routes['default_controller'] == '') ? FALSE : strtolower($this->routes['default_controller']);

        // Were there any query string segments?  If so, we'll validate them and bail out since we're done.
        if (count($segments) > 0) {
            return $this->_validate_request($segments);
        }

        // Fetch the complete URI string
        $this->uri->_fetch_uri_string();

        // Is there a URI string? If not, the default controller specified in the "routes" file will be shown.
        if ($this->uri->uri_string == '') {
            return $this->_set_default_controller();
        }

        // Do we need to remove the URL suffix?
        $this->uri->_remove_url_suffix();

        // Compile the segments into an array
        $this->uri->_explode_segments();

        // Parse any custom routing that may exist
        $this->_parse_routes();

        // Re-index the segment array so that it starts with 1 rather than 0
        $this->uri->_reindex_segments();
    }

    // --------------------------------------------------------------------

    /**
     * Set the default controller
     *
     * @access	private
     * @return	void
     */
    function _set_default_controller() {
        if ($this->default_controller === FALSE) {
            show_error("Unable to determine what should be displayed. A default route has not been specified in the routing file.");
        }
        // Is the method being specified?
        if (strpos($this->default_controller, '/') !== FALSE) {

            $x = explode('/', $this->default_controller);

            $this->set_class($x[0]);
            $this->set_method($x[1]);
            $this->_set_request($x);
        } else {
            $this->set_class($this->default_controller);
            $this->set_method('index');
            $this->_set_request(array($this->default_controller, 'index'));
        }

        // re-index the routed segments array so it starts with 1 rather than 0
        $this->uri->_reindex_segments();

        log_message('debug', "No URI present. Default controller set.");
    }

    // --------------------------------------------------------------------

    /**
     * Set the Route
     *
     * This function takes an array of URI segments as
     * input, and sets the current class/method
     *
     * @access	private
     * @param	array
     * @param	bool
     * @return	void
     */
    function _set_request($segments = array()) {
        $segments = $this->_validate_request($segments);

        if (count($segments) == 0) {
            return $this->_set_default_controller();
        }

        $this->set_class($segments[0]);

        if (isset($segments[1])) {
            // A standard method request
            $this->set_method($segments[1]);
        } else {
            // This lets the "routed" segment array identify that the default
            // index method is being used.
            $segments[1] = 'index';
        }

        // Update our "routed" segment array to contain the segments.
        // Note: If there is no custom routing, this array will be
        // identical to $this->uri->segments
        $this->uri->rsegments = $segments;
    }

    // --------------------------------------------------------------------

    /**
     * Validates the supplied segments.  Attempts to determine the path to
     * the controller.
     *
     * @access	private
     * @param	array
     * @return	array
     */
    function _validate_request($segments) {
        if (count($segments) == 0) {
            return $segments;
        }

        // --------------------------------------------------------
        // Does the requested controller exist in a module?
        $modules = $this->config->item('modules');

        if ($modules && in_array($segments[0], $modules)) {
            $module = array_shift($segments);
            $controller_basepath = APPPATH . 'modules/' . $module . '/';

            $this->set_module($module);
        } else {
            $controller_basepath = APPPATH;
        }

        // --------------------------------------------------------
        // Just do it, OK?
        return $segments;
    }

    // --------------------------------------------------------------------

    /**
     *  Parse Routes
     *
     * This function matches any routes that may exist in
     * the config/routes.php file against the URI to
     * determine if the class/method need to be remapped.
     *
     * @access	private
     * @return	void
     */
    function _parse_routes() {
        // Turn the segment array into a URI string
        $uri = implode('/', $this->uri->segments);

        // Is there a literal match?  If so we're done
        if (isset($this->routes[$uri])) {
            return $this->_set_request(explode('/', $this->routes[$uri]));
        }

        // Loop through the route array looking for wild-cards
        foreach ($this->routes as $key => $val) {
            // Convert wild-cards to RegEx
            $key = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $key));

            // Does the RegEx match?
            if (preg_match('#^' . $key . '$#', $uri)) {
                // Do we have a back-reference?
                if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE) {
                    $val = preg_replace('#^' . $key . '$#', $val, $uri);
                }

                return $this->_set_request(explode('/', $val));
            }
        }

        // If we got this far it means we didn't encounter a
        // matching route so we'll set the site default route
        $this->_set_request($this->uri->segments);
    }

    // --------------------------------------------------------------------

    /**
     * Set the module name
     *
     * @access	public
     * @param	string
     * @return	void
     */
    function set_module($module) {
        $this->module = $module;
    }

    // --------------------------------------------------------------------

    /**
     * Fetch the current module
     *
     * @access	public
     * @return	string
     */
    function fetch_module() {
        return $this->module;
    }

    // --------------------------------------------------------------------

    /**
     * Set the class name
     *
     * @access	public
     * @param	string
     * @return	void
     */
    function set_class($class) {
        $this->class = str_replace(array('/', '.'), '', $class);
    }

    // --------------------------------------------------------------------

    /**
     * Fetch the current class
     *
     * @access	public
     * @return	string
     */
    function fetch_class() {
        return $this->class;
    }

    // --------------------------------------------------------------------

    /**
     *  Set the method name
     *
     * @access	public
     * @param	string
     * @return	void
     */
    function set_method($method) {
        $this->method = $method;
    }

    // --------------------------------------------------------------------

    /**
     *  Fetch the current method
     *
     * @access	public
     * @return	string
     */
    function fetch_method() {
        if ($this->method == $this->fetch_class()) {
            return 'index';
        }

        return $this->method;
    }

    // --------------------------------------------------------------------

    /**
     *  Set the directory name
     *
     * @access	public
     * @param	string
     * @return	void
     */
    function set_directory($dir) {
        $this->directory = str_replace(array('/', '.'), '', $dir) . '/';
    }

    // --------------------------------------------------------------------

    /**
     *  Fetch the sub-directory (if any) that contains the requested controller class
     *
     * @access	public
     * @return	string
     */
    function fetch_directory() {
        return $this->directory;
    }

    // --------------------------------------------------------------------

    /**
     *  Set the controller overrides
     *
     * @access	public
     * @param	array
     * @return	null
     */
    function _set_overrides($routing) {
        if (!is_array($routing)) {
            return;
        }

        if (isset($routing['directory'])) {
            $this->set_directory($routing['directory']);
        }

        if (isset($routing['controller']) AND $routing['controller'] != '') {
            $this->set_class($routing['controller']);
        }

        if (isset($routing['function'])) {
            $routing['function'] = ($routing['function'] == '') ? 'index' : $routing['function'];
            $this->set_method($routing['function']);
        }
    }

}

// END Router Class

/* End of file Router.php */
/* Location: ./system/core/Router.php */