<?php

/* Settings config file, require config class lib/config.class.php */

Config::set('site_name', 'GreatDay.com.ua');

Config::set('languages', array('ru', 'en'));

Config::set('routes', array(
    'default' => '',
    'admin'   => 'admin_'
));

Config::set('default_route', 'default');
Config::set('default_language', 'ru');
Config::set('default_controller', 'main');
Config::set('default_action', 'index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.pass', '');
Config::set('db.name', 'greatday');

Config::set('salt', 'jd7sj3sdkd964he7e');