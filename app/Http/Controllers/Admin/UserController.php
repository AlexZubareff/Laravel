<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.user.index', [
            'userList'=>User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, User $user)
    {

        if($request->post('newPassword')){
            $status = $user->fill([
                'name'=>$request->post('name'),
                'email' =>$request->post('email'),
                'password' => Hash::make($request->post('newPassword')),
                'is_admin' =>$request->post('is_admin')
            ])->save();

            if($status){
                return redirect()->route('admin.user.index')
                    ->with('success', trans('messages.admin.user.update.success'));
            }
            return back()->with('error', trans('messages.admin.user.update.fail'));

        }
        $status = $user->fill($request->validated())->save();

        if($status){
            return redirect()->route('admin.user.index')
                ->with('success', trans('messages.admin.user.update.success'));
        }
        return back()->with('error', trans('messages.admin.user.update.fail'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
