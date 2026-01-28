<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengaduanNotification;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'jenis_pengaduan' => 'required|string',
            'isi_pengaduan' => 'required|string|max:1000'
        ]);

        $pengaduan = Pengaduan::create($validated);

        // Kirim email notifikasi ke admin
        try {
            $adminEmail = env('ADMIN_EMAIL', 'admin@terminalcilacap.com');
            Mail::to($adminEmail)->send(new PengaduanNotification($pengaduan));
        } catch (\Exception $e) {
            // Log error tapi tetap redirect dengan success
            \Log::error('Failed to send email notification: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Pengaduan Anda berhasil dikirim. Kami akan segera menindaklanjuti.');
    }
}
