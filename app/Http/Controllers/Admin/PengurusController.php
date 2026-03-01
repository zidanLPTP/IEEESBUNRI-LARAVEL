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
            'member_id'   => 'required|string|unique:officers,member_id',
            'name'        => 'required|string|max:255',
            'position'    => 'required|string',
            'division'    => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ], [
            'member_id.unique' => 'Member ID ini sudah terdaftar di sistem!',
            'image.max'        => 'Ukuran foto maksimal adalah 5MB.',
        ]);

        $imagePath = null;

        // 2. Proses Foto Profil dengan Intervention Image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.webp';

            $manager = new ImageManager(new Driver());
            
            // BACA KEAJAIBAN INI: Otomatis potong gambar jadi KOTAK (500x500px)
            // Tidak peduli admin upload foto persegi panjang atau landscape!
            $image = $manager->read($file)->cover(500, 500);

            if (!Storage::disk('public')->exists('officers')) {
                Storage::disk('public')->makeDirectory('officers');
            }

            $absolutePath = storage_path('app/public/officers/' . $filename);
            $image->toWebp(80)->save($absolutePath);
            $imagePath = 'officers/' . $filename;
        }

        // 3. Simpan ke Database MySQL
        Officer::create([
            'member_id'   => $request->member_id,
            'name'        => $request->name,
            'position'    => $request->position,
            'sub_role'    => $request->division,
            'image'       => $imagePath,
            'password'    => Hash::make($request->member_id), 
            'accessRole'  => $request->access_role ?? 'STAFF', 
        ]);

        return redirect()->route('admin.pengurus.index')->with('success', 'Anggota Pengurus baru berhasil ditambahkan!');
    }

    
}