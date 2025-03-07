<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use App\Helpers\SearchHelper;

class UserController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        return view( 'auth.register' );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $data = $request->validate( [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',

        ] );
        $users = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
        ] );
        if ( $users ) {
            return redirect( '/login' );
        }

    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $user = User::findOrFail( $id );
        return view( 'edit', compact( 'user' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        try {

            $data = [
                'name' => $request[ 'name' ],
                'email'=> $request[ 'email' ],
            ];
            User::where( 'id', $id )->update( $data );
            return redirect( '/dashboard' )->with( 'success', 'User updated successfully' );
        } catch ( \Exception $ex ) {
            return response()->back()->with( 'error', $ex->getMessage() );
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
        $users = SearchHelper::searchUserByName($text); 
    
        if ($users->isEmpty()) { 
            return response()->json(['message' => 'User not found'], 404);
        }
    
        //return response()->json(['users' => $users]); 
        return redirect( '/dashboard' );
    }
}
