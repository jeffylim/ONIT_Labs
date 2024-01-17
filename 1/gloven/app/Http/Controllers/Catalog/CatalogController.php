<?php

namespace App\Http\Controllers\Catalog;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Condition;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;


class CatalogController extends \App\Http\Controllers\Controller
{
    public function catalog(){
        $products = Product::with('conditions')->get();
        return view('catalog.catalog', ['products'=>$products]);
    }

    public function more($url){
        $product = Product::with('conditions', 'reviews')->where('url','=',$url)->firstOrFail();
        $reviews = Review::all();
        return view('catalog.more', ['product'=>$product, 'reviews'=>$reviews]);
    }

    public function add(){
        $conditions = Condition::all();
        return view('catalog.add', ['conditions'=>$conditions]);
    }

    public function add_do(Request $request){
        $conditions = [];
        $count = 0;
        $validated = $request->validate([
            'photo'=>'nullable|file',
            'title'=>'required|min:8|unique:products,title',
            'url'=>'required|min:8|unique:products,url',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'price'=>'integer|required'
        ]);
        $photo = $request->hasFile('photo') ? $request->file('photo') : false;
        $photoPath = $photo ? $photo->getPathname() : '';
        $validated['photo']= $photo ? 'products/'.$request->title : '';
        $product = Product::create($validated);
        if($photo){
            @mkdir('products');
            copy($photoPath, $validated['photo']);
        }
        if($request->has('condition')){
            foreach ($request->condition as $i){
                array_push($conditions, $i);
                $count++;
            }
            for($i=0;$i<$count;$i++){
                DB::table('condition_product')->insert([
                    'condition_id'=>$conditions[$i],
                    'product_id'=>$product->id,
                ]);
            }
        }
        return redirect('/catalog');
    }

    public function edit($id){
        $product = Product::with('conditions')->findOrFail($id);
        $conditions = Condition::all();
        return view('catalog.edit', ['product'=>$product, 'conditions'=>$conditions]);
    }

    public function edit_do(Request $request){
        $product = Product::findOrFail($request->get('id'));
        if ($product->title == $request->get('title') && $product->url == $request->get('url')){
            $validated = $request->validate([
                'photo'=>'nullable|file',
                'short_desc'=>'required',
                'long_desc'=>'required',
                'price'=>'integer|required'
            ]);
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'products/'.$request->title : '';
            if($photo){
                @mkdir('products');
                copy($photoPath, $validated['photo']);
                $product->photo=$validated['photo'];
            }
            DB::table('condition_product')->where('product_id', '=', $product->id)->delete();
            $condition = []; $count = 0;
            if ($request->has('condition')){
                foreach ($request->condition as $c){
                    array_push($condition, $c);
                    $count++;
                }
                for($i=0;$i<$count;$i++){
                    DB::table('condition_product')->insert([
                        'condition_id'=>$condition[$i],
                        'product_id'=>$product->id,
                    ]);
                }
            }
            $product->save();
        }
        if ($product->title != $request->get('title') && $product->url != $request->get('url')){
            $validated = $request->validate([
                'title'=>'required|min:8|unique:products,title',
                'url'=>'required|min:8|unique:products,url',
                'photo'=>'nullable|file',
                'short_desc'=>'required',
                'long_desc'=>'required',
                'price'=>'integer|required'
            ]);
            $photo = $request->hasFile('photo') ? $request->file('photo') : false;
            $photoPath = $photo ? $photo->getPathname() : '';
            $validated['photo']= $photo ? 'products/'.$request->title : '';
            if($photo){
                @mkdir('products');
                copy($photoPath, $validated['photo']);
                $product->photo=$validated['photo'];
            }
            DB::table('condition_product')->where('product_id', '=', $product->id)->delete();
            $condition = []; $count = 0;
            if ($request->has('condition')){
                foreach ($request->condition as $c){
                    array_push($condition, $c);
                    $count++;
                }
                for($i=0;$i<$count;$i++){
                    DB::table('condition_product')->insert([
                        'condition_id'=>$condition[$i],
                        'product_id'=>$product->id,
                    ]);
                }
            }
            $product->save();
        }

        return redirect('/catalog');
    }

    public function delete($id){
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect('/catalog');
    }

    public function add_condition(){
        $conditions = Condition::all();
        return view('catalog.add_condition', ['conditions'=>$conditions]);
    }

    public function add_condition_do(Request $request){
        $validated = $request->validate([
            'title'=>'required|unique:conditions,title'
        ]);
        $condition = Condition::create($validated);
        return redirect('/catalog/add_condition');
    }

    public function edit_condition($id){
        $condition = Condition::findOrFail($id);
        return view('catalog.edit_condition', ['condition'=>$condition]);
    }

    public function edit_condition_do(Request $request){
        $condition = Condition::findOrFail($request->get('id'));
        if($request->get('title')!=$condition->title){
            $validated = $request->validate(['title'=>'required|unique:conditions,title']);
            $condition->title=$validated['title'];
            $condition->save();
        }
        return redirect('/catalog/add_condition');
    }

    public function delete_condition($id){
        DB::table('conditions')->where('id', '=', $id)->delete();
        return redirect('/catalog/add_condition');
    }
}
