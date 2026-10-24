<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Feedback Detail</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('feedback.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Name</th><td>{{ $feedback->name }}</td></tr>
                    <tr><th>Email</th><td>{{ $feedback->email }}</td></tr>
                    <tr><th>Type</th><td>{{ $feedback->type }}</td></tr>
                    <tr><th>Feedback</th><td>{{ $feedback->feedback }}</td></tr>
                    <tr><th>Status</th><td>{{ $feedback->status ? 'Active' : 'Inactive' }}</td></tr>
                    <tr><th>Updated On</th><td>{{ $feedback->updated_at }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
