<?php

class App
{
fvfdsdsrgergdsad
    /**
    * 获取smarty对象
    * @return Smarty
    */
    public static function getTpl()
    {
        static $tpl = NULL;
        if (is_null($tpl))
        {
            require_once( ROOT_PATH . 'common/libs/Smarty-3.1.13/Smarty.class.php' );
            $tpl = new Smarty();

            $tpl->template_dir 		= ROOT_ADMIN . 'themes/';
            $tpl->compile_dir  		= ROOT_PATH . 'cache/';
            $tpl->config_dir   		= ROOT_PATH . 'cache/';
            $tpl->cache_dir    		= ROOT_PATH . 'cache/';
            $tpl->left_delimiter 	= '{{';
            $tpl->right_delimiter 	= '}}';

            $tpl->compile_check  	= TRUE;
            $tpl->debugging         = FALSE;
        }
        
        return $tpl;
    }
    
    /**
     * 获取DB
     * 
     * @return Database
     */
    public static function getDb()
    {
        static $db = NULL;
        if (!($db instanceof Database))
        {
            $config = require ROOT_CONFIG . 'db.config.php';
            
            $db = new Database($config['host'], $config['username'], $config['password'], $config['database'], $config['persistent'], FALSE, DEBUG ? TRUE : FALSE);
            $db->setCharset($config['charset']);
        }
        
        return $db;
    }
}