<?php
/* Wuhu-Skambra multi language modification by Kim Roar 'Zokum' Foldøy Hauge. */


/* 
This function takes in an identifer string and returns the best possible language based on the preference string.
typical values for preference may be nn-NO for nynorsk, nn-BM for bokmål and en-GB for english (great britain).

It will always fall back to en-GB if nothing is found.

Note: It doesn'æt do that currently, this will be fixed!

*/

// This sets the global language preference for this installation.
$default_language = "nn-NO";


function print_localized($identifier) {
	global $default_language;
	print (get_localized($identifier, $default_language));
}


function get_localized($identifier, $languages) {


	$translate = array (
		array ("identifier", "en-GB", "nn-NO"),
		array ("footer_copyright", "<a href=\"http://wuhu.function.hu/\">Wuhu</a> &copy; Function organizing. Additional modifications by Zokum of Skambra Crew", "<a href=\"http://wuhu.function.hu/\">Wuhu</a> &copy; Function organizing. Modifikasjoner utført av Zokum i Skambra Crew"),
		array ("profile_edit_username", "Username:", "Bruker:"),
		array ("profile_edit_change_password", ">New password: (only if you want to change it)", "Nytt passord: (kun om du vil endra det)"),
		array ("profile_edit_change_password_confirm", "New password again:", "Bekreft nytt passord:"),
		array ("profile_edit_nick_handle", "Nick/Handle:", "Alias/kallenavn"),
		array ("profile_edit_group","Group: (if any)", "Gruppe: (om du er i en)"),
		
		array ("array_end", "", "")
	);

	// First find correct language columns!

	$lang = 1;

	for ($col = 0; $col < 3; $col++) {
		if ( strcmp($translate[0][$col], $languages) == 0) {
			$lang = $col;
		}
	}

	
	for ($row = 0; strcmp($translate[$row][0], "array_end") != 0; $row++) {
		if ( strcmp($translate[$row][0], $identifier) == 0) {
			if (strlen($translate[$row][$lang]) > 0) {
				return $translate[$row][$lang];
			} else {
				return $translate[$row][0];
			}
		} 
	}
	
	// Final fallback :)
	return ("unknown string '$identifier'");
}


?>

