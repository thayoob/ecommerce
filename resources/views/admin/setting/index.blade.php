@extends('layouts.admin')
@section('title', 'Admin Setting')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
            <form action="{{ url('/admin/settings') }}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="website_name">Website Name</label>
                                <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}"
                                    class="form-control  border-dark" id="website_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="website_url">Website URL</label>
                                <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}"
                                    class="form-control  border-dark" id="website_url" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="website_title">Page Title</label>
                                <input type="text" name="website_title" value="{{ $setting->website_title ?? '' }}"
                                    class="form-control  border-dark" id="website_title" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="meta_keyword">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control  border-dark" id="meta_keyword" rows="3" required>{{ $setting->meta_keyword ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" class="form-control  border-dark" id="meta_description" rows="3" required>{{ $setting->meta_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="adress">Address</label>
                                <textarea name="adress" class="form-control  border-dark" id="adress" rows="3" required>{{ $setting->adress ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone1">Phone 1*</label>
                                <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}"
                                    class="form-control  border-dark" id="phone1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone2">Phone No 2</label>
                                <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}"
                                    class="form-control  border-dark" id="phone2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email1">Email Id 1 *</label>
                                <input type="email" name="email1" value="{{ $setting->email1 ?? '' }}"
                                    class="form-control  border-dark" id="email1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email2">Email Id 2</label>
                                <input type="email" name="email2" value="{{ $setting->email2 ?? '' }}"
                                    class="form-control  border-dark" id="email2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="facebook">Facebook (Optional)</label>
                                <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}"
                                    class="form-control  border-darkj" id="facebook">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="twitter">Twitter (Optional)</label>
                                <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}"
                                    class="form-control  border-darkj" id="twitter">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="instagram">Instagram (Optional)</label>
                                <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}"
                                    class="form-control  border-darkj" id="instagram">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="youtube">YouTube (Optional)</label>
                                <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}"
                                    class="form-control  border-darkj" id="youtube">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save Setting</button>
                </div>
            </form>
        </div>
    </div>
@endsection
