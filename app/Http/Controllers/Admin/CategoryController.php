<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $model;
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = $this->model->paginate(config('admin.paginate_size'));

        return View('admin.category.index',compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View('admin.category.form');
    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $path = \Storage::putFile('Categories', $request->file('image'));
        $inputs = $request->all();
        $inputs ['image'] = $path;
        $this->model->create($inputs);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category=$this->model->findOrFail($id);

        return View('admin.category.form',compact('category'));
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $inputs = $request->all();
        if ($request->has('image')) {
            $path = \Storage::putFile('Categories', $request->file('image'));
            $inputs ['image'] = $path;
        }
        $category = $this->model->findOrFail($id);
        $category->update($inputs);

        return redirect()->route('admin.categories.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = $this->model->findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
}
