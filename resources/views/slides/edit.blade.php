@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Logo&nbsp;&nbsp;
                    <a href="{{url('/admin/slide')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif

                    <form 
                    	action="{{url('/admin/slide/update')}}" 
                    	class="form-horizontal" 
                    	method="post"
                    	enctype="multipart/form-data"  
                    >
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$slide->id}}">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-2 col-sm-2">
                            	Description <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" autofocus name="name" id="name" required class="form-control" value="{{$slide->name}}">
                            </div>
                            
                               
                         
                        </div>
                        <div class="form-group row">
                            <label for="category" class="control-label col-lg-2 col-sm-2">
                            	Category
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <select name="category" class="form-control" id="category">
                                    <option value="Khmer" {{$slide->category=='Khmer'?'selected':''}}>Khmer</option>
                                    <option value="English" {{$slide->category=='English'?'selected':''}}>English</option>
                                    <option value="French" {{$slide->category=='French'?'selected':''}}>French</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="control-label col-lg-2 col-sm-2">
                            	URL 
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="url" id="url" value="{{$slide->url}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="order" class="control-label col-lg-2 col-sm-2">
                            	Order 
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="number" name="order" value="{{$slide->order}}" id="order" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="control-label required col-lg-2 col-sm-2">Image  <span class="text-danger">( 750 x 500 )</span><span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="file" name="photo" id="photo" accept="image/*" onchange="loadFile(event)">
                                <img src="{{URL::asset('uploads/slides/').'/'.$slide->photo}}" width="150" id="img"/>
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save Change</button>
                                <button class="btn btn-danger" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection