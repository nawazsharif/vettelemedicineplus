<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
	public function categories(Request $request)
	{
		$categories = Category::all();
		return view('category.category_list', compact('categories'));
	}
	public function addEditCategory(Request $request, $id = null)
	{
		if (!empty($id)) {
			$title = "Edit Category";
			$categoryData = Category::where('id', $id)->first();
			$category = Category::find($id);
		} else {
			$title = "Add Category";
			$categoryData = '';
			$category = new Category;
		}
		if ($request->isMethod('post')) {
			//upload Category Image
			if ($request->hasFile('logo')) {
				$image_temp = $request->file('logo');
				if ($image_temp->isValid()) {
					$extension = $image_temp->getClientOriginalExtension();
					$image_name = rand(11, 99999) . '.' . $extension;
					$image_path = 'images/category_images/' . $image_name;
					//upload image here
					Image::make($image_temp)->save($image_path);
					// Save Category Image
					$category->logo = $image_name;
				}
			} else {
				$category->logo = $request->prev_img;
			}
			if (empty($request->status)) {
				$request->status = 0;
			}

			$category->name = $request->name;
			$category->placeholder = $request->placeholder;
			$category->status = $request->status;
			$category->save();

			$request->session()->flash('success_message', 'Category inserted Successfully');
			return redirect('/categories');
		}
		return view('category.add_edit_category', compact('categoryData', 'title'));
	}
	public function deleteCategories(Request $request, $id)
	{
		Category::where('id', $id)->delete();
		$request->session()->flash('success_message', 'Category deleted Successfully');
		return redirect('/categories');
	}
}