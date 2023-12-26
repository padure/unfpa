<h3>Şcoală: {{ $result->school->name }} Oraș: {{ $result->school->city }}</h3>
<h3>Nume si Prenume: {{ $result->last_name }} {{ $result->first_name }}</h3>
<h3>E-mail: {{ $result->email }}</h3>
<h3>Numarul de telefon: {{ $result->phone }}</h3>
<h3>Clasa: {{ $result->class }}</h3>
<h3>Scor: {{ $result->success_sum }}</h3>
<h3>Data si ora: {{ $result->created_at }}</h3>
@if($pdf)
    <h3>Toate răspunsurile: <a href="{{ asset($result->pdf_url) }}">PDF</a></h3>
@endif
