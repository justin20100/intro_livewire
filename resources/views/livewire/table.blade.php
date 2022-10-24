<div>
    <table>
        <thead>
        <tr>
            <td><a href="#">Name</a></td>
            <td><a href="#">Email</a></td>
            <td><a href="#">Birthdate</a></td>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->birth->toFormattedDateString()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$contacts->links()}}
</div>
