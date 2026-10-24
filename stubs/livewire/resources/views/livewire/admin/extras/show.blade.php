<div class="min-height-200px">
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Extra Page Detail</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('extra.index') }}" class="btn btn-sm btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Title</th><td>{{ $extra->title }}</td></tr>
                    <tr><th>Code</th><td>{{ $extra->code }}</td></tr>
                    <tr><th>Description</th><td>{!! $extra->description !!}</td></tr>
                    <tr><th>Image</th><td><img src="{{ $extra->image_url('thumb') }}" alt="" height="40"></td></tr>
                    <tr><th>Updated On</th><td>{{ $extra->updated_at }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
