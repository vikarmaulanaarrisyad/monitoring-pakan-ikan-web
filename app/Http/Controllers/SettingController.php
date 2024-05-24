<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('setting.index', compact('setting'));
    }

    public function update1(Request $request, Setting $setting)
    {
        $rules = [
            'nama_aplikasi' => 'required',
            'nama_singkatan_aplikasi' => 'required',
            'nama_pemilik' => 'required',
        ];

        if ($request->has('pills') && $request->pills == 'logo') {
            $rules = [
                'logo_login' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'logo_aplikasi' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'favicon' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            ];
        }

        if ($request->has('pills') && $request->pills == 'sosial-media') {
            $rules = [
                'instagram_link' => 'required|url',
                'twitter_link' => 'required|url',
                'fanpage_link' => 'required|url',
                'google_plus_link' => 'required|url'
            ];
        }

        $data = $request->except('logo_login', 'logo_aplikasi', 'favicon');

        if ($request->hasFile('logo_login')) {
            if (Storage::disk('public')->exists($setting->logo_login)) {
                Storage::disk('public')->delete($setting->logo_login);
            }

            $data['logo_login'] = upload('setting', $request->file('logo_login'), 'setting');
        }

        if ($request->hasFile('logo_aplikasi')) {
            if (Storage::disk('public')->exists($setting->logo_aplikasi)) {
                Storage::disk('public')->delete($setting->logo_aplikasi);
            }

            $data['logo_aplikasi'] = upload('setting', $request->file('logo_aplikasi'), 'setting');
        }

        if ($request->hasFile('favicon')) {
            if (Storage::disk('public')->exists($setting->favicon)) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $data['favicon'] = upload('setting', $request->file('favicon'), 'setting');
        }

        $setting->update($data);

        if ($request->has('pills') && $request->pills == 'bank') {
            $setting->bank_setting()->attach($request->bank_id, $request->only('account', 'name', 'is_main'));
        }

        return back()->with([
            'message' => 'Pengaturan berhasil diperbarui',
            'success' => true
        ]);
    }

    public function update(Request $request, Setting $setting)
    {
        $rules = [
            'nama_aplikasi' => 'required',
            'nama_singkatan_aplikasi' => 'required',
            'nama_pemilik' => 'required',
        ];

        if ($request->has('pills') && $request->pills == 'logo') {
            $rules = [
                'logo_login' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'logo_aplikasi' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'favicon' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            ];
        }

        if ($request->has('pills') && $request->pills == 'sosial-media') {
            $rules = [
                'instagram_link' => 'required|url',
                'twitter_link' => 'required|url',
                'fanpage_link' => 'required|url',
                'google_plus_link' => 'required|url'
            ];
        }

        $data = $request->except('logo_login', 'logo_aplikasi', 'favicon');

        if ($request->hasFile('logo_login') && $setting->logo_login) {
            if (Storage::disk('public')->exists($setting->logo_login)) {
                Storage::disk('public')->delete($setting->logo_login);
            }

            $data['logo_login'] = upload('setting', $request->file('logo_login'), 'setting');
        }

        if ($request->hasFile('logo_aplikasi') && $setting->logo_aplikasi) {
            if (Storage::disk('public')->exists($setting->logo_aplikasi)) {
                Storage::disk('public')->delete($setting->logo_aplikasi);
            }

            $data['logo_aplikasi'] = upload('setting', $request->file('logo_aplikasi'), 'setting');
        }

        if ($request->hasFile('favicon') && $setting->favicon) {
            if (Storage::disk('public')->exists($setting->favicon)) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $data['favicon'] = upload('setting', $request->file('favicon'), 'setting');
        }

        $setting->update($data);

        if ($request->has('pills') && $request->pills == 'bank') {
            $setting->bank_setting()->attach($request->bank_id, $request->only('account', 'name', 'is_main'));
        }

        return back()->with([
            'message' => 'Pengaturan berhasil diperbarui',
            'success' => true
        ]);
    }
}
