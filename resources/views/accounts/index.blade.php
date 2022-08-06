<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account.index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container text-center">
        <h2>帳號表列</h2>
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif()
        <div class="row">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info mx-auto" data-toggle="modal" data-target="#myModal">新增帳號</button>
            <!-- Modal 1 -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">新增帳號</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('accounts.store') }}" method="post">
                                @csrf
                                <div class="row my-2">
                                    <label for="account" class="col-4 col-form-label "><i class="fas fa-file-signature">Account</i></label>
                                    <input type="text" class="form-control col-6 border-info" id="account" name="account" required value="{{ old('account') }}">
                                </div>
                                <div class="row my-2">
                                    <label for="name" class="col-4 col-form-label"><i class="fas fa-mobile-alt">Name</i></label>
                                    <input type="text" class="form-control border-info col-6" id="name" name="name" required value="{{ old('name') }}">
                                </div>
                                <div class="row my-2">
                                    <legend class="col-form-label col-4"><i class="fas fa-mars-stroke">Gender</i></legend>
                                    <div class="form-check">
                                        <div>
                                            <input class="form-check-input" type="radio" name="gender" id="man" value="1">
                                            <label class="form-check-label" for="man">Man</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="radio" name="gender" id="woman" value="0">
                                            <label class="form-check-label" for="Woman">Woman</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <label for="birthday" class="col-4 col-form-label"><i class="fas fa-birthday-cake">Birthday</i></label>
                                    <input type="date" class="date col-6" id="birthday" name="birthday" required value="{{ old('birthday') }}">
                                </div>
                                <div class="row my-2">
                                    <label for="email" class="col-4"><i class="fas fa-at ">Email</i></label>
                                    <input type="email" class="form-control col-6 border-info" id="email" name="email" placeholder="xxx@email.com" required value="{{ old('email') }}">
                                </div>
                                <div class="row my-2">
                                    <label for="remark" class="col-4"><i class="fas fa-clipboard">Remark</i></label>
                                    <textarea class="form-control ml-3 border-info col-6" id="remark" rows="5" name="remark">{{ old('remark') }}</textarea>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-info shadow p-2 mb-5 rounded"><i class="fas fa-paper-plane">Submit</i></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Model 1 end -->
        </div>
    </div>
</body>

</html>