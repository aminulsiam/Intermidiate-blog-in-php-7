<?php

	trait Validation
	{
		public function validation()
		{
		  $data = trim($data);
		  $string = str_replace(' ',' ', $data); // Replaces all spaces with hyphens.
   		  $data =  preg_replace('/[^A-Za-z0-9\. -]/','', $string); // Removes special chars.
		  return $data;
		}
	}