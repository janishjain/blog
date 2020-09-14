<aside class="leftbar my-2 mr-1 ml-2 p-4">
	<div class="sidebar settings">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<img src="<?php echo site_url('/avatar/'.$_SESSION['avatar']);?>" class="card-img-top rounded" alt="">
			</li>
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
		<a id="notifications" href="<?php echo site_url('people/');?>" style="text-decoration:none;">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">People</li>
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
