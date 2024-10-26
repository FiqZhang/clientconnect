<table border="1"  style="font-family: Arial, Helvetica, sans-serif;">
    <h5>Tickets List</h5>
    <div class="row mt-3">
        <tr class="bg-head">
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Customer</th>
                <th>Assigned To</th>
        </tr>
    </div>

    <tbody>
        @forelse ($tickets as $ticket)
            <tr class="{{ $loop->even ? 'bg-light-yellow' : 'bg-default' }}">
                <td>{!! wordwrap($ticket->id, 60, '<br>') !!}</td>
                <td>{!! wordwrap($ticket->title, 60, '<br>') !!}</td>
                <td>{!! wordwrap(ucfirst($ticket->status), 60, '<br>') !!}</td>
                <td>{!! wordwrap(ucfirst($ticket->priority), 60, '<br>') !!}</td>
                <td>{!! wordwrap($ticket->customer->name, 60, '<br>') !!}</td>
                <td>{!! wordwrap($ticket->assignedUser ? $ticket->assignedUser->name : 'Unassigned', 60, '<br>') !!}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Tickets not exist</td>
            </tr>
            </tr>
        @endforelse
    </tbody>
</table>
