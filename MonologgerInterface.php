<?php

/**
 * @author Mehrez Labidi <contact.mehrezlabidi@gmail.com>
 */
 
require_once('Parameters.php'); 
interface MonologgerInterface {
    public function info($content); 	
    public function warn($content); 
    public function error($content); 
    public function logger($file, $content = " ", $level = "INFO", $env = "prod"); 
}