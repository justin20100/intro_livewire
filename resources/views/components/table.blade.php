@props([
    'contacts',
    'qp',
    'sortOrder'
])


@php
    $qpf = array_filter($qp, fn($p)=>$p!=='sort-field', ARRAY_FILTER_USE_KEY);
@endphp
<div id="contacts-table-container">
    <table class="w-full mb-4">
        <thead class="bg-blue-800 text-white uppercase">
        <tr class="[&>th]:py-4 [&>th]:border [&>th]:border-gray-500">
            @php
                $qpf = array_filter($qp, static fn($p) => $p !== 'sort-field' ,ARRAY_FILTER_USE_KEY);
            @endphp
            <th scope="col"
                class="tracking-wider"><a href="/?sort-field=name&amp;{{http_build_query($qpf)}}">Name</a></th>
            <th scope="col"
                class="tracking-wider"><a href="/?sort-field=email&amp;{{http_build_query($qpf)}}">Email</a></th>
            <th scope="col"
                class="tracking-wider"><a href="/?sort-field=birthdate&amp;{{http_build_query($qpf)}}">Birthdate</a>
            </th>
        </tr>
        </thead>
        <x-tbody :contacts="$contacts"/>
    </table>
</div>
