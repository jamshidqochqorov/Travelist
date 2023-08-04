<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
     public function index()
{
    $clients = Client::paginate(5);
    return view('pages.client.index',compact('clients'));
}
    public function add(){
        $agents = Agent::all();
        $categories = Category::all();
        return view('pages.client.add',compact('categories','agents'));
    }

    public function create(Request $request){
        $this->validate($request,[
            'count'=>'required',
            'category_id'=>'required',
            'agent_id'=>'required'
        ]);
        $client = Client::create([
            'category_id'=>$request->category_id,
            'count'=>$request->count,
            'agent_id'=>$request->agent_id
        ]);
        return redirect()->route('clientIndex');
    }
    public function edit($id){
        $agents = Agent::all();
        $client = Client::find($id);
        $categories = Category::withTrashed()->get();
        return view('pages.client.edit',compact('client','agents','categories'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'count'=>'required',
            'category_id'=>'required',
            'agent_id'=>'required'
        ]);
        $client = Client::find($id);
        $client->count = $request->count;
        $client->category_id = $request->category_id;
        $client->agent_id = $request->agent_id;
        $client->save();
        message_set('Klent tahrirlandi!','success',3);

        return redirect()->back();
    }
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->back();
    }
}
