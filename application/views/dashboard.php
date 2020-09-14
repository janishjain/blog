<div class="wrapper">
	<div style="display: flex; height:100%">
		<?php $this->load->view('sidebar');?>
		<main class="feed-wrapper my-2 ml-1 mr-2 p-4">
			<header class="feed-header"><font size="+3">Feed</font>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#post_modal" style="float: right"><i class="far fa-plus-square"></i> Add New Post</button>
			</header><hr style="color:black;"></hr>

			<!-- alerts -->
			<div class="alert alert-success alert-dismissible fade show" id="post_success" style="display:none;" role="alert">
				<strong>Success</strong> Your feed will be updated shortly!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- alerts -->

			<!-- POST -->
			<?php if (!empty($posts)){?>
			<?php foreach ($posts as $value) {?>
				<div class="jumbotron py-3">
				<h4 class="display-8"><?php echo $value['title'];?></h4>
				<p class="lead" style="width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;"><?php echo $value['content'];?></p>
				<hr class="my-3">
				<a class="btn btn-primary btn-lg" href="<?php echo site_url('posts/'.$value['postid']);?>" role="button">View</a>
				<div class="btn-group btn-group-lg mb-4" role="group" aria-label="Basic example" style="float:right">
					<button type="button" class="btn btn-danger" data-tooltip="tooltip" data-placement="top" title="Like">
						<?php echo $value['likes']; ?>&nbsp&nbsp<i class="fas fa-heart"></i>
					</button>
					<button type="button" class="btn btn-dark" data-tooltip="tooltip" data-placement="top" title="Dislike">
						<?php echo $value['dislikes']; ?>&nbsp&nbsp<i class="fas fa-heart-broken"></i>
					</button>
					<button type="button" class="btn btn-primary" data-tooltip="tooltip" data-placement="top" title="Comment">
						<?php echo $value['comments']; ?>&nbsp&nbsp<i class="fas fa-comment"></i>
					</button>
				</div>
				</div>
			<?php } ?>
			<?php } ?>
		</main>
	</div>

	<!-- MODAL ADD POST -->
	<div class="modal fade" id="post_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<label for="recipient-name" class="col-form-label">Title</label>
					<input type="text" class="form-control" id="title">
				</div>
				<div class="form-group">
					<label for="message-text" class="col-form-label">Content</label>
					<textarea class="form-control" id="content"></textarea>
				</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" id="addpost" class="btn btn-primary">Post</button>
			</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#notifications").click(function()
	{
		$(".settings").css('display', 'none');
		$(".notification").css('display', 'block');
	});

	$("#back").click(function()
	{
		$(".settings").css('display', 'block');
		$(".notification").css('display', 'none');
	});

	$(function () {
		$('[data-tooltip="tooltip"]').tooltip()
		});

	$('#addpost').click(function(e)
	{
		e.preventDefault();
		var title = $('#title').val();
		var content = $('#content').val();
		$.ajax({
			url:'<?php echo base_url('posts/add')?>',
			type:'POST',
			data:{title: title,
			content:content},
			dataType:'JSON',
			success:function(result)
			{
				console.log(result+1);
				if(result)
				{
					$("#post_modal").modal("hide");
					$("#post_success").css('display', 'block');
					$('#post_success').alert();
					setTimeout(function(){
						$("#post_success").css('display', 'none');
						$('#post_success').alert('dispose');
					}, 3000 );
				}
			}
		});
	});
});

	
</script>
