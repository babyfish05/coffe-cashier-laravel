<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegisterExport;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Imports\RegisterImport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Nette\Schema\Expect;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = User::latest()->get();
       return view('auth.register', compact('user'));
    }

   public function store(StoreRegisterRequest $request)
{
    $validated = $request->validated(); // Memanggil metode validated() untuk mengekstrak data yang sudah divalidasi
    $validated['password'] = bcrypt($validated['password']);
    DB::beginTransaction();
    User::create($validated); // Menggunakan data yang sudah divalidasi
    DB::commit();

    return redirect()->back()->with('success', 'Data berhasil ditambah');
}


    public function destroy($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('register')->with('success', 'Data berhasil dihapus!');
        } catch (ModelNotFoundException | QueryException | Exception | PDOException $error) {
            dd($error->getMessage(), $error->getCode());
        }
    }
   
}
