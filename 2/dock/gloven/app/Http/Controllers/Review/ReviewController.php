<?php

namespace App\Http\Controllers\Review;


use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Condition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;


class ReviewController extends \App\Http\Controllers\Controller
{
    public function review_add(Request $request){
        $validated = $request->validate([
            'product_id'=>'required|numeric',
            'grade'=>'numeric',
            'comment'=>'required'
        ]);
        $product=Product::findOrFail($validated['product_id']);
        if (Review::all()->where('user_id', '=', auth()->id())->where('product_id', '=', $product->id)->first()){
            return redirect('/catalog/more/'."$product->url")->withErrors(['Вы уже оставляли комментарий']);
        }
        else{
            $user = User::findOrFail(auth()->id());
            Review::create([
                'user_id'=>$user->id,
                'user_surname'=>$user->surname,
                'user_name'=>$user->name,
                'product_id'=>$validated['product_id'],
                'grade'=>$validated['grade'],
                'comment'=>$validated['comment']
            ]);
            return redirect('/catalog/more/'."$product->url");
        }
    }
}
