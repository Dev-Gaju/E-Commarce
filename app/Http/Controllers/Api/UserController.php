<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index(Request $request){
//        return User::all();
        $paginate=User::paginate(10);

        return response()->json([
            'success'=> true,
            'message'=>'Data Show Successfully',
            $paginate,
        ]);
    }

    public function show($id){
        $user=User::find($id);
        if (is_null($user)){
            return response()->json('Record Not Found',200);
        }
        return response()->json($user,200);
    }

    public function store(Request $request){

        $rules=[
            'email'=>'required|email',
            'name' =>'required|min:6',
            'password'=>'required',
            'photo'=>'required|image|max:10240',
        ];

        $validator=Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return response()->json($validator->getMessageBag()->all());
        }

        $photo=$request->file('photo');
        $fileName=uniqid('photo_',true).str_random(10).'.'.$photo->getClientOriginalExtension();


        if ($photo->isValid()){
            $photo->storeAs('image',$fileName);
        }

        $user=User::create([
            'email'=>strtolower(trim($request->input('email'))),
            'name'=>strtolower(trim($request->input('name'))),
            'password'=>bcrypt($request->input('password')),
            //'photo'=>$fileName,
            'remember_token'=>str_random(32)

        ]);
       // $user->notify(new VerifyEmail($user));

        return response()->json(['message'=> 'Account Created']);

    }

        public function update(Request $request,$id){
        $user=User::find($id);
            if (is_null($user)){
                return response()->json('Record Not Found',200);
            }
        $user->update($request->all());
          return response()->json(200);
    }

    public function destroy(Request $request,$id){
        $user=User::find($id);

        if (is_null($user)){
            return response()->json('Record Not Found',200);
        }
        $user->delete();
        return response()->json(204);


    }




}
