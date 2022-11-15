<?php

 class Word_Arrange{
	public static function wordSort($str){
		/* Using str_split convert them into array. */
		$array = str_split($str);
		 
		/* Sort the array using sort() method. */		 
		sort($array);
		 
		/* Implode the sorted array. */		 
		$str = implode($array);
		 
		/* Output will be sorted string.*/	 
		return $str;
	}
}

?>