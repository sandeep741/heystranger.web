<ul class="nav nav-tabs nav-lg nav-tabs-highlight">

    <li class="{{ (empty(session()->get('tab_type'))) ? 'active' : '' }}">
        <a href="#accommodation" data-toggle="{{ (session()->get('tab_type') < 1) ? 'tab' : '' }}">
            Listing Details <span class="status-mark position-right border-danger"></span>
        </a>
    </li>
    <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '2') ? 'in active' : '' }}">
        <a href="#rooms" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '2') ? 'tab' : '' }}">
            Service<span class="status-mark position-right border-success"></span>
        </a>
    </li>
    <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '3') ? 'active' : '' }}">
        <a href="#activity" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '3') ? 'tab' : '' }}">
            Activities <span class="status-mark position-right border-success"></span>
        </a>
    </li>
    <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '4') ? 'active' : '' }}">
        <a href="#policy" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '4') ? 'tab' : '' }}">
            Policies <span class="status-mark position-right border-success"></span>
        </a>
    </li>
    <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '5') ? 'active' : '' }}">
        <a href="#keywords" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '5') ? 'tab' : '' }}">
            Keywords & Meta Tags <span class="status-mark position-right border-success"></span>
        </a>
    </li>
    <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '6') ? 'active' : '' }}">
        <a href="#videomap" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '6') ? 'tab' : '' }}">
            Video & Map <span class="status-mark position-right border-warning"></span>
        </a>
    </li>

</ul>