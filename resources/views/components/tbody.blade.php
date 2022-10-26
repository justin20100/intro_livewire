@props([
    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Contact[] */
    'contacts'
])

<tbody>
@foreach($contacts as $contact)
    <tr class="{{$loop->even?'bg-gray-50':'bg-white'}} [&>td]:p-4 [&>td]:border">
        <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->birthdate}}</td>
    </tr>
@endforeach
</tbody>
