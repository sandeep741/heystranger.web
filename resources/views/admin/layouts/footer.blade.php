<!-- Footer -->
@if((collect(request()->segments())->last() != 'admin'))
<div class="footer text-muted">
    &copy; 2017 Hey Stranger All right reserved
</div>
@else
<div class="footer text-white">
    &copy; 2018. <a href="{{ config('constants.company_site') }}" class="text-white">Global-MLM</a> by <a href="{{ config('constants.company_site') }}" class="text-white" target="_blank">Global Soft Web Technologies</a>
</div>
@endif
<!-- /footer -->
