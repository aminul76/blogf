@extends('backend.master') {{-- Assuming you have a layout file --}}

@section('content')
<div class="checkout-form personal-address add-course-info ">
    <div class="personal-info-head">
    <h4>Change Password</h4>
    
    </div>
    <form action="{{ route('change.password.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
    <div class="row">
        
    <div class="col-lg-12">
    <div class="form-group">
    <label class="form-control-label">Current Password</label>
    <input type="text" class="form-control" placeholder="Enter your Current Password" name="current_password"  required>
    </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label class="form-control-label">New Password</label>
    <input type="text" class="form-control" placeholder="Enter your New Password Number" name="new_password">
    </div>
    </div>
    <div class="col-lg-12">
    <div class="form-group">
    <label class="form-control-label">Confirm Password</label>
    <input type="text" class="form-control" placeholder="Enter your Confirm Password" name="new_confirm_password">
    </div>
    </div>
   


    
 

  
  
    <div class="update-profile">
    <button type="submit" class="btn btn-primary">Update Profile</button>
    </div>
    </div>
    </form>
    </div>

@endsection