<?php
if (!function_exists('cmsRouteName')) {

    /**
     * Generate cms route name
     *
     * @param string $name
     * @return string
     */
    function cmsRouteName($name)
    {
        return config('cms.prefix_url') . '.' . $name;
    }
}

if (!function_exists('cmsRoute')) {

    /**
     * Generate a cms backend URL to a named route.
     *
     * @param  string  $route
     * @param  array   $parameters
     * @return string
     */
    function cmsRoute($route, $parameters = [])
    {
        return route(cmsRouteName($route), $parameters);
    }
}

if (!function_exists('cmsLoginUrl')) {

    /**
     * Get login_url configuration value
     *
     * @return string
     */
    function cmsLoginUrl()
    {
        return config('cms.login_url');
    }
}

if (!function_exists('cmsLogoutUrl')) {

    /**
     * Get login_url configuration value
     *
     * @return string
     */
    function cmsLogoutUrl()
    {
        return config('cms.logout_url');
    }
}

if (!function_exists('cmsPath')) {

    /**
     * Generate cms backend path (without hostname)
     *
     * @param string $path
     * @return string
     */
    function cmsPath($path = null)
    {
        return config('cms.prefix_url') . '/' . $path;
    }
}

if (!function_exists('cmsUrl')) {

    /**
     * Generate a cms backend url for the application.
     *
     * @param  string  $path
     * @param  mixed   $parameters
     * @param  bool    $secure
     * @return string
     */
    function cmsUrl($path = null, $parameters = [], $secure = null)
    {
        return url(cmsPath($path), $parameters, $secure);
    }
}

if (!function_exists('cmsViewName')) {

    /**
     * Generate a cms view
     *
     * @param string $name
     * @return string
     */
    function cmsViewName($name)
    {
        return 'admins.' . $name;
    }
}

if (!function_exists('cmsTrans')) {

    /**
     * Translate the given message.
     *
     * @param  string  $transId
     * @param  array   $parameters
     * @param  string  $domain
     * @param  string  $locale
     * @return string
     */
    function cmsTrans($transId, $parameters = [], $domain = 'messages', $locale = null)
    {
        return trans('cms.' . $transId, $parameters, $domain, $locale);
    }
}

if (!function_exists('cmsLangs')) {
    function cmsLangs()
    {
        return config('cms.lang');
    }
}

if (!function_exists('isAcceptLang')) {
    function isAcceptLang($lang)
    {
        return in_array($lang, array_keys(cmsLangs()));
    }
}

if (!function_exists('addStringToArrayValue')) {
    function addStringToArray($key, $value, &$array, $check = false)
    {
        if ($value === null) {
            return null;
        }

        if ($check && isset($array[$key])) {
            return $array[$key];
        }

        $array[$key] = $value . (empty($array[$key])?'':' ' . $array[$key]);
        return $array[$key];
    }
}

if (!function_exists('uploadRelativePath')) {
    function uploadRelativePath($path = '')
    {
        $path = trim($path, DIRECTORY_SEPARATOR);
        return 'files' . ($path?DIRECTORY_SEPARATOR . $path:$path);
    }
}

if (! function_exists('stringJson')) {
    function stringJson($string)
    {
        return addcslashes(str_limit($string, 200), "\n\r\t\\");
    }
}

if (!function_exists('generateId')) {
    function generateId($name)
    {
        $key = preg_replace('/(\]\[|\[)/', '_', $name);
        $key = preg_replace('/\]/', '', $key);
        return $key;
    }
}

if (!function_exists('booleanViewForIndex')) {
    function booleanViewForIndex($value)
    {
        if ($value) {
            return "<span class=\"label label-success label-circle\"><i class=\"fa fa-check\"></i></span>";
        }
        return "<span class=\"label label-danger label-circle\"><i class=\"fa fa-times\"></i></span>";
    }
}
