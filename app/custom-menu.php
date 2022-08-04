<?php 

/**
 * Custom menu functions.
 */
namespace App;

function get_menu_id($location) {
	$locations = get_nav_menu_locations();
	$menu_id =  $locations[$location];
	
	return ! empty($menu_id) ? $menu_id : '';
}


function get_child_menu_items($menu_array, $parent_id){
	$child_menus = [];	


	if( ! empty($menu_array) && is_array($menu_array)){
		
		foreach($menu_array as $menu){
			if(intval($menu->menu_item_parent) === $parent_id) {
				array_push($child_menus, $menu);
			}
		}

	}

	return $child_menus;

}

