@extends('layout.loginApp')
@section('title','Resistration | Laravel')
@section('content')

<div class="container">
	<div style="height: 100vh;" class="row d-flex flex-row justify-content-center align-items-center">
		<div class="col-md-5 card shadow rounded">
			<div class="card-body">
				<h1 class="text-center">Sign Up</h1><hr>
				
				<div class="form-group">
					<label>Username</label>
					<input type="text" id="username" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" id="password" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-block btn-success" id="signUp">Sign Up</button>
					<h6 class="text-center">Already Have Account  <a class="btn btn-info btn-sm" href="{{url('/')}}"> Sign in</a></h6>
				</div>			
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	$('button#signUp').click(function(){

		let name = $('#username').val();
		let password = $('#password').val();

		if (name.length == 0 || password.length == 0) {
			toastr.error('Error ! Field Must not be empty');
		}else{
			axios.post('/resister',{
			name:name,
			password:password
		}).then(function(response){

		if(response.data==1){
				toastr.success('Success ! Account Created');
				$('#username').val('');
				$('#password').val('');
		}else if(response.data==2){
				toastr.error('Error ! Username Already Exist');
		}else{
				toastr.error('Error ! Something Went Wrong');
		}
			
		}).catch(function(error){
			toastr.error('Error ! Something Went Wrong');
		});
		}		
	});	
</script>
@endsection