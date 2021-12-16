@extends('admin.layouts.app')

@section('header')
    <style>
        .tox-notifications-container { display: none; }
    </style>
@endsection

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

                   

                    

                    <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الإسم</th>
                                    <th scope="col">العنوان</th>
                                    <th scope="col">الصورة</th>
                                    <th scope="col">رقم الجوال</th>
                                    <th scope="col">البريد الإلكترونى</th>
                                    <th scope="col">النوع</th>
                                    <th scope="col">العمليات</th>
                                    <th scope="col">العمليات</th>
                                </tr>
                            </thead>
                            @forelse ($contacts as $contact)
                            <tbody>
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $contact->name  }}</td>
                                    <td>{{ $contact->title ?? 'غير موجود'  }}</td>
                                    <td><img src="{{ $contact->img_path }}" width="50" height="50" alt="" srcset=""></td>
                                    <td>{{ $contact->mobile }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->sort }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary">
                                            <a href="{{ route('contacts.show', $contact->id) }}" style="color: #fff;" target="_blank">قراءة محتوى الرسالة</a>
                                        </button>  
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form">
                                           كتابة رد على الرسالة
                                        </button>  
                                    </td>
                                </tr>
                            </tbody>
                            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                      <h5 class="modal-title" id="exampleModalLabel">إرسال رسالة</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form>
                                      <div class="modal-body">
        
                                        <input type="hidden" name="name" id="name" value="{{ $contact->name }}">
                                        <input type="hidden" name="email" id="email" value="{{ $contact->email }}">


                                        <div class="col-md-12" id="the_icon">
                                            <img src="{{ url('adminpanel/img/upload.png') }}" style="width:60px;height:60px;margin: 16px 47%;background-color: black;" class="changing-image" onclick="document.getElementById('image').click()" alt="Cinque Terre">
                                            <h5 class="text-center">إرفع صورة من هنا</h5>
                                            <input  style="display: none;"  id="image" type="file" name="main_image">
                                        </div>

                                        <div class="form-group">
                                            <label for="message">العنوان</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>

                                         

                                        <div class="form-group">
                                          <label for="message">محتوى الرسالة</label>
                                          <textarea name="message" id="the_message" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                       
                                       
                                      </div>
                                      <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button class="btn btn-success" id="reply">إرسال</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                            </div>

                            

                            @empty
                                <li class="list-group-item">
                                    لا يوجد رسائل
                                </li>
                            @endforelse
                        </table>
                        <div class="text-center" style="margin: 0 34%;">
                            {{ $contacts->links() }}
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')

<script>


    
    window.form_data = new FormData();

    $(document).on('change','#image',function(e){

    let file_data = $('#image').prop('files')[0];
    form_data.append('file', file_data);


    });
    
    $(document).on("click", "#reply", function(e){

        e.preventDefault();

        var ed = tinyMCE.get('the_message');


        form_data.append('name', '{!! auth()->user()->user_name !!}')
        form_data.append('mobile', '{!! $settings->telephone ?? '01055445544'  !!}')
        form_data.append('email', '{!! $settings->email ?? 'a@a.com'  !!}')
        form_data.append('title', $('#title').val())
        form_data.append('body', ed.getContent())
        form_data.append('receiver_email', $('#email').val())
        form_data.append('receiver_name', $('#name').val())
       

        axios.post('../admin/contacts', form_data)
        .then((response) => {
           alert('تم الإرسال');
           window.location.reload();
            
        
            //console.log(response);
        }).catch((error) => {
            if(error.response.data.errors.message){
                $('.message-contact-error').append('<strong>'+error.response.data.errors.message+'</strong>');
                $('.message').addClass('is-invalid')
            }
        })

    });


    function changeImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('.changing-image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#image").change(function() {
        changeImage(this);
    });

</script>
    
@endsection