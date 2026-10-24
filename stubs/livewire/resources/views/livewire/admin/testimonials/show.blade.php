<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Testimonial Detail</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('testimonial.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Name</th><td>{{ $testimonial->name }}</td></tr>
                    <tr><th>Designation</th><td>{{ $testimonial->designation }}</td></tr>
                    <tr><th>Text</th><td>{!! $testimonial->text !!}</td></tr>
                    <tr><th>Status</th><td>{{ $testimonial->status ? 'Active' : 'Inactive' }}</td></tr>
                    <tr><th>Updated On</th><td>{{ $testimonial->updated_at }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
