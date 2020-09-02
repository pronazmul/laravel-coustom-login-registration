@extends('layout.app')
@section('content')

	{{-- Dashboard component --}}
	<div class="content">
		<div class="row p-4 mt-5">
			<div class="col-md-6">
				<div class="card shadow">
					<div class="card-header">
						<h2 class="card-title text-center">Upload File</h2>
					</div>
					<div class="card-body">
							<div class="form-group">
								<label>Upload File</label>
								<input class="form-control" type="file" id="image">
							</div>
							<div class="form-group">
								<button id="upload" class="btn btn-block btn-success">Upload</button>
							</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card shadow">
					<div class="card-header">
						<h2 class="card-title text-center">Mannage File</h2>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Serial</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="tableBody">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){

	$('#upload').click(function(){

		let image = $('#image').prop('files')[0];
		let name = image.name;
		let size =(image.size/(1024*1024)).toFixed(1);
		let ext = name.split('.').pop().toLowerCase();

			if (1 < size) {
				toastr.error('Error! File Size is more Then 2 MB');
				}else if(ext == 'jpg' || ext =='png'){
				//Sent Data to controller Using Axios.

					let userName = 'Nazmul Huda';
					let	url ="/fileInsert";
					let	data = new FormData();
					
					// data.append('user',userName);
					data.append('fileKey',image);

					let config = {headers:{'content-type':'multipart/form-data'}};
					axios.post(url, data, config).then(function(response){

						if(response.status==200){

							toastr.success('Success! File inserted');
							
						}

					}).then(function(error){
					toastr.error('Error! Unsupported File Format');
					});

				}else{
					toastr.error('Error! Unsupported File Format');
			}
	});

retriveFile();
function retriveFile(){

		axios.get('/retriveFile').then(function(response){
			if (response.status ==200 ) {
				
				let JsonData = response.data;
				let j = 1;

				$.each(JsonData, function(i){
					$("<tr>").html(
						"<td>"+ j++ +"</td>"+
						"<td><img src=storage/app/"+JsonData[i].filepath+"></td>"+				
						"<td><button class='btn btn-danger'>Delete</button></td>"
						).appendTo('#tableBody');
				});

			}
		}).catch(function(error){

		});

}

});

</script>
@endsection
