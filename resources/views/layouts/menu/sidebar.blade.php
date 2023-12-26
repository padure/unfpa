<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.index') }}" class="brand-link">
        <span class="brand-text font-weight-light">
            @lang('auth.brand_text')
        </span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.schools.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>@lang('admin.school')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p> @lang('admin.result.name')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('questions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-question"></i>
                        <p> @lang('admin.question')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('answers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p> @lang('admin.answers.name')</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

