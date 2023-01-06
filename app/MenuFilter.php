<?php
namespace App;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Auth;
use App\Models\User;

class MenuFilter implements FilterInterface
{
   public function transform($item, Builder $builder){
      $role = array();
      if(isset($item['role']))
         $role = explode(',',$item['role']);
      
      if(empty($role) || in_array(Auth::user()->role,$role)) {
         return $item;
      }

      return false;
   }
}
?>
