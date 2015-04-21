<?php
/**
 * Hardware Shop
 *
 * @author  Manjunath Reddy<manju16832003@gmail.com>
 * @version 1.0
 * @package Manager/Admin
 *
 */

/**
 * Class ManagerCategoryController
 */
class ManagerCategoryController extends ManagerController
{

    public function showIndex()
    {

        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        $categories = Category::all();

        return View::make('manager.category.index', compact('categories'));
    }

    /**
     * Show Add Category Page
     */
    public function showAdd()
    {
        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        return View::make('manager.category.add');
    }

    /**
     * Add new category
     */
    public function add()
    {
        // validate the info
        $validator = Category::validate(Input::all());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('manager/category/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            // create category
            $category = new Category();
            $category->name = Input::get('name');
            $category->description = Input::get('description');
            $category->created_by = 'manju';
            $category->updated_by = 'manju';
            $category->save();

            return Redirect::to('manager/category');
        }
    }

    /**
     * Show edit category page.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showEdit($id)
    {
        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        $category = Category::find($id);

        return View::make('manager.category.edit', compact('category'));
    }

    /**
     * Edit existing category
     */
    public function edit($id)
    {
        // validate the info
        $validator = Category::validate(Input::all());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('manager/category')
                ->withErrors($validator)
                ->withInput();
        } else {
            $category = Category::find($id);

            $category->name = Input::get('name');
            $category->description = Input::get('description');
            $category->update();

            return Redirect::to('manager/category');
        }

    }

    /**
     * Delete existing category
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return Redirect::to('manager/category');
    }
}