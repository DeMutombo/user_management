@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table id="users_table" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Last Seen</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td> - </td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->label }}
                            @endforeach
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td> - </td>
                        <td> - </td>
                        <td> 
                            {{-- <a class="btn btn-primary" href="{{ route('admin.index') }}">Edit</a> --}}
                            <a 
                                data-user_id="{{ $user->id }}" 
                                data-name="{{ $user->name }}"
                                data-role="{{ $user->role }}"
                                data-email="{{ $user->email }}"
                                data-toggle="modal" 
                                class="btn btn-primary" 
                                data-target="#editUserModal">
                                
                                Edit</a>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
      
    <!--------------------------------- EDIT USER MODAL ------------------------------------->
      <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.update') }}" method="POST">
                  @method('PUT')
                  @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <input type="hidden" id="user_id" name="user_id" value="">
                    <div class="form-group">
                      <label for="role">Role</label>
                      <select class="form-control" name="role" id="role">
                        @foreach ($roles as $role)
                          <option value="{{ $role->name }}">{{ $role->label }}</option> 
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="">
                    </div>

                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
            </div>
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#editUserModal").on('show.bs.modal', function (e) {
        var link = $(e.relatedTarget),
         name = link.data("name"),
         role = link.data("role"),
         email = link.data("email"),
         user_id = link.data("user_id"),

       modal = $(this);

        modal.find(".modal-title").text('EDIT USER ROLE');
        modal.find('.modal-body #name').val(name);
        modal.find(".modal-body #role").val(role);
        modal.find(".modal-body #email").val(email);
        modal.find(".modal-body #user_id").val(user_id);
      }); 
    });
</script>
@endsection