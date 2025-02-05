<?php

namespace App\Http\Controllers;

use App\Http\Requests\Professor\CreateRequest;
use App\Http\Requests\Professor\StoreRequest;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfessorUserController extends Controller
{
    const VIEW_PATH = "admin.";

    public function index()
    {

        $professors = Professor::query()->with([
            'user',
        ])->get();
        //dd($professors);
        return view(self::VIEW_PATH . 'professor.' . 'index', compact('professors'));
    }

    public function create(CreateRequest $request)
    {
        return view(self::VIEW_PATH . 'professor.' . 'create');
    }

    public function edit($id)
    {
        $professor = Professor::where('id', $id)->with('user')->first();
        $is_teacher = $professor->user->role_id == 3;

        return view(self::VIEW_PATH . 'professor.edit')
            ->with('professor', $professor)
            ->with('is_teacher', $is_teacher);
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role_id' => '3'
            ]);

            Professor::create([
                'name' => $user->name,
                'profile_pic_link' => null,
                'public_email' => $request->get('public_email', $user->email),
                'rede_social1' => $request->get('rede_social1', $user->rede_social1),
                'link_rsocial1' => $request->get('link_rsocial1', $user->link_rsocial1),
                'rede_social2' => $request->get('rede_social2', $user->rede_social2),
                'link_rsocial2' => $request->get('link_rsocial2', $user->link_rsocial2),
                'rede_social3' => $request->get('rede_social3', $user->rede_social3),
                'link_rsocial3' => $request->get('link_rsocial3', $user->link_rsocial3),
                'rede_social4' => $request->get('rede_social4', $user->rede_social4),
                'link_rsocial4' => $request->get('link_rsocial4', $user->link_rsocial4),
                'user_id' => $user->id,
                'sigaa' => 0
            ]);

            DB::commit();
            return redirect()->route('professores.index');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->user->delete();
        return redirect()->route('professores.index');
    }

    public function update(Request $request, $id)
    {
        // $rules = [
        //     'name' => 'required|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
        //     'current_password' => 'required',
        //     'new_password' => 'nullable|min:8|max:12',
        //     'password_confirmation' => 'nullable|required_with:new_password|same:new_password',
        // ];

        // $request->validate($rules);
        //dd($request);
        $professor = Professor::find($id);
        $user = User::join('professors', 'professors.user_id', 'users.id')
            ->where('professors.id', $id)
            ->first();



        $professor->name = $request->name;
        $professor->public_email = $request->public_email;
       //$professor->user->email = $request->email;
        $professor->link_rsocial1 = $request->link_rsocial1;
        $professor->link_rsocial2 = $request->link_rsocial2;
        $professor->link_rsocial3 = $request->link_rsocial3;
        $professor->link_rsocial4 = $request->link_rsocial4;
        $professor->rede_social1 = $request->rede_social1;
        $professor->rede_social2 = $request->rede_social2;
        $professor->rede_social3 = $request->rede_social3;
        $professor->rede_social4 = $request->rede_social4;
        $professor->save();


        $professor->user->name = $request->name;
        $professor->user->email = $request->email;
        $professor->user->password = bcrypt($request->password);
        $professor->user->save();




        // if (Hash::check($request->input('current_password'), $user->password)) {
        //     if (!empty($request->input('new_password'))) {
        //         $user->password = bcrypt($request->input('new_password'));
        //     }
        //     $user->updated_at = now();
        //     $user->email = $request->input('email');
        //     $user->save();

        //     if (isset($professor)) {
        //         $professor->public_email = $request->input('public_email');
        //         $professor->public_link = $request->input('public_link');
        //         $professor->rede_social1 = $request->input('rede_social1');
        //         $professor->link_rsocial1 = $request->input('link_rsocial1');
        //         $professor->rede_social2 = $request->input('rede_social2');
        //         $professor->link_rsocial2 = $request->input('link_rsocial2');
        //         $professor->rede_social3 = $request->input('rede_social3');
        //         $professor->link_rsocial3 = $request->input('link_rsocial3');
        //         $professor->rede_social4 = $request->input('rede_social4');
        //         $professor->link_rsocial4 = $request->input('link_rsocial4');
        //         $professor->save();
        //     }
        // } else {
        //     return redirect()->back()->withInput()
        //         ->withErrors(['current_password' => 'Senha atual incorreta']);
        // }

        return back()
            ->with('success', 'Dados atualizado com sucesso!');
    }


}
