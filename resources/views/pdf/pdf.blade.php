<table>
    <thead>
        <tr>
            <th style="width: 60%">Întrebare</th>
            <th style="width: 20%">Răspuns</th>
            <th style="width: 20%">#</th>
        </tr>
    </thead>
    <tbody>
        @forelse($results as $result)
            <tr>
                <td style="width: 60%">
                    {{ $result['question'] }}
                </td>
                <td style="width: 20%">
                    {{ $result['answer'] }}
                </td>
                <td style="width: 20%">
                    @if($result['status'] == 1)
                        <b>Corect</b>
                    @else
                        <b>Nu este corect</b>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td>
                    <h3>Не ответил ни на одни вопрос!</h3>
                </td>
            </tr>
        @endif
    </tbody>
</table>
<style>
    th,td,tr {
        border:1px solid black;
        border-collapse:collapse;
        text-align: center;
    }

    table {
        border:2px solid black;
        border-collapse:collapse;
    }

    td {
        font-family:Arial;
        font-size:11px;
    }
</style>
