@extends('layouts/master')
@push('side-menu')

@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".btn-submit").click(function (e) {

                e.preventDefault();
                try{
                    var name = $("input[name=name]").val();
                    var password = $("input[name=password]").val();
                    var email = $("input[name=email]").val();
                    //console.log(email);
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        //contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                        url: 'ajaxRequestPost',
                        data: {name: name, password: password, email: email},
                        success: function (data) {
                            console.log(data);
                            $("#theName").text(data.email);
                            console.log(data.name);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }catch (error){
                    console.log(error.message);
                }

            });
        });
    </script>
@endpush

@push('css')

@endpush
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Ajax</h1>

        <ul>
            <li id="theName"></li>
        </ul>
        <form>

            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required="">
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>

            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>

        </form>



    </div>
@endsection