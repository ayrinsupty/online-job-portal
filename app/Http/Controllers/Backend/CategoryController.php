<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    public $pageHeader;
    public $index_route = "admin.categories.index";
    public $create_route = "admin.categories.create";
    public $store_route = "admin.categories.store";
    public $edit_route = "admin.categories.edit";
    public $update_route = "admin.categories.update";

    public function __construct()
    {
        Paginator::useBootstrapFive();
        $this->pageHeader = [
            'title' => "Categories",
            'sub_title' => "",
            'plural_name' => "categories",
            'singular_name' => "Category",
            'index_route' => route($this->index_route),
            'create_route' => route($this->create_route),
            'store_route' => route($this->store_route),
            'edit_route' => $this->edit_route,
            'update_route' => $this->update_route,
            'base_url' => url('admin/category'),

        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['datas'] = Category::orderBy('id', 'DESC')->paginate(10);
        return view('backend.pages.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageHeader'] = $this->pageHeader;
        return view('backend.pages.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:' . with(new Category)->getTable() . ',name',
        ]);
        $row = new Category;
        $row->name = $request->name;
        if ($row->save()) {
            return redirectRouteHelper($this->index_route);
        } else {
            return redirectRouteHelper();
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageHeader'] = $this->pageHeader;
        $data['singleData'] = Category::find($id);
        return view('backend.pages.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:' . with(new Category)->getTable() . ',name,' . $id,
        ]);
        $row = Category::find($id);
        $row->name = $request->name;
        if ($row->save()) {
            return redirectRouteHelper($this->index_route);
        } else {
            return redirectRouteHelper();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Category::find($id);
        if (!is_null($deleteData)) {
            if ($deleteData->delete()) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 422,]);
            }
        }
    }
}
