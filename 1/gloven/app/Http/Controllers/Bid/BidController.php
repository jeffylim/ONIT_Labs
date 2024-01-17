<?php

namespace App\Http\Controllers\Bid;


use App\Models\Bid;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Condition;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;


class BidController extends \App\Http\Controllers\Controller
{
    public function bid(){
        $bids = Bid::all();
        return view('bid.bid', ['bids'=>$bids]);
    }

    public function bid_add(Request $request){
        $validated = $request->validate([
            'userMail'=>'required|email',
            'userTitle'=>'required',
            'userCategory'=>'required',
            'userText'=>'nullable',
            'userFile'=>'nullable|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg,svg|max:4096'
        ]);
        $bid = Bid::create($validated);
        if($request->file()){
            $fileName = time().'_'.$request->userFile->getClientOriginalName();
            $filePath = $request->file('userFile')->storeAs('uploads',$fileName,'public');
            $bid->userFileName = $fileName;
            $bid->userFilePath = '/storage/app/public/'.$filePath;
            $bid->save();
        }
        return view('bid.message', ['bid'=>$bid, 'message'=>'bid_add_done']);
    }

    public function download_file($id){
        $bid = Bid::findOrFail($id);
        $filePath = 'D:/gloven'.$bid->userFilePath;
        return response()->download($filePath, $bid->userFileName);
    }

    public function bid_delete($id){
        Bid::findOrFail($id)->delete();
        return redirect('/bid');
    }
}
