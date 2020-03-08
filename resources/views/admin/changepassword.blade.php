@extends('admin.master')


@section('content')
    
    

    <div class="content dashboard">
       <div class="container">
          <div class="row">
             <div class="col-xs-12">
                <div class="page-title-box">
                   <h4 class="page-title">Change Password </h4>
                   <div class="clearfix"></div>
                </div>
             </div>
          </div>
       </div>
    </div>


<div class="row">
  <div class="col-sm-12">
      
      
      <div class="card-box table-responsive">
          
          <div class="clearfix"></div>
          <hr>

          

          
          <div class="col-md-6">
            @if (session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
          @endif   
           @if ($errors->any())
              <div class="alert alert-danger">
                  <ul style="    margin: 0;">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
          </div>
          @endif
            <div class="card">

                <div class="card-body">
                    
                        <form method="post" class="form-horizontal" action="{{ route('admin.changepasswordsubmit') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="new-password" class="col-md-4 control-label">Current Password</label>
                                <div class="col-md-6">
                                    <input id="currentPassword" type="password" class="form-control" name="currentPassword">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="new-password" class="col-md-4 control-label">New Password</label>
                                <div class="col-md-6">
                                    <input id="newPassword" type="password" class="form-control" name="newPassword">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                                <div class="col-md-6">
                                    <input id="newPassword_confirmation" type="password" class="form-control" name="newPassword_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new-password-confirm" class="col-md-4 control-label">&nbsp;</label>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
            
        </div>


      </div>
  </div>
</div>






@endsection

@section('js')

@endsection