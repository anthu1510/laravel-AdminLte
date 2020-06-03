@extends('layouts.dashboard')

@section('dashboard-page-title', 'Change Password')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-lg-4 offset-lg-4">
              <!-- /.login-logo -->
              <div class="card">
                  <div class="card-body login-card-body">
                      <p class="login-box-msg"></p>

                      <form id="dash-form" action="{{ URL::to('dashboard/changepassword/update') }}" method="post">
                          @csrf
                          <div class="input-group mb-3">
                              <input type="password" name="current_pass" id="current_pass" class="form-control validate[required]" placeholder="Enter Current Password">

                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-key"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="input-group mb-3">
                              <input type="password" name="new_pass" id="new_pass" class="form-control" placeholder="Enter New Password">
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-key"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="input-group mb-3">
                              <input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="Enter Confirm Password">
                              <div class="input-group-append">
                                  <div class="input-group-text">
                                      <span class="fas fa-key"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <button type="submit" class="btn btn-primary btn-block">Change</button>
                              </div>
                              <!-- /.col -->
                          </div>
                      </form>
                  </div>
                  <!-- /.login-card-body -->
              </div>
          </div>
          <!-- /.login-box -->
          </div>
      </div>
  </div>
@endsection
