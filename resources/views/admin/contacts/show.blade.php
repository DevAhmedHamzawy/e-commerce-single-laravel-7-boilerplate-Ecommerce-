@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">رسائل تواصل معنا</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">الإسم</label>
                        <div class="col-md-10">{{ $contact->name }}</div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">الجوال</label>
                        <div class="col-md-10">{{ $contact->mobile }}</div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">البريد الإلكترونى</label>
                        <div class="col-md-10">{{ $contact->email }}</div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">محتوى الرسالة</label>
                        <div class="col-md-10">{{ $contact->body }}</div>
                    </div>

        
                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection