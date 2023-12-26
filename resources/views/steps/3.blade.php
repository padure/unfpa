@extends('layouts.app')
@section('content')
    <div class="test1-container">
        <div class="test1-instruction">
            <p>
                @lang('labels.test_instruction')
            </p>
        </div>
        <div class="test-wrp">

            <form id="modulOne" action="{{ route('step.set.info', 3) }}" method="post">
                @csrf
                @php $steps = clone $step; @endphp
                @forelse($steps->get() as $key => $question)
                    <div class="tab">
                        <div class="tab-top">
                            <h2>@lang('labels.chapter_title') <span>3</span></h2>
                            <p>@lang('labels.page') {{ $key + 1 }} @lang('labels.of') 5</p>
                        </div>
                        <div class="tab-progress"><span class="p{{ $key + 1 }}"></span></div>
                        <div class="tab-text">{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>

                        @forelse($question->answers as $answer)
                            <div class="answ-row">
                                <input
                                    type="radio"
                                    name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                    id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru.$answer->id, '-') }}"
                                    value="{{ $answer->id }}"
                                >
                                <label
                                    for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru.$answer->id, '-') }}"
                                >
                                    {{ $answer->name }}
                                </label>
                            </div>
                        @empty
                            <h4>@lang('labels.no_answers')</h4>
                        @endforelse
                    </div>
                @empty
                    <h3>@lang('labels.no_questions')</h3>
                @endforelse

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
                document.getElementById("modulOne").submit();
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
