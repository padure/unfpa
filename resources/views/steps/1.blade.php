@extends('layouts.app')
@section('content')
    <div class="test0-container">
        <div class="test1-instruction">
            <p>
                <span>@lang('labels.instructions.text')</span> @lang('labels.instructions.content')
            </p>
        </div>
        <div class="test-wrp">

            <form id="modulOne" action="{{ route('step.set.info', 1) }}" method="post">
                @csrf

                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter_title') <span>1</span></h2>
                        <p>@lang('labels.page') 1 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p1"></span></div>
                    <div class="tab-text">
                        @lang('labels.select_correct_term')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span> - @lang('labels.option_a')</li>
                                <li class="select-item"><span>B</span> - @lang('labels.option_b')</li>
                                <li class="select-item"><span>C</span> - @lang('labels.option_c')</li>
                            </ul>
                            <ul class="select-items">
                                <li class="select-item"><span>D</span> - @lang('labels.option_d')</li>
                                <li class="select-item"><span>E</span> - @lang('labels.option_e')</li>
                            </ul>
                        </div>
                    </div>
                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 1)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse

                </div>


                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 2 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p1"></span></div>
                    <div class="tab-text">
                        @lang('labels.chapter.content')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.chapter.options.girls')</li>
                                <li class="select-item"><span>B</span>@lang('labels.chapter.options.both')</li>
                                <li class="select-item"><span>C</span>@lang('labels.chapter.options.boys')</li>
                            </ul>
                        </div>
                    </div>

                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 2)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse
                </div>

                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 3 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p2"></span></div>
                    <div class="tab-text">
                        @lang('labels.hygiene.text')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.hygiene.options.body')</li>
                                <li class="select-item"><span>B</span>@lang('labels.hygiene.options.clothes')</li>
                                <li class="select-item"><span>C</span>@lang('labels.hygiene.options.footwear')</li>
                            </ul>
                            <ul class="select-items">
                                <li class="select-item"><span>D</span>@lang('labels.hygiene.options.sleep')</li>
                                <li class="select-item"><span>E</span>@lang('labels.hygiene.options.home')</li>
                            </ul>
                        </div>
                    </div>

                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 3)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse
                </div>

                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 4 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p2"></span></div>
                    <div class="tab-text">
                        @lang('labels.relationship_decision.text')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.relationship_decision.options.studies')</li>
                                <li class="select-item"><span>B</span>@lang('labels.relationship_decision.options.health')</li>
                                <li class="select-item"><span>C</span>@lang('labels.relationship_decision.options.image')</li>
                            </ul>
                            <ul class="select-items">
                                <li class="select-item"><span>D</span>@lang('labels.relationship_decision.options.family')</li>
                                <li class="select-item"><span>E</span>@lang('labels.relationship_decision.options.love')</li>
                            </ul>
                        </div>
                    </div>


                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 4)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse
                </div>


                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 5 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p3"></span></div>
                    <div class="tab-text">
                        @lang('labels.contraception_health_issues.text')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.contraception_health_issues.options.std')</li>
                                <li class="select-item"><span>B</span>@lang('labels.contraception_health_issues.options.unplanned_pregnancy')</li>
                                <li class="select-item"><span>C</span>@lang('labels.contraception_health_issues.options.unplanned_pregnancy_and_its')</li>
                                <li class="select-item"><span>D</span>@lang('labels.contraception_health_issues.options.not_safe')</li>
                            </ul>
                        </div>
                    </div>

                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 5)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse
                </div>
                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 6 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p3"></span></div>
                    <div class="tab-text">
                        @lang('labels.hiv_infection_risk.text')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.hiv_infection_risk.options.high')</li>
                                <li class="select-item"><span>B</span>@lang('labels.hiv_infection_risk.options.medium')</li>
                                <li class="select-item"><span>C</span>@lang('labels.hiv_infection_risk.options.no_risk')</li>
                            </ul>
                        </div>
                    </div>

                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 6)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse
                </div>

                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 7 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p4"></span></div>
                    <div class="tab-text">
                        @lang('labels.violence_type.text')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.violence_type.options.physical')</li>
                                <li class="select-item"><span>B</span>@lang('labels.violence_type.options.emotional_psychological')</li>
                            </ul>
                            <ul class="select-items">
                                <li class="select-item"><span>C</span>@lang('labels.violence_type.options.economic')</li>
                                <li class="select-item"><span>D</span>@lang('labels.violence_type.options.sexual')</li>
                            </ul>
                        </div>
                    </div>

                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 7)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse
                </div>

                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 8 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p4"></span></div>
                    <div class="tab-text">
                        @lang('labels.sexual_abuse_actions.text')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.sexual_abuse_actions.options.prevention')</li>
                                <li class="select-item"><span>B</span>@lang('labels.sexual_abuse_actions.options.after_occurrence')</li>
                            </ul>
                        </div>
                    </div>

                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 8)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse
                </div>


                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 9 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p5"></span></div>
                    <div class="tab-text">
                        @lang('labels.specialists_help.text')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.specialists_help.options.police_inspectorate')</li>
                                <li class="select-item"><span>B</span>@lang('labels.specialists_help.options.youth_health_center')</li>
                                <li class="select-item"><span>C</span>@lang('labels.specialists_help.options.social_assistance')</li>
                                <li class="select-item"><span>D</span>@lang('labels.specialists_help.options.youth_center')</li>
                            </ul>
                        </div>
                    </div>

                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 9)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse
                </div>
                <div class="tab">

                    <div class="tab-top">
                        <h2>@lang('labels.chapter.text') <span>1</span></h2>
                        <p>@lang('labels.page') 10 @lang('labels.of') 10</p>
                    </div>
                    <div class="tab-progress"><span class="p5"></span></div>
                    <div class="tab-text">
                        @lang('labels.life_aspects.text')
                        <div class="select-list">
                            <ul class="select-items">
                                <li class="select-item"><span>A</span>@lang('labels.life_aspects.options.identity')</li>
                                <li class="select-item"><span>B</span>@lang('labels.life_aspects.options.career')</li>
                                <li class="select-item"><span>C</span>@lang('labels.life_aspects.options.health')</li>
                                <li class="select-item"><span>D</span>@lang('labels.life_aspects.options.family')</li>
                            </ul>
                            <ul class="select-items">
                                <li class="select-item"><span>E</span>@lang('labels.life_aspects.options.image_reputation')</li>
                                <li class="select-item"><span>F</span>@lang('labels.life_aspects.options.wealth_wellbeing')</li>
                                <li class="select-item"><span>G</span>@lang('labels.life_aspects.options.self_development')</li>
                                <li class="select-item"><span>H</span>@lang('labels.life_aspects.options.friends')</li>
                            </ul>
                        </div>
                    </div>

                    @php $steps = clone $step; @endphp
                    @forelse($steps->where('tab', 10)->get() as $key => $question)
                        <div class="mod-row">
                            <div class="mod-row-qst" ><span>{{ $key + 1 }}.</span>{{ session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru }}</div>
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       name="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-') }}"
                                       id="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}"
                                       value="{{ $answer->id }}"
                                       required>
                                <label for="{{ \Illuminate\Support\Str::slug(session()->get('locale') == 'ro' ? $question->name_ro:$question->name_ru, '-').$answer->id }}">
                                    {{ $answer->letter }}
                                </label>
                            @empty
                                <h4>@lang('labels.no_answers')</h4>
                            @endforelse
                        </div>
                    @empty
                        <h3>@lang('labels.no_questions')</h3>
                    @endforelse

                </div>

                <div class="qgroup-btns">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">@lang('labels.back')</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">@lang('labels.next')</button>
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
            $(x[n]).addClass('active_tab');
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerText = "@lang('labels.send')";
            } else {
                document.getElementById("nextBtn").innerText = "@lang('labels.continue')";
            }
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            $(x[currentTab]).removeClass('active_tab');
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

        let ticking = false;

        window.addEventListener('scroll', function(e) {
          if ($('.tab.active_tab') && !ticking) {
            window.requestAnimationFrame(function() {
            if (window.scrollY > $('.tab.active_tab').position()['top'] + 50){
                $('.tab.active_tab').find('.select-list').addClass('fixed_question')
            }else{
                $('.tab.active_tab').find('.select-list').removeClass('fixed_question')
            }
            ticking = false;
            });

            ticking = true;
          }
        });

    </script>
    {{--<script>
        $('.mod-row input:radio').prop('checked', true);
    </script>--}}
@endsection
