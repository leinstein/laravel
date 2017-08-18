<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\Article;

use \App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Article::withTrashed()->restore();
        $data = Article::all();
        return  view('article/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //验证请求数据
        $data = Article::create($request->all());
        return empty($data) ? '未知错误' : redirect('article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Article::find($id);
        return view('article/show',compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Article::find($id);
        return view('article/edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $data = Article::where('id',$id)->update($request->only('title','content','user_id'));
        return $data==false ? '未知错误' : redirect("article/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bool = Article::where('id',$id)->delete();
        if($bool==false){
            //框架会把return数据转为json
            return ['status'=>-1,'msg'=>'删除失败'];
        }
        return ['status'=>1];   //删除成功
        //另一种删除
        //$data = Article::where('id',$id)->delete();
        //return $data==false ? '未知错误' : redirect("article");
    }
}
