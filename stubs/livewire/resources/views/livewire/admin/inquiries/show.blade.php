<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Inquiry Detail</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('inquiry.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Name</th><td>{{ $inquiry->full_name }}</td></tr>
                    <tr><th>Email</th><td>{{ $inquiry->email }}</td></tr>
                    <tr><th>Phone</th><td>{{ $inquiry->phone }}</td></tr>
                    <tr><th>Message</th><td>{{ $inquiry->message }}</td></tr>
                    <tr><th>IP</th><td>{{ $inquiry->ip }}</td></tr>
                    <tr><th>Updated On</th><td>{{ $inquiry->updated_at }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
