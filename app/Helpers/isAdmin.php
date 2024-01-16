<?php
if (! function_exists('isAdmin')) {
    function isAdmin()
    {
        $user = auth()->user();
        return $user && $user->hasRole('Super Admin');
    }
}
