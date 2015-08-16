    <div class="col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Reports
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>Image</th>
                        <th>Complaint Type</th>
                        <th>Description</th>
                    </tr>
                    @forelse($reports as $report)
                        <tr>
                            <td>{{ $report->image_id }}</td>
                            <td>{{ $report->type }}</td>
                            <td>{{ $report->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No reports</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>