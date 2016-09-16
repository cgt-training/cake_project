	<div class="container-fluid">
			
				<div class="row">
					<div class="container  dejavu-font">
							<div class="row">
						
							<nav class="navbar navbar-default site-menu col-padding">
									
									<div class="text-default text-capitalize col-lg-9 col-md-12 col-padding">
									
										<div class="logo col-lg-2 col-sm-2 col-padding">
											<?php echo $this->Html->image("logo.png",['alt'=>'']); ?>
										</div>							
										
										<div class="col-lg-10 col-sm-10 col-padding">
											<p class="h2">sri&nbsp;sukhmani institute of management</p>

										<p class="h4">&lpar;approved&nbsp;by&nbsp;<spna class="text-uppercase">A&period;I&period;C&period;T&period;E&period;</spna>&nbsp;ministry of <spna class="text-uppercase">hrd</spna>&comma; &nbsp;govt&period;&nbsp;of&nbsp;india&rpar;</p>
										</div>
									</div>

										<div class="search-bar col-lg-3 col-md-6 col-sm-12">
										<div class="input-group">
											<input type="text" name="search" class="form-control" placeholder="Search">
											<span class="input-group-btn">
												<button class="btn btn-default">
													<span class="glyphicon glyphicon-search"></span>
												</button>
											</span>
										</div>
									</div>	
								</nav>

								<div class="welocme text-capitalize text-right col-lg-3 col-md-6 col-sm-12 pull-right">
										<?php


										$user = $this->request->session()->read('Auth.User');
										if(empty($user)){
												echo  __('welcome'), " ",__('guest');
										}
										else{
											 $username = $this->request->session()->read('Auth.User.username');	
											echo __('welcome'), " ",$username;
											
										}
										?>
								</div>
							</div>

							<div class="row">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-menu">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
										<a href="">
											<!--div class="logo">
											</div-->
										</a>
								</div>
				
								<div class="navbar-collapse collapse col-padding " id="site-menu">

								
									<ul class="nav nav-tabs text-capitalize nav-justified menu">
										<li role="presentation" <?php
											echo (!empty($this->request->params['controller']) && $this->request->params['controller']=="Users" && $this->request->params['action']!="login")?'class="active"':'';

										 ?>>
											<?php
												echo $this->Html->link(__('Users'),['controller'=>'Users', 'action'=>'index']);
										?>
										</li>

										<li role="presentation" <?php
											echo (!empty($this->request->params['controller']) && $this->request->params['controller']=="Bookmarks")?'class="active"':''
										?>>
										
											<?php
												echo $this->Html->link(__('Bookmarks'),['controller'=>'Bookmarks','action'=>'index']);
										?>
										</li>
										<li role="presentation" <?php
											echo (!empty($this->request->params['controller']) && $this->request->params['controller']=="Tags")?'class="active"':'';

										 ?>>
										
											<?php
												echo $this->Html->link(__('Tags'),['controller'=>'Tags', 'action'=>'index']);
										?>
										</li>

										<li role="presentation" <?php
											echo (!empty($this->request->params['controller']) && $this->request->params['controller']=="Articles")?'class="active"':'';

										 ?>>
										
											<?php
												echo $this->Html->link(__('Articles'),['controller'=>'Articles', 'action'=>'index']);
										?>
										</li>
										<li role="presentation" <?php
											echo (!empty($this->request->params['controller']) && $this->request->params['controller']=="Sites")?'class="active"':'';

										 ?>>
										
											<?php
												echo $this->Html->link(__('Testing'),['controller'=>'Sites', 'action'=>'index']);
										?>
										</li>
										
										<!--li role="presentation"><a href="#">Development</a></li>
										<li role="presentation"><a href="#">Faculty</a></li>
										<li role="presentation"><a href="#">placement</a></li-->
										<li role="presentation"

											<?php 
												echo (!empty($this->request->params['action']) && $this->request->params['action']=="login")?'class="active"':'';
											?>
										>
										<?php


										if(empty($user)){
											echo $this->Html->link('Login',$loginRedirect);

										}

										else{
											echo $this->Html->link('Logout',$logoutRedirect);
										}

										?>
										</li>
									</ul>
								</div>
						
						</div>
					</div>
				</div>
			</div>	

<div class="container  dejavu-font">
				<!-- slider images starts-->	
		
			
			<!-- slider images starts-->			

				<!-- gfront-page-gllary starts-->
				<div class="row dejavu-font">
					<div class="col-lg-12 col-padding">
						<div class="slide">
							<div class="slide-content text-center text-default col-lg-6 col-md-7 col-sm-9 col-xs-11">
								<div class="text-uppercase h1">admission&nbsp;open - pdgm</div>
									<div class="slide-content-highlight text-uppercase h4">
										post&nbsp;graduate&nbsp;diploma&nbsp;in management
									</div>	
									
									<div class="h5">Two year full time programe</div>
									
									<div class="h4 text-capitalize strong">
										 special&nbsp;in&nbsp;finance&comma;&nbsp;marketing&nbsp;and retail&nbsp;marketing
									</div>
							</div>
						</div>
					</div>
				</div>
</div>				