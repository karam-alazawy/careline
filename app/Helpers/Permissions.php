<?php

namespace App\Helpers;

use DB;

class Permissions
{
    public static function havePermission($requiredPermission)
    {
        $permissions = DB::table('users')->select('permissions')->where('id',auth()->user()->id)->get()->first();
        $permissions=$permissions->{'permissions'};
        $permissions = explode(',', $permissions);
        if (!in_array($requiredPermission,$permissions,true) and  !in_array('allPermissions',$permissions,true)) {
            return abort(403, 'You don\'t have permission to access');
        }
        return true;

    }
    public static function checkActive()
    {
        if (!auth()->user()->active) {
            return abort(403, 'Current user is not activated in the system');
        }
    }
    
}
