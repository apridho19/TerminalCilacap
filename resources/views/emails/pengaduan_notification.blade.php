<x-mail::message>
    # Pengaduan Baru dari Website Terminal Cilacap

    Ada pengaduan baru yang masuk melalui website Terminal Cilacap.

    ## Detail Pengaduan

    **Nama:** {{ $pengaduan->nama }}

    **Email:** {{ $pengaduan->email ?? 'Tidak dicantumkan' }}

    **Telepon:** {{ $pengaduan->telepon ?? 'Tidak dicantumkan' }}

    **Jenis Pengaduan:** {{ $pengaduan->jenis_pengaduan }}

    **Tanggal:** {{ $pengaduan->created_at->format('d F Y, H:i') }} WIB

    ---

    ## Isi Pengaduan

    {{ $pengaduan->isi_pengaduan }}

    ---

    <x-mail::button :url="config('app.url') . '/sistem_informasi/dashboard'">
        Lihat Dashboard
    </x-mail::button>

    Silakan segera ditindaklanjuti sesuai prosedur yang berlaku.

    Terima kasih,<br>
    Sistem Informasi Terminal Cilacap
</x-mail::message>