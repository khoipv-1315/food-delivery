<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

class MenuComposer
{

	public function compose(View $view)
	{	
		$categories = Category::where('status', config('customer.product.is_active'))->get();
		$view->with('categories', $categories);
	}
}
