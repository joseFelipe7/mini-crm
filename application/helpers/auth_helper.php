<?php 
function userAuth(){
    $CI = get_instance();
    
    if($CI->session->user) return true;

    return redirect('/login','refresh');
}