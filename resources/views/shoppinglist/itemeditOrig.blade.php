<h3>Edit Item</h3>

<h4>User: {{$username}}</h4>

<form method="post" action="{{ url('/change-item/'.$item->id) }}" style="border: solid 1px black; width: 200px;">
    @csrf
    <h3>Add Item</h3>
    <p>
    <select required name="category" style="width: 150px;">
        <option value="{{$item->category}}">Selected: {{$item->category}}</option> 
        <option value="Veggies">Veggies</option>
        <option value="Fruit">Fruit</option> 
    </select>
    </p>
    <p>
        <input type="text" name="item" placeholder="item" value="{{$item->item}}"/>
    </p>
    <p>
        <input type="number" name="quantity" placeholder="qty" value="{{$item->quantity}}" style="width: 50px;"/>
    </p>
    
    <p>
    @if ($errors->any())
    <div style="border: solid 1px red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </p>

    <p>
        <button type="submit">apply change</button>
    </p>
</form>