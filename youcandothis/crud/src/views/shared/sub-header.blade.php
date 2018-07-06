@if(Request::segment(2) == '')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-tachometer"></i> Dashboard</h3>
</div>
@endif

@if(Request::segment(2) == 'clients' && Request::segment(4) == 'questions')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-question"></i>Questions</h3>
    <div class="dashboard-sub-header-filter">
        {!! Former::open()->method('GET')->route('clients.questions.index',$user_id) !!}
        <div class="dashboard-sub-header-filter-form">
            <div class="start-date">
                <div class="date">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="DD/MM/YYYY" value="{!! $from_date !!}">
                </div>
            </div>
            <div class="start-end-date-icon"><i class="fa fa-arrows-h"></i></div>
            <div class="end-date">
                <div class="date">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="DD/MM/YYYY" value="{!! $to_date !!}">
                </div>
            </div>
            <div class="dashboard-sub-header-filter-btn">
                <input value="Filter" class="submit-btn" type="submit">
            </div>
        </div>
        {!! Former::close() !!}
    </div>
</div>
@endif

@if(Request::segment(2) == 'clients' && Request::segment(4) == '')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-users"></i>Clients</a></h3>
    <div class="dashboard-sub-header-filter">
        <div class="dashboard-sub-header-filter-form">
            {!! Former::framework('Nude') !!}
            {!! Former::open()->method('get') !!}
            <div class="dashboard-sub-header-filter-search">
                <i class="fa fa-search"></i>
                {!! Former::input('q')->class('form-control')->label(false)->placeholder('Search') !!}
            </div>
            <div class="dashboard-sub-header-filter-btn">
                <input value="Filter" class="submit-btn" type="submit">
            </div>
            {!! Former::close() !!}
        </div>
    </div>
</div>
@endif

@if(Request::segment(2) == 'questions' && Request::segment(4) == 'answers')
<div class="dashboard-sub-header">
    <div class="dashboard-sub-header-chat">
        <div class="dashboard-sub-header-chat-profile">
            <div class="dashboard-sub-header-chat-profile-photo">
                <img src="{!! $find_question->user->profile_photo_url('thumb') !!}" alt=""/></div>
            <div class="dashboard-sub-header-chat-profile-name">
                <h4>{!! title_case($find_question->user->name) !!} {!! title_case($find_question->user->last_name) !!}</h4>
                <div class="dashboard-sub-header-chat-profile-name-view">
                    <a href="javascript:;" id="show-profile">View Profile <i class="fa fa-angle-down"></i></a>
                    <a href="javascript:;" id="hide-profile">Hide Profile <i class="fa fa-angle-up"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="dashboard-sub-header-chat-disclaimer">
            <p><strong>Disclaimer :</strong> This advice is not valid for medicolegal purpose. Our expert’s advice should not be substituted for professional medical advice as complete assessment of individual has not been taken. Consider this as general information purpose only, act upon it only after consulting your family physician.</p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endif

@if(Request::segment(2) == 'change-password')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-pencil-alt"></i>Change Password</h3>
</div>
@endif

@if(Request::segment(2) == 'change-profile')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-pencil"></i>Edit Profile</h3>
</div>
@endif

@if(Request::segment(2) == 'billing-history')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-list-alt"></i>Billing History</h3>
</div>
@endif

@if(Request::segment(2) == 'packages')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-list-alt"></i>Packages</h3>
</div>
@endif

@if(Request::segment(2) == 'settings')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-pencil"></i>Edit Profile</h3>
</div>
@endif

@if(Request::segment(2) == 'ask-an-expert-dashboard')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-question"></i>Ask Question</h3>
</div>
@endif

@if(Request::segment(2) == 'send-sms')
<div class="dashboard-sub-header">
    <h3><i class="fa fa-commenting-o"></i>Send SMS</h3>
</div>
@endif