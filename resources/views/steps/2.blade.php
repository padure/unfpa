@extends('layouts.app')
@section('content')
    <div class="test-container">
        <div class="test-wrp">

            <form id="regForm" action="{{ route('step.set.info', 2) }}" method="post">
                @csrf
                <div class="tab-top">
                    <h2>@lang('labels.chapter_title') <span>2</span></h2>
                    <p>@lang('labels.page') <span id="currentPage">1</span> @lang('labels.of') 4</p>
                </div>
                <div class="tab-progress"><span id="progressBox" class="p1"></span></div>
                <div class="tab-text">@lang('labels.read_carefully')</div>

                <div class="tab">
                    <div class="questions-group">
                        <div class="qgroup-top">
                            <span></span>
                            <span>@lang('labels.qgroup_top.yes')</span>
                            <span>@lang('labels.qgroup_top.no')</span>
                        </div>

                        @php $steps = clone $step; @endphp
                        @forelse($steps->where('tab', 1)->get() as $key => $question)
                            <div class="qgroup-item">
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro : $question->name_ru, '-') }}">
                                    <span>{{ $key + 1 }}.</span>
                                    {{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}
                                </label>
                                @forelse($question->answers as $answer)
                                    <input type="radio"
                                           name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro : $question->name_ru, '-') }}"
                                           value="{{ $answer->id }}"
                                    >
                                @empty
                                    <h4>@lang('labels.no_answers')</h4>
                                @endforelse
                            </div>
                        @empty
                            <h3>@lang('labels.no_questions')</h3>
                        @endforelse
                    </div>
                </div>

                <div class="tab">
                    <div class="questions-group">
                        <div class="qgroup-top">
                            <span></span>
                            <span>@lang('labels.qgroup_top.yes')</span>
                            <span>@lang('labels.qgroup_top.no')</span>
                        </div>

                        @php $steps = clone $step; @endphp
                        @forelse($steps->where('tab', 2)->get() as $key => $question)
                            <div class="qgroup-item">
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}">
                                    <span>{{ $key + 1 }}.</span>
                                    {{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}
                                </label>
                                @forelse($question->answers as $answer)
                                    <input type="radio"
                                           name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                           value="{{ $answer->id }}"
                                    >
                                @empty
                                    <h4>@lang('labels.no_answers')</h4>
                                @endforelse
                            </div>
                        @empty
                            <h3>@lang('labels.no_questions')</h3>
                        @endforelse
                    </div>
                </div>


                <div class="tab">
                    <div class="questions-group">
                        <div class="qgroup-top">
                            <span></span>
                            <span>@lang('labels.qgroup_top.yes')</span>
                            <span>@lang('labels.qgroup_top.no')</span>
                        </div>

                        @php $steps = clone $step; @endphp
                        @forelse($steps->where('tab', 3)->get() as $key => $question)
                            <div class="qgroup-item">
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}">
                                    <span>{{ $key + 1 }}.</span>
                                    {{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}
                                </label>
                                @forelse($question->answers as $answer)
                                    <input type="radio"
                                           name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                           value="{{ $answer->id }}"
                                    >
                                @empty
                                    <h4>@lang('labels.no_answers')</h4>
                                @endforelse
                            </div>
                        @empty
                            <h3>@lang('labels.no_questions')</h3>
                        @endforelse
                    </div>
                </div>

                <div class="tab">
                    <div class="questions-group">
                        <div class="qgroup-top">
                            <span></span>
                            <span>@lang('labels.qgroup_top.yes')</span>
                            <span>@lang('labels.qgroup_top.no')</span>
                        </div>

                        @php $steps = clone $step; @endphp
                        @forelse($steps->where('tab', 4)->get() as $key => $question)
                            <div class="qgroup-item">
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}">
                                    <span>{{ $key + 1 }}.</span>
                                    {{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}
                                </label>
                                @forelse($question->answers as $answer)
                                    <input type="radio"
                                           name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                           value="{{ $answer->id }}"
                                    >
                                @empty
                                    <h4>@lang('labels.no_answers')</h4>
                                @endforelse
                            </div>
                        @empty
                            <h3>@lang('labels.no_questions')</h3>
                        @endforelse
                    </div>
                </div>

                <div class="qgroup-btns">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">@lang('labels.back')</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">@lang('labels.back')</button>
                </div>

            </form>


        </div>
    </div>
@endsection
@section('js')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";

            var progressBox = document.getElementById("progressBox");
            progressBox.className = 'p' + ( n + 1 );

            var currentPage = document.getElementById("currentPage");
            currentPage.innerHTML = ( n + 1 );

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "@lang('labels.send')";
            } else {
                document.getElementById("nextBtn").innerHTML = "@lang('labels.continue')";
            }
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            return true;
        }
    </script>
@endsection
