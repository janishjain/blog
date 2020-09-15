<?php if ($total_pages > 1) {?>
<nav aria-label="Page navigation example">
	<ul class="pagination justify-content-end">
		<?php for($i = 1; $i<=$total_pages; $i++) { ?>
			<?php $disabled = ($i == $page) ? 'disabled' : '';?>
			<li class="page-item <?= $disabled?>">
			<a class="page-link dashboard-pagination" id="<?php echo $i?>" href="#"><?=$i;?></a>
			</li>
		<?php } ?>
	</ul>
</nav>

<script type="text/javascript">
$(document).ready(function(){
	$('.dashboard-pagination').click(function(e)
	{
		e.preventDefault();
		var base_url = '<?php echo site_url('posts/');?>';
		var curr_page = <?php echo $page;?>;
		var keyword = '<?php echo $keyword;?>';
		var page = this.id;

		$.ajax({
			url:'<?php echo base_url('dashboard/pagination')?>',
			type:'POST',
			data:{page: page,
			keyword:keyword},
			dataType:'JSON',
			success:function(result)
			{
				var html = "";
				$.each(result, function(k, v)
				{
					html += "<div class='jumbotron py-3'><b><p> "+v.username+"</p><b><h4 class='display-8'>";
					html += v.title+"</h4><p class='lead' style='width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;'>";
					html += v.content+"</p><hr class='my-3'><a class='btn btn-primary btn-lg' ";
					html += "href='"+base_url+v.postid+"' role='button'>View</a>";
					html += "<div class='btn-group btn-group-lg mb-4' role='group' aria-label='Basic example' style='float:right'>";
					html += "<div class='btn btn-danger'>"+v.likes+"&nbsp&nbsp<i class='fas fa-heart'></i></div>";
					html += "<div class='btn btn-dark'>"+v.dislikes+"&nbsp&nbsp<i class='fas fa-heart-broken'></i></div>";
					html += "<div class='btn btn-primary'>"+v.comments+"&nbsp&nbsp<i class='fas fa-comment'></i></div>";
					html += "</div></div>";
				})

				$(".feed-card").html(html);
				$("li.disabled").removeClass('disabled');
				$("#"+page).parent().addClass('disabled');
			}
		});
	});
});
</script>
<?php } ?>
