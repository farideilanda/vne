<?php

	    $sentence = "je veux passer";

	    if(preg_match("#(.)*(d[éeè]*sir[éeè]*|souhai[a-z]+|voud[a-z]+|veu[a-z]*|[^in]form[a-z]+|obten[iuoa]r)+(.)*([^in]form[a-z]*|certif[a-z]*|passer)+#i", $sentence))
	    	echo "yes";
	    else
	    	echo "no";





?>