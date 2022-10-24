<div>
    <table>
        <thead>
        <tr>
            <td><a href="#" wire:click="$set('sortField', 'name')">Name</a></td>
            <td><a href="#" wire:click="$set('sortField', 'email')">Email</a></td>
            <td><a href="#" wire:click="$set('sortField', 'birth')">Birthdate</a></td>
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
