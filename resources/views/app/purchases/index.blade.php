@extends('app.layouts.master')

@section('title', 'Purchases')

@section('content')
    <h1>My purchases</h1>

    @if($purchases->count())
        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->created_at }}</td>
                    <td>{{ $purchase->product->name }}
                        <div class="td-secondary-line">
                            {{ $purchase->price }}
                        </div>
                    </td>
                    <td class="td-action"><a href="{{ $purchase->receipt_url }}" target="_blank">View receipt</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    @endif
@endsection
