<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account.index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        <!-- Trigger the modal with a button -->
        <div class="row">
            <button type="button" class="btn btn-info mx-auto" data-toggle="modal" data-target="#myModal">新增帳號</button>
            <!-- Create Modal -->
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
            <!-- Create Model end -->
        </div>
        <!-- Trigger the modal with a button end -->

        <!-- Account of list -->
        <table class="table table-striped my-3">
            <thead>
                <tr>
                    <th>account</th>
                    <th>name</th>
                    <th>gender</th>
                    <th>birthday</th>
                    <th>email</th>
                    <th>remark</th>
                    <th>operate</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accounts as $account)
                <tr>
                    <td>{{ $account->account}}</td>
                    <td>{{ $account->name}}</td>
                    <td>
                        @if($account->gender == 0)
                        Woman
                        @else
                        Man
                        @endif
                    </td>
                    <td>{{ $account->birthday}}</td>
                    <td>{{ $account->email}}</td>
                    <td>{{ $account->remark}}</td>
                    <td>
                        <button type="button" class="btn btn-info mx-auto" data-toggle="modal" data-target="#editModal{{$account->id}}">編輯</button>
                        <button class="btn btn-danger mx-auto del" data-id="{{$account->id}}" data-account="{{$account->account}}">刪除</button>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{$account->id}}" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">編輯帳號</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('accounts.update',$account->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="row my-2">
                                        <label for="account" class="col-4 col-form-label "><i class="fas fa-file-signature">Account</i></label>
                                        <p class="form-control col-6 border-info" id="account" name="account">{{ $account->account}}</p>
                                    </div>
                                    <div class="row my-2">
                                        <label for="name" class="col-4 col-form-label"><i class="fas fa-mobile-alt">Name</i></label>
                                        <input type="text" class="form-control border-info col-6" id="name" name="name" required value="{{ $account->name}}">
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
                                        <input type="date" class="date col-6" id="birthday" name="birthday" required value="{{ $account->birthday}}">
                                    </div>
                                    <div class="row my-2">
                                        <label for="email" class="col-4"><i class="fas fa-at ">Email</i></label>
                                        <p class="form-control col-6 border-info" id="email" name="email">{{ $account->email}}</p>
                                    </div>
                                    <div class="row my-2">
                                        <label for="remark" class="col-4"><i class="fas fa-clipboard">Remark</i></label>
                                        <textarea class="form-control ml-3 border-info col-6" id="remark" rows="5" name="remark" required>{{ $account->remark}}</textarea>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-info shadow p-2 mb-5 rounded"><i class="fas fa-paper-plane">Submit</i></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Edit Model end -->
                @endforeach
            </tbody>
        </table>
        <!-- Account of list  end-->
    </div>
    <script>
        $('.del').click(function() {
            let id = $(this).data('id');
            let account = $(this).data('account');
            let msg = `確定要刪除帳號:' ${account} '嗎?`;

            if (confirm(msg) == true) {
                $.ajax({
                    type: 'DELETE',
                    url: "accounts/" + id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                    },
                    success: function(){
                        window.location.reload()
                    }
                })
            } else {
                return false;
            }
        });
    </script>
</body>

</html>