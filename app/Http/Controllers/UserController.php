<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Http\Requests\UserRequest;

class UserController extends Controller {

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
    * Display a listing of the resource.
    */

    public function index() {
        return view( 'auth.register' );
    }



    /**
    * Store a newly created resource in storage.
    */

    public function store(UserRequest $request ) {
     $users  =  $this->userRepository->store($request->all());

         if ( $users ) {
            return redirect( '/login' );
        }
}

    /**
    * Show the form for editing the specified resource.
    */

    public function edit(string $id) {
        $user = User::where('id', $id)->first();
        return view('edit', compact('user'));
    }


    /**
    * Update the specified resource in storage.
    */

    public function update(Request $request, string $id) {
        try {
           $this->userRepository->update($request->all(),$id);
        return redirect('/dashboard')->with('success', 'User updated successfully');
        } catch (\Exception $ex) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $user = User::where( 'id', $id )->first();
        $user->delete();
        return back()->withSuccess( 'Category Deleted!!' );
    }

    public function searchUser(Request $request)
    {
        $text = $request->input('name');
        $users = $this->userRepository->getSearchData($text);
        if ($users->isEmpty()) {
            return response()->json(['message' => 'User not found'], 404);
        }

    return response()->json(['users' => $users]);
        // return redirect( '/dashboard' );
    }
}
