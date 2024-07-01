<div id="tree" class="br-green-light-2 br-15 p-3">
    <ul class="ui-fancytree fancytree-container fancytree-plain" tabindex="0">
        @if(isset($years) and is_iterable($years))
            @foreach($years as $year)
                <li class="">
		    						<span
                                        class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    							<span class="fancytree-title" id="year_{{$year->id}}">{{$year->year}}</span>
		    						</span>
                    <ul>
                        @if(isset($year->faculties) and is_iterable($year->faculties))
                            @foreach($year->faculties as $faculty)
                                <li class="fancytree-lastsib">
		    								<span
                                                class="fancytree-node fancytree-expanded fancytree-folder fancytree-has-children fancytree-exp-e fancytree-ico-ef">
		    									<span class="fancytree-expander"></span>
		    									<span class="fancytree-title"
                                                      id="faculty_{{$faculty->id}}">{{$faculty->name}}</span>
                                            </span>
                                    <ul style="">
                                        @if(isset($faculty->departments) and is_iterable($faculty->departments))
                                            @foreach($faculty->departments as $department)
                                                <li class="fancytree-lastsib">
		    										               <span
                                                                       class="fancytree-node fancytree-lastsib fancytree-exp-nl fancytree-ico-c">
                                                                       <span class="fancytree-expander"></span>
		    											              <span class="fancytree-title"
                                                                            id="department_{{$department->id}}">{{$department->name}}</span>
		    										                </span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            @endforeach
        @endif
    </ul>
</div>
