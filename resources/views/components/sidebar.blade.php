<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>



            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('create_test_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/create-tests*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.create-tests.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-plus">
                            </i>
                            {{ trans('cruds.createTest.title') }}
                        </a>
                    </li>
                @endcan
                @can('school_master_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/schools*")||request()->is("admin/school-licences*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-graduation-cap">
                            </i>
                            {{ trans('cruds.schoolMaster.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('school_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/schools*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.schools.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-school">
                                        </i>
                                        {{ trans('cruds.school.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('school_licence_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/school-licences*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.school-licences.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.schoolLicence.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('test_setup_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/class-masters*")||request()->is("admin/tests*")||request()->is("admin/ability-masters*")||request()->is("admin/sten-charts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.testSetup.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('class_master_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/class-masters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.class-masters.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-mastodon">
                                        </i>
                                        {{ trans('cruds.classMaster.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('test_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/tests*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tests.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-book-open">
                                        </i>
                                        {{ trans('cruds.test.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('ability_master_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/ability-masters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.ability-masters.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-highlighter">
                                        </i>
                                        {{ trans('cruds.abilityMaster.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('sten_chart_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/sten-charts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.sten-charts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-chart-area">
                                        </i>
                                        {{ trans('cruds.stenChart.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('question_master_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/question-papers*")||request()->is("admin/question-banks*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-question">
                            </i>
                            {{ trans('cruds.questionMaster.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('question_paper_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/question-papers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.question-papers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-map">
                                        </i>
                                        {{ trans('cruds.questionPaper.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('question_bank_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/question-banks*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.question-banks.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-university">
                                        </i>
                                        {{ trans('cruds.questionBank.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('student_test_taken_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/student-test-takens*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.student-test-takens.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-tablet-alt">
                            </i>
                            {{ 'Exam Progress List' }}
                        </a>
                    </li>
                @endcan
                @can('prepare_result_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/student-test-answers*")||request()->is("admin/overall-result-reports*")||request()->is("admin/ability-wise-results*")||request()->is("admin/overall-observations*")||request()->is("admin/ability-wise-observations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.prepareResult.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">

                            @can('student_test_answer_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/student-test-answers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.student-test-answers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.studentTestAnswer.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('overall_result_report_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/overall-result-reports*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.overall-result-reports.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.overallResultReport.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('ability_wise_result_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/ability-wise-results*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.ability-wise-results.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.abilityWiseResult.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('overall_observation_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/overall-observations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.overall-observations.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.overallObservation.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('ability_wise_observation_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/ability-wise-observations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.ability-wise-observations.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.abilityWiseObservation.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('evaluation_template_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/overall-report-templates*")||request()->is("admin/report-templates*")||request()->is("admin/overall-observation-templates*")||request()->is("admin/observation-templates*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.evaluationTemplate.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('overall_report_template_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/overall-report-templates*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.overall-report-templates.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.overallReportTemplate.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('report_template_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/report-templates*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.report-templates.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-award">
                                        </i>
                                        {{ trans('cruds.reportTemplate.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('overall_observation_template_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/overall-observation-templates*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.overall-observation-templates.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-align-left">
                                        </i>
                                        {{ trans('cruds.overallObservationTemplate.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('observation_template_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/observation-templates*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.observation-templates.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.observationTemplate.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('career_avenues_setup_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/stream-groups*")||request()->is("admin/stream-masters*")||request()->is("admin/college-masters*")||request()->is("admin/course-masters*")||request()->is("admin/profession-masters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.careerAvenuesSetup.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('stream_group_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/stream-groups*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.stream-groups.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-arrow-alt-circle-right">
                                        </i>
                                        {{ trans('cruds.streamGroup.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('stream_master_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/stream-masters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.stream-masters.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-steam-square">
                                        </i>
                                        {{ trans('cruds.streamMaster.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('college_master_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/college-masters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.college-masters.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-columns">
                                        </i>
                                        {{ trans('cruds.collegeMaster.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('course_master_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/course-masters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.course-masters.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe">
                                        </i>
                                        {{ trans('cruds.courseMaster.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('profession_master_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/profession-masters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.profession-masters.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-lock">
                                        </i>
                                        {{ trans('cruds.professionMaster.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                                @can('user_access')
                                    <li class="items-center">
                                        <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.studentlist") }}">
                                            <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                            </i>
                                            {{ 'Student-list' }}
                                        </a>
                                    </li>
                                @endcan
                        </ul>
                    </li>
                @endcan
                @can('system_option_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/system-options*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.system-options.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-filter">
                            </i>
                            {{ trans('cruds.systemOption.title') }}
                        </a>
                    </li>
                @endcan
                @can('upload_master_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/upload-masters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.upload-masters.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-arrow-up">
                            </i>
                            {{ trans('cruds.uploadMaster.title') }}
                        </a>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>