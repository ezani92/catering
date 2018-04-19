<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
    @include('admin.layouts.menu')
        <div class="be-content">
            <div class="main-content container-fluid">
                <h3>All Package List</h3>
                @if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                                <br />
                                <table id="packages-table" class="table table-striped table-hover table-fw-widget">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th width="30%">Description</th>
                                            <th>Price From</th>
                                            <th>Pdf File</th>
                                            <th>Display On Frontend?</th>
                                            <th>Is Trashed?</th>
                                            <th>Action</th>
                                            <th>Sort</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($packages as $package)
                                            <tr id="package_{{ $package->id }}">
                                                <td>{{ $package->name }}</td>
                                                <td>{{ $package->description }}</td>
                                                <td>RM {{ $package->price_start }}</td>
                                                <td><a target="_blank" href="{{ asset('storage/pdf/'.$package->pdf_file) }}">{{ $package->pdf_file }}</a></td>
                                                <td>
                                                    @if ($package->is_display == 1)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Not Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($package->trashed())
                                                        <span class="label label-danger">Yes</span>
                                                    @else
                                                        <span class="label label-success">No</span>
                                                    @endif
                                                </td>
                                                <td><a href="{{ URL::to('admin/package/'.$package->id) }}" class="btn btn-xs btn-info">View</a></td>
                                                <td><i class="handle mdi mdi-menu"></i></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @include('admin.layouts.footer')
    <script>
        $('#packages-table > tbody').sortable({
            'containment': 'parent',
            'revert': true,
            helper: function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width());
                });
                return $helper;
            },
            'handle': '.handle',
            update: function(event, ui) {
                $.post('{{ url('admin/package/reposition') }}', $(this).sortable('serialize'), function(data) {
                    alert(data.success);
                }, 'json');
            }
        });
        $(window).resize(function() {
            $('table.db tr').css('min-width', $('table.db').width());
        });
    </script>
    </body>
</html>