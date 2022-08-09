<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressControllerRequest;
use App\Models\Address;

class AddressController extends Controller
{
    public function __construct(private Address $address)
    {
    }

    public function deleteAddress($id)
    {
        $address = Auth::user()->addresses()->findOrFail($id);

        $address->update([
            'user_id' => null,
        ]);

        return redirect()->back();
    }

    public function postNewAddress(AddressControllerRequest $req)
    {
        $data = $req->only('postcode', 'street', 'number', 'neighborhood', 'city', 'state', 'country');

        $data['user_id'] = Auth::user()->id;

        $this->address->create($data);

        return redirect()->back();
    }

    public function getEditPage($id)
    {
        $address = Auth::user()->addresses()->findOrFail($id);

        return view('user.address.edit', compact('address'));
    }

    public function putUpdateAddressData(AddressControllerRequest $req, $id)
    {
        $data = $req->only('postcode', 'street', 'number', 'neighborhood', 'city', 'state', 'country');

        $address = Auth::user()->addresses()->findOrFail($id);

        $address->update($data);

        return redirect(route('user.configurations'));
    }
}
