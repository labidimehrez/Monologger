<?php

/**
 * @author Mehrez Labidi <contact.mehrezlabidi@gmail.com>
 */

  
require_once('Monologger.php'); 

 $logger =new  Monologger();
 if( 1 !== 2){
	$logger->info("[". __LINE__ ."] ". "all right");
 }
 else{
	$logger->error("[". __LINE__ ."] "."not true");
 }