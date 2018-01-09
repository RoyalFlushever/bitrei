@extends('common.dash')

@section('content')

	<div class="col-md-12 col-sm-12 col-xs-12">

        <div class="col-md-12">
			<div class="x_panel">
                 <div class="x_title">
					<h2><a href="/manager/property-list"><u>Property List</u></a> -> Details</h2>
					<div class="clearfix"></div>
				</div>
                <div class="x_content">
				
				<? if(isset($data[0])){ ?>
				<input type="hidden" name="id" value="{{ $data[0]->id }}">
				<? } ?>
				
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="name" value="<? if(isset($data[0])){?>{{ $data[0]->title }}<?}?>" placeholder="Name">
                       
                    </div>
                </div>

			</div>
			</div>
		</div>

	</div>





<? if(isset($data[0]) && isset($data[0]->id)){ ?>

			
	<a href="/manager/documents-categories-del?id=<?= $data[0]->id ?>" class="btn btn-danger waves-effect waves-light">Caution! Delete?</a>
			
			
<? } ?>
		

@endsection