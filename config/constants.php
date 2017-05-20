<?php
//file : app/config/constants.php

/*
|-----------------------------------------------------------------|
			NOTES :
|-----------------------------------------------------------------|
*/
/*	[1] .
 *		 	ALSO DEFINE LIKE FOLLOWING :
 *		
 *			define('YOUR_DEFINED_CONST', 'Your defined constant value!');
 *		
 *			and access any where like : echo YOUR_DEFINED_CONST . '<br>';
 **/

/*	[2].
 *			FOR STATIC :
 *		
 *		 	For Static Arrays :
 *		
 *							Create static_arrays.php file in the config directory:-
 *		
 *							class StaticArray
 *							{
 *		
 *							    public static $langs = [
 *							        'es' => 'www.domain.es',
 *							        'en' => 'www.domain.us',
 *							        'uk' => 'www.domain.uk',
 *							        'br' => 'www.domain.br',
 *							        'it' => 'www.domain.it',
 *							        'de' => 'www.domain.de',
 *							        'fr' => 'www.domain.fr'
 *							    ];
 *		
 *							}
 *							You can use it like:-
 *		
 *							echo StaticArray::$langs['en'];
 **/

return [
	'SUCCESS' => 'Success',
	'ERROR' => 'Error'
];

/*
 *	Access : echo Config::get('constants.SUCCESS');
 *
 **/