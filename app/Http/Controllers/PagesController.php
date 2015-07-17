<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

use App\Page;

use Session;
use Validator;
use Input;

use DataFilter;
use DataGrid;
use DataForm;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $filter = DataFilter::source(Page::where('id','!=','0'));
        $filter->add('title','Title', 'text');
        $filter->add('slug','Slug', 'text');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('title','Title', true);
        $grid->add('slug','Slug', true);
        $grid->add('created_at','Created', true);
        $grid->edit('/admin/pages/manage', 'Edit','show|modify|delete');
        $grid->paginate(20);

        return view('admin.pages.index',compact('grid','filter')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $form = DataForm::source(new Post());  
        $this->_buildForm($form);

        $title = "Add New Page";
        return $form->view('admin.pages.form', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id,Request $request)
    {
        $page = Page::find($id);
        $form = DataForm::source($page);

        $slug = $request->input('slug',null);
        $content = $request->input('body');
        if ($content != null) {
            //print($content); exit();
        }
        if ($slug != null && $slug == $page->slug) {
            $this->_buildForm($form,false);
        } else {
            $this->_buildForm($form);
        }


        $title = "Edit Page";
        return $form->view('admin.pages.form', compact('title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Page::destroy($id);
        return redirect('/admin/pages');
    }

    public function manage(Request $request)
    {
        $input = $request->all();
        if (isset($input['modify'])) {
            return redirect('/admin/pages/edit/'.$input['modify']);
        } elseif (isset($input['show'])) {
            $page = Page::find($input['show']);
            return redirect($page->slug);
        } elseif (isset($input['delete'])) {
            return $this->destroy($input['delete']);
        }

        return redirect('/admin/pages');
    }

    public function render($slug)
    {
        $page = Page::where('slug','=',$slug)->first();
        if ($page) {
            return view('pages.view',compact('page'));
        }

        abort(404);
    }

    public function json($slug)
    {
        $pages = Page::orderBy('created_at','desc');
        if ($pages) {
            return view('pages.json',compact('pages'));
        }

        abort(404);
    }


    private function _buildForm(&$form,$uniqueSlug=true)
    {
        $form->add('title','Title', 'text')->rule('required|min:5');
        $form->add('subtitle','SubTitle', 'text')->rule('required|min:5');

        if($uniqueSlug) {
            $form->add('slug','URL Slug', 'text')->rule('required|alpha_dash|min:3|unique:pages');
            $form->add('image_url','Hero Image', 'image')->move('hero_images')->fit(300, 300)->preview(80,80)->rule('unique:pages');        
        } else {
            $form->add('slug','URL Slug', 'text')->rule('required|alpha_dash|min:3');
            $form->add('image_url','Hero Image', 'image')->move('hero_images')->fit(300, 300)->preview(80,80);        
        }

        $form->add('body','Body','redactor')->rule('required');
        $form->saved(function () use ($form) {
            return Redirect::to('/admin/pages');
        });

        $form->submit('Save');
    }


}
