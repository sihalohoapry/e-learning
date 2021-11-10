<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\ClassStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (request()->ajax()) {
            $query = User::whereIn('roles',['SISWA','GURU']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('user.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('user.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->editColumn('photo_user',function($item){
                    return $item->photo_user ? '<img src="'. Storage::url($item->photo_user) .'" style="max-height:80px;"/>' : '';
                 })
                ->rawColumns(['action','photo_user'])
                ->make();
        }
        return view('pages.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $class = ClassStudent::all();
        return view('pages.create-user',[
            'class' => $class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['photo_user'] = $request->file('photo_user')->store('assets/photo/photo_user','public');
        User::create($data);
        return redirect()->route('user.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::with(['class'])->findOrFail($id);
        $class = ClassStudent::all();
        return view('pages.edit-user',[
            'data' => $data,
            'class' => $class,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        else{
            unset($data['password']);
        }

        if($request->email){
            $data['email'] = $request->email;
        }
        else{
            unset($data['email']);
        }

        $item->update($data);
        return redirect()->route('user.index');

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);

        $data->delete();
        return redirect()->route('user.index');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
