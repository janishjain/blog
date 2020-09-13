<div class="wrapper">
	<div style="display: flex; height:100%">
		<aside class="leftbar my-2 mr-1 ml-2 p-4">
			<div class="sidebar settings">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"></li>
				</ul>
				<a href="<?php echo site_url('dashboard/');?>" style="text-decoration:none;">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Home</li>
					</ul>
				</a>
				<a id="notifications" href="#" style="text-decoration:none;">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Notifications</li>
					</ul>
				</a>
				<a href="<?php echo site_url('logout/');?>" style="text-decoration:none;">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Logout</li>
					</ul>
				</a>
			</div>
			<div class="sidebar notification" style="display:none;">
				<a id="back" href="#" style="text-decoration:none;">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><i class="fas fa-long-arrow-alt-left fa-2x"></i></li>
					</ul>
				</a>
			</div>
		</aside>
		<main class="feed-wrapper my-2 ml-1 mr-2 p-4">
			<header class="feed-header">
				<a href = "<?php echo site_url('dashboard/');?>"><i class="fas fa-long-arrow-alt-left fa-2x"></i></a>
				<font size="+3"> &nbsp Feed </font>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpost" style="float: right"><i class="far fa-plus-square"></i> Add New Post</button>
			</header><hr style="color:black;"></hr>
			<div class="jumbotron py-3">
			<h4 class="display-8">Hello, world!</h4>
			<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
			<hr class="my-3">
			<a class="btn btn-primary btn-lg btn-block" href="#" role="button">View</a>
			</div>
		</main>
	</div>

	<!-- MODAL ADD POST -->
	<div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form>
			<div class="form-group">
				<label for="title" class="col-form-label">Title</label>
				<input type="text" class="form-control" id="title">
			</div>
			<div class="form-group">
				<label for="content" class="col-form-label">Content</label>
				<textarea class="form-control" id="content"></textarea>
			</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			<button type="button" id="post" onclick="post()" class="btn btn-primary">Post</button>
		</div>
		</div>
	</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#notifications").click(function(){
		$(".settings").css('display', 'none');
		$(".notification").css('display', 'block');
		});
	$("#back").click(function(){
		$(".settings").css('display', 'block');
		$(".notification").css('display', 'none');
		});
	});
</script>
