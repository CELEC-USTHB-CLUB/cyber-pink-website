<div class="row" x-data="submit()">
    <div class="col col-12 align-self-center">
    	<div>
	    	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
    	</div>
        <form style="color:white !important;" enctype="multipart/form-data"  wire:submit.prevent="submit">
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Project title</h3></label>
	            <input wire:model.lazy="project_title" type="text" class="form-control submitInput" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your project title (slogan)">
	        </div>
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Team name</h3></label>
	            <input wire:model.lazy="team_name" type="text" class="form-control submitInput" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your project title (slogan)">
	        </div>
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Selected challenge</h3></label>
	            <select class="custom-select" wire:model.lazy="challenge">
				  <option value="1">1-Improving people’s healthcare quality</option>
				  <option value="2">2-Easy access tools for reporting violence</option>
				  <option value="3">3-Aiding platforms for people in need</option>
				  <option value="4">4-Improving Teacher-Parent communication in education</option>
				</select>
	        </div>
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Team members <strong>(don't forget yourself)</strong></h3></label>
	            <input autocomplete="off" x-on:input="showR=true" wire:model.debounce="search" type="text" class="form-control submitInput" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search by email">
	            <div x-show="showR" class="w-100 p-4 searchresults">
	            	<div class="row">
	            		<div wire:loading wire:target="search">
	            			<center>
	            				<h3>Loking for results ...
					        	<div wire:loading wire:target="hackers" class="spinner-border text-primary" role="status">
								  <span class="sr-only">Loading...</span>
								</div>
								</h3>
	            			</center>
					    </div>
					    @if(!is_null($hackers))
					    	@if($hackers->isEmpty())
					    		<center>
						    		<h4>This user not found 😕</h4>					    			
					    		</center>
					    	@else
						    	@foreach($hackers as $hacker)
							    	<h5 wire:key="{{$hacker->id}}">
							    		<span class="badge p-2 @if($selected->has($hacker->id.$hacker->fullname))  selceted @endif">
							    		{{$hacker->fullname}} 
							    			<i wire:click="addToSelection({{$hacker->id}}, '{{$hacker->fullname}}', '{{$hacker->email}}', '{{$hacker->image}}')" style="cursor: pointer; color:#61ad76;" class="fas fa-plus-circle"></i>
							    		</span>
							    	</h5>&nbsp;&nbsp;
							    @endforeach
					    	@endif
					    @endif
	            	</div>
	            	
	            </div>
	            <div class="mt-3">
	            	<ul class="list-group">
	            		@foreach($selected as $id => $data)
						  <li class="list-group-item mmbr mt-1" wire:key="{{$id}}">
						  	<img src="{{url('storage/app')}}/{{$data['image']}}" class="rounded float-left" height="50px;"> &nbsp; {{$data["fullname"]}}, {{$data["email"]}}.
						  	<h3 class="float-right"><i wire:click.prevent="remove('{{$id}}')" style="cursor: pointer;" class="fas  fa-times-circle"></i></h3>
						  </li>
						@endforeach
					</ul>
	            </div>
	        </div>
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Your solution is: </h3></label>
	            <br/>
	            <div class="custom-control custom-radio custom-control-inline">
				  <input x-on:click="solutionType = 1" wire:model="solution_type" value="app" type="radio" id="customRadioInline1" name="customRadioInline" class="custom-control-input">
				  <label class="custom-control-label" for="customRadioInline1">Mobile app</label></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
				  <input x-on:click="solutionType = 2" wire:model="solution_type" value="web" type="radio" id="customRadioInline2" name="customRadioInline" class="custom-control-input">
				  <label class="custom-control-label" for="customRadioInline2">Web app</label></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
				  <input x-on:click="solutionType = 3" wire:model="solution_type" value="webmobile" type="radio" id="customRadioInline3" name="customRadioInline" class="custom-control-input">
				  <label class="custom-control-label" for="customRadioInline3">(Mobile + web)</label></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
				  <input x-on:click="solutionType = 4" wire:model="solution_type" value="other" type="radio" id="customRadioInline4" name="customRadioInline" class="custom-control-input">
				  <label class="custom-control-label" for="customRadioInline4">Other</label></label>
				</div>
					<div x-show="solutionType == 1 || solutionType == 3">
						<br/>
						<label for="exampleInputEmail1"><h3>Upload your compressed APK</h3></label>
						<br/>
			            <input wire:model="apk" class="form-control" type="file" style="background-color: transparent !important; height: 50px;" id="exampleInputEmail1" aria-describedby="emailHelp">
			            <small>Allowed: zip, rar.</small>
			            <div wire:loading wire:target="apk">
				        	<strong>Uploading your apk ... </strong>
							<div class="spinner-border text-primary" role="status">
							  <span class="sr-only">Loading...</span>
							</div>
						</div>
					</div>
					<div x-show="solutionType == 2 || solutionType == 3">
						<br/>
						<label for="exampleInputEmail1"><h3>The preview link</h3></label>
			            <div wire:loading wire:target="repo_link">
				        	<strong>verifying the link... </strong>
				        	<div class="spinner-border text-primary" role="status">
							  <span class="sr-only">Loading...</span>
							</div>
						</div>
			            <input wire:model="preview_link" type="text" class="form-control submitInput" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="preview link">
			            <div class="alert alert-warning mt-2" role="alert">
			            	<strong>
			            		If no preview link is available, please write a documentation on the repository page (in github) to clarify:
			            		<ul>
			            			<li>The environment requirements to run your web app.</li>
			            			<li>How to set up and run your web app.</li>
			            		</ul>
			            	</strong>
						</div>
						<br/>
					</div>
					<div x-show="solutionType == 4">
						<div class="alert alert-warning mt-2" role="alert">
			            	<strong>
			            		Please write a documentation on the repository (in github) to clarify how to setup and run your software.
			            	</strong>
						</div>
					</div>
	        </div>
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Description <a x-on:click.prevent="" data-toggle="popover" data-content="minimum length allowed is 150 characters"><i class="fa fa-info-circle"></i></a></h3></label>
	            <br/>
	            <textarea wire:model.defer="description" class="w-100" style="background-color: transparent !important; color:white !important; border: 3px solid #2b369e !important;"></textarea>
	        </div>
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Video link (http://www.)</h3></label>
	            <div wire:loading wire:target="video_link">
		        	<strong>verifying the link... </strong>
		        	<div class="spinner-border text-primary" role="status">
					  <span class="sr-only">Loading...</span>
					</div>
				</div>
	            <input wire:model="video_link" type="text" class="form-control submitInput" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="video link">
	        </div>
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>The repository link (github) (http://www.)</h3></label>
	            <div wire:loading wire:target="repo_link">
		        	<strong>verifying the link... </strong>
		        	<div class="spinner-border text-primary" role="status">
					  <span class="sr-only">Loading...</span>
					</div>
				</div>
	            <input wire:model="repo_link" type="text" class="form-control submitInput" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="repository link">
	        </div>
	        
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Images</h3></label>
	            <input wire:model="images" multiple="true" class="form-control" type="file" style="background-color: transparent !important; height: 50px;" id="exampleInputEmail1" aria-describedby="emailHelp">
	            <small>Allowed: jpg, png, jpeg.</small>
	            <div wire:loading wire:target="images">
		        	<strong>Uploading the images ... </strong>
		        	<div class="spinner-border text-primary" role="status">
					  <span class="sr-only">Loading...</span>
					</div>
				</div>
	        </div>
	        <div class="form-group">
	            <label for="exampleInputEmail1"><h3>Attached documents</h3></label>
	            <input wire:model="document" class="form-control" type="file" style="background-color: transparent !important; height: 50px;" id="exampleInputEmail1" aria-describedby="emailHelp">
	            <small>Allowed: pdf, docx.</small>
	            <div wire:loading wire:target="document">
		        	<strong>Uploading your document ... </strong>
					<div class="spinner-border text-primary" role="status">
					  <span class="sr-only">Loading...</span>
					</div>
				</div>
	        </div>
	        
        	<button type="submit" class="btn btn-primary" wire:loading.remove>Submit</button>
        	<div wire:loading wire:target="submit">
		        	<strong>submitting your data ... </strong>
					<div class="spinner-border text-primary" role="status">
					  <span class="sr-only">Loading...</span>
					</div>
				</div>
    	</form>
    	<div>
    		@if ($errors->any())
			    <div class="alert alert-danger mt-2">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	        @if (session()->has('saved'))
	            <div class="alert alert-success mt-2">
	                {!! session('saved') !!}
	            </div>
	        @endif
    	</div>
	</div>
</div>
@push("scripts")
	<script type="text/javascript">
		function submit() {
			return {
				showR: @entangle("showR"),
				solutionType: null,
			}
		} 
		$(document).ready(function(){
		  $('[data-toggle="popover"]').popover();
		});
	</script>
@endpush