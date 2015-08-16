    <div class="col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Messages
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                    @forelse($messages as $message)
                        <tr>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->contact }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ str_limit($message->message, 50) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No messages</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>