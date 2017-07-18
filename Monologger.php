<?php

/**
 * @author Mehrez Labidi <contact.mehrezlabidi@gmail.com>
 */
require_once('MonologgerInterface.php'); 
require_once('Parameters.php'); 

class Monologger implements MonologgerInterface {
    public function __construct() {
        global $file;global $env;
        $this->fichier =$file  ;
		$this->env =$env ;
    }	 
    public function info( $content  ) {
	   $this->logger($this->fichier, $content , "INFO", $this->env);		
	}
    public function warn( $content  ) {
	  $this->logger($this->fichier, $content , "WARN",  $this->env);		
	}
    public function error( $content  ) {
	  $this->logger( $this->fichier, $content , "ERROR", $this->env);		
	}
    public function logger($file, $content = " ", $level = "INFO", $env = "prod") {
        ($env == 'prod') ? $env = 'prod' : $env = 'dev';
        $dateSystem =( new \DateTime()) ->format('Y-m-d');	
		 if (strpos($file, '.log')!== true) {$file = $file.'.log';  }
        $file = str_replace('.log', "." . $env . "-" . $dateSystem . '.log', $file);
        if (!(($env == 'prod' ) && ($level == "INFO"))) { // if env = prod unnecessary  to put log INFO
            $t = microtime(true);
            $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $t));
            $current = "[" . $date->format("Y-m-d H:i:s.u") . "]";
            $content = $current . " " . $level . " " . $content . " \n";
            file_put_contents($file, $content, FILE_APPEND);
        }
    }
}
