@extends('layout.layout')

@section('head')
@livewireStyles
@endsection

@section('content')
<div>
    <section class="course-page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-8">
                    <div class="title-block">
                        <h1>{{ $program->title }}</h1>
                        <ul class="list-inline mb-0" dir="ltr">
                            <li class="list-inline-item"> <a href="{{ route('home') }}">{{ __('header.home') }}</a> </li>
                            <li class="list-inline-item">{{ __('header.programs') }}</li>
                            @if ($program->category)
                            <li class="list-inline-item">{{ $program->category->title }}</li>
                            @endif
                            <li class="list-inline-item">{{ $program->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-wrapper tas">
        <div class="tutori-course-content ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="single-course-details mb-4">
                            <hr>
                            @if ($program->description)
                            <h3 class="course-title mt-4 mb-4 c-primary">{{ __('show-program.description') }}</h3>
                            <p>{!! nl2br($program->description) !!}</p>
                            @endif

                            @if ($program->objectives)
                            <div class="spacer-100"></div>
                            <h3 class="course-title mt-4 mb-4 c-primary">{{ __('show-program.objectives') }}</h3>
                            <p>{!! nl2br($program->objectives) !!}</p>
                            @endif


                            @if ($program->aimed_at)
                            <div class="spacer-100"></div>
                            <x-program.show.list
                                                 title="{{ __('show-program.aimed_at') }}"
                                                 :items="$program->aimed_at" />
                            @endif

                            @if ($program->learn_to)
                            <div class="spacer-50"></div>
                            <x-program.show.list
                                                 title="{{ __('show-program.learn_to') }}"
                                                 :items="$program->learn_to" />
                            @endif

                            <div class="spacer-100"></div>
                            <x-program.show.included :lang="$program->language" />
                        </div>

                        <hr>
                        <h1 class="course-title c-primary">{{ __('show-program.syllabus') }}</h1>
                        <div class="spacer-50"></div>
                        <div class="tutori-course-curriculum">
                            <div class="curriculum-scrollable">
                                <ul class="curriculum-sections">
                                    @if ($program->modules)
                                    @foreach ($program->modules as $module)
                                    <x-program.show.module :title="$module[0]"
                                                           :lessons="array_slice($module,1)" />
                                    @endforeach
                                    @endif
                                </ul>
                                <!-- Main ul end -->
                            </div>
                        </div>
                        <hr>
                        <h1 class="course-title c-primary">{{ __('show-program.instructors') }}</h1>
                        <div class="spacer-50"></div>
                        @foreach ($program->instructors as $instructor)
                        <x-program.show.instructor :image="$instructor->image"
                                                   :name="$instructor->name"
                                                   :job="$instructor->biography" />
                        @endforeach
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <!-- Course Sidebar start -->
                        <div class="course-sidebar course-sidebar-3 mt-5 mt-lg-0">
                            <div class="course-widget course-details-info ">
                                <div class="course-thumbnail">
                                    <img src="{{ asset('storage/'.$program->image) }}" alt="" class="img-fluid w-100">
                                </div>

                                <div class="course-sidebar-details">

                                    <livewire:program.show-price :program="$program" />

                                    <div class="course-meterial">
                                        <h4 class="mb-3">{{ __('show-program.materials') }}</h4>
                                        <ul class="course-meterial-list">
                                            <li><i class="fal fa-long-arrow-right"></i>{{ __('show-program.lectures') }}</li>
                                            <li><i class="fal fa-long-arrow-right"></i>{{ __('show-program.videos') }}</li>
                                            <li><i class="fal fa-long-arrow-right"></i>{{ __('show-program.activities') }}</li>
                                            <li><i class="fal fa-long-arrow-right"></i>{{ __('show-program.rubrics') }}</li>
                                            <li><i class="fal fa-long-arrow-right"></i>{{ __('show-program.online-expert') }}</li>
                                            <li><i class="fal fa-long-arrow-right"></i>{{ __('show-program.self-assessment') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($similar_programs->isNotEmpty())
                        <!-- Course Sidebar end -->
                        <div class="course-latest">
                            <h4 class="mb-4">{{ __('show-program.similar-programs') }}</h4>
                            <ul class="recent-posts course-popular">
                                @foreach ($similar_programs as $program)
                                <x-program.show.similar-program :program="$program" />
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('foot')
@livewireScripts
@endsection