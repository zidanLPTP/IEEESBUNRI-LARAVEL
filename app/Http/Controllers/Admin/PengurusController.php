<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Officer;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PengurusController extends Controller
{
    public function index()
    {
        $officers = Officer::orderBy('created_at', 'desc')->get();
        return view('admin.pengurus.index', compact('officers'));
    }

    public function create()
    {
        $divisions = ["Secretariat", "Information & Creative Media", "Business Affairs", "Education", "Membership & Internal Relations", "Public Relations & Partnership"];
        return view('admin.pengurus.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|string|unique:officers,member_id',
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'division' => 'required|string',
            'image' => 'nullable|string', // Cloudinary URL
            'password' => 'required|string',
        ], [
            'member_id.unique' => 'Member ID ini sudah terdaftar di sistem!',
        ]);

        Officer::create([
            'member_id' => $request->member_id,
            'name' => $request->name,
            'position' => $request->position,
            'sub_role' => $request->division,
            'image' => $request->image,
            'password' => Hash::make($request->password),
            'accessRole' => $request->access_role ?? 'STAFF',
        ]);

        return redirect()->route('admin.pengurus.index')->with('success', 'Anggota Pengurus baru berhasil ditambahkan!');

    }


    public function destroy($id)
    {
        $officer = Officer::findOrFail($id);

        $officer->delete();

        return response()->json([
            'success' => true
        ]);
    }

}