@extends('app')

@section('pageTitle', $data[0]->title)
@section('pageDesc', $data[0]->description)
@section('pageKeys', $data[0]->keywords)

@section('pageCanonical')<link rel="canonical" href="<? $website_settings_1 = DB::table('website_settings')
		->where("id", "=", 1)
		->get(); echo $website_settings_1[0]->value; ?>/blog/<?= $data[0]->url ?>">
@endsection

@section('content')

				<div class="container">
					<div class="row">
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
										<li><a href="/blogs/<?= $category[0]->url ?>"><?= $category[0]->name ?></a></li>
										<li class="active"><? echo $data[0]->name; ?></li>
									</ol>
								</div>
							</div>
							
							<h1 class="page-title"><? echo $data[0]->name; ?></h1>
							
							<article class="blogpost full">
								
								<div class="blogpost-content">
									
								<? echo $data[0]->text; ?>
								
								</div>
								<footer class="clearfix">
								
									<?
														
									$website_settings_8 = DB::table('website_settings')
										->where("id", "=", 8)
										->get();
									
									if(count($website_settings_8)>0){ echo $website_settings_8[0]->value;}
									
									?>
									
								</footer>
								
							<?/*	@include('credit_form') */?>
							
							</article>
							
							<div id="comments" class="comments">
							
							<h2 class="title">Популярное</h2>
							
						<? if(isset($relatedData) && count($relatedData)>0){
							foreach($relatedData as $post){
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
							
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							@include('sidebar')
						</div>
						<!-- sidebar end -->
					</div>
				</div>
				
@endsection
