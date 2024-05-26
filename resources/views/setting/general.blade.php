<form action="{{ route('setting.update', $setting->id) }}" method="post">
    @csrf
    @method('put')

    <x-card>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="nama_aplikasi">Nama Aplikasi</label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('nama_aplikasi') is-invalid @enderror"
                        id="nama_aplikasi" placeholder="Nama aplikasi" autocomplete="off" name="nama_aplikasi"
                        value="{{ old('nama_aplikasi') ?? $setting->nama_aplikasi }}">
                    @error('nama_aplikasi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="nama_aplikasi">Nama Singkatan Aplikasi</label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('nama_singkatan_aplikasi') is-invalid @enderror"
                        id="nama_singkatan_aplikasi" placeholder="Nama singkatan aplikasi" autocomplete="off"
                        name="nama_singkatan_aplikasi"
                        value="{{ old('nama_singkatan_aplikasi') ?? $setting->nama_singkatan_aplikasi }}">
                    @error('nama_singkatan_aplikasi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ip_address_esp32cam">Alamat IP ESP32 Cam</label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('ip_address_esp32cam') is-invalid @enderror"
                        id="ip_address_esp32cam" autocomplete="off" name="ip_address_esp32cam"
                        value="{{ old('ip_address_esp32cam') ?? $setting->ip_address_esp32cam }}"
                        placeholder="192.168.0.1">
                    @error('ip_address_esp32cam')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="nama_pemilik">Nama Pemilik</label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('nama_pemilik') is-invalid @enderror"
                        id="nama_pemilik" autocomplete="off" name="nama_pemilik"
                        value="{{ old('nama_pemilik') ?? $setting->nama_pemilik }}">
                    @error('nama_pemilik')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group"></div>
                <label for="deskripsi">Deskripsi Aplikasi</label>
                <textarea class="form-control form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="10"
                    name="deskripsi" autocomplete="off">{{ old('deskripsi') ?? $setting->deskripsi }}</textarea>
                @error('deskripsi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <x-slot name="footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-card>
</form>
