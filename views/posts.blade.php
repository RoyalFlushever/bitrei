@extends('app')

@section('pageTitle', $category[0]->name)
@section('pageDesc', $category[0]->description)
@section('pageKeys', $category[0]->name)

@section('content')

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">
						
						<div class="breadcrumb-container">
							<div class="container">
								<ol class="breadcrumb">
									<li><a href="/"><?
														
									$website_settings_url = DB::table('website_settings')
										->where("id", "=", 5)
										->get();
									
									if(count($website_settings_url)>0){ echo $website_settings_url[0]->value;}else{echo "Главная";}
									
									?></a></li>
									<li class="active"><?= $category[0]->name ?></li>
								</ol>
							</div>
						</div>
							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?= $category[0]->name ?></h1>
							<div class="separator-2"></div>
							<p><?= $category[0]->text ?></p>
							<!-- page-title end -->

						
						<? if(isset($data) && count($data)>0){
							foreach($data as $post){
						?>
							<!-- blogpost start -->		
							<a href="/blog/<?= $post->url ?>" class="post-preview-link">
								<div class="post-preview">
									<div class="post-img-left">
										<img alt="<?= $post->name ?>" src="<?= $post->ava ?>" width="120">
									</div>
									<div class="anons-right">
										<div class="anons-title"><?= $post->name ?></div>
										<div class="anons-text"><?= $post->anons ?><span class="read-more-span"></span></div>
									</div>
									<div class="clear"></div>
								</div>
							</a>
							<!-- blogpost end -->
						<? }} ?>

						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							@include('sidebar')
						</div>
						<!-- sidebar end -->
					</div>
				</div>
				
@endsection
