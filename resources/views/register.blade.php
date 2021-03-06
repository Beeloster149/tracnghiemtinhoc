@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center">Đăng ký thành viên</h2>
        <div class="registerWrapper">
            @if(count($errors) || session('registerSubmitMessage'))
                <div class="alert alert-danger">
                    Thông tin đăng ký sai:
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        @if(session('registerSubmitMessage'))
                            <li>{{session('registerSubmitMessage')}}</li>
                        @endif
                    </ul>
                </div>
            @endif
            {!! Form::open(['url' => 'register', 'id' => 'registerForm']) !!}
            <div class="form-group row">
                {!! Form::label('Email','Địa chỉ Email:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::email('Email','',['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('Password','Mật khẩu:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::password('Password',['id' => 'Password', 'class' => 'form-control','required' => 'true']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('PasswordConfirmation','Xác nhận mật khẩu:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::password('PasswordConfirmation',['class' => 'form-control','required' => 'true']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('LastName','Họ:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('LastName','',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('FirstName','Tên:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('FirstName','',['class' => 'form-control', 'required' => 'true']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('Gender','Giới tính:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('Gender', ['1' => 'Nam', '2' => 'Nữ', '3' => 'Không xác định'],'3',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('WorkPlace','Nơi làm việc/học tập:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('WorkPlace','',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('PhoneNumber','Số điện thoại:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('PhoneNumber','',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('Address','Địa chỉ:',['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('Address','',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    {!! Form::submit('ĐĂNG KÝ NGAY!',['class' => 'btn btn-success form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript">
        $('#registerForm').validate({
            rules: {
                Email: {
                    required: true,
                    email: true,
                    minlength: 8,
                },
                Password: {
                    required: true,
                    minlength: 5
                },
                PasswordConfirmation: {
                    required: true,
                    equalTo: "#Password"
                },
                FirstName: {
                    required: true,
                }
            },
            messages: {
                Email: {
                    required: "Vui lòng nhập địa chỉ Email",
                    email: "Hãy nhập một địa chỉ email hợp lệ",
                    minlength: "Email có ít nhất 8 ký tự",
                    remote: "Email đã tồn tại"
                },
                Password: {
                    required: "Vui lòng nhập mật khẩu!",
                    minlength: "Mật khẩu có ít nhất 5 ký tự"
                },
                PasswordConfirmation: {
                    required: "Vui lòng nhập mật khẩu xác nhận!",
                    equalTo: "Mật khẩu xác nhận không trùng khớp"
                },
                FirstName: {
                    required: "Vui lòng nhập tên của bạn!"
                }
            }
        })
    </script>
@endsection