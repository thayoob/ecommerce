<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function  index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }
    public function store(Request $request)
    {
        $setting = Setting::first();
        if ($setting) {
            $setting->update([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'website_title' => $request->website_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'adress' => $request->adress,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
            ]);
            return redirect()->back()->with('message', 'Settings Saved ');
        } else {
            Setting::create([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'website_title' => $request->website_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'adress' => $request->adress,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
            ]);
            return redirect()->back()->with('message', 'Settings Saved ');
        }
    }
}
