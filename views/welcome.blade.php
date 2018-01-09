@extends('app')

@section('pageTitle', $website_settings_index_headers->pageTitle)
@section('pageDesc', $website_settings_index_headers->pageDesc)
@section('pageKeys', $website_settings_index_headers->pageKeys)

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
									
								</ol>
							</div>
						</div>
							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?
														
									$website_settings_11 = DB::table('website_settings')
										->where("id", "=", 11)
										->get();
									
									if(count($website_settings_11)>0){ echo $website_settings_11[0]->value;}else{echo "Главная";}
									
									?></h1>
							<div class="separator-2"></div>
							<p><?= $website_settings_index_headers->indexTopText ?></p>
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

<?/*
<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top:30px;">
<div class="container">

<h2 class="text-center">ЛИДЕРЫ РЫНКА МИКРО КРЕДИТОВАНИЯ</h2>


</div>
</div>
*/?>
		
<div class="clearfix"></div>

@endsection