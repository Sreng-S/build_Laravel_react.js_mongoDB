<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Http\Requests;
//use Illuminate\Database\Eloquent\Collection;

class CrudController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return void
   */
    public function index()
    {
      $crud = DB::collection('crud')->get();
  
      return view('crudindex', compact('crud'));
    }
  
  /**
   * Show the form for creating a new resource.
   *
   * @return void
   */
    public function create()
    {
      return view('crudadd');
    }
  
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return void
   */
    public function store(Request $request)
    {
      $crud = new Crud();
      $crud->title =  $request->input('title');
      $crud->isbn =  $request->input('isbn');
      $crud->author =  $request->input('author');
      $crud->category = $request->input('category') ;
      $crud->save();
      $all = DB::collection('crud')->get();
  
      return view('crudindex', compact('all'));
  
    }
  
  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return void
   */
    public function show($id)
    {
      $crud = DB::collection('crud')->where('_id', $id)->get();
  
      return view('crudview', compact('crud'));
  
    }
  
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return void
   */
    public function edit($id)
    {
      $crud = DB::collection('crud')->where('_id', $id)->get();
  
      return view('crudedit', compact('crud'));
  
    }
  
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return void
   */
    public function update(Request $request, $id)
    {
      DB::collection('crud')->where('_id', $id)
        ->update([
          'title' => $request->input('title'),
          'isbn' => $request->input('isbn'),
          'author' => $request->input('author'),
          'category' => $request->input('category')
        ] );
  
      $books = DB::collection('crud')->get();
  
      return view('crudindex', compact('crud'));
    }
  
  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return void
   */
    public function destroy($id)
    {
      DB::collection('crud')->where('_id', $id)->delete();
      $crud = DB::collection('crud')->get();
      return view('crudindex', compact('crud'));
    }
}
