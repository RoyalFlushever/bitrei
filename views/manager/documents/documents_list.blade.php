@extends('common.dash')

@section('content')

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Documents</h2>
                    <a href="/manager/documents-add" class="btn btn-primary pull-right">Add new</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
						  <th>category_id</th>
						  <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
						<? foreach($data as $item){ ?>
                        <tr>
                          <th scope="row"><?= $item->id ?></th>
						  <td><a href="/manager/documents-edit?id=<?= $item->id ?>"><?= $item->category_id ?></a></td>
                          <td><a href="/manager/documents-edit?id=<?= $item->id ?>">Edit</a></td>
                        </tr>
						<? } ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

@endsection