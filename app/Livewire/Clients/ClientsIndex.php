<?php

namespace App\Livewire\Clients;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use App\Models\Client;

class ClientsIndex extends Component
{
    use WithPagination;

    public $perPage = 10;

    #[Url(history:true)]
    public $search = '';

    public $client_prefix; 

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($clientPrefix)
    {
        $this->client_prefix = $clientPrefix;
        $this->dispatch('open-modal', name: 'removeClient');
    }

    public function remove($client_prefix)
    {
        try {
            $client = Client::where('user_id',Auth::user()->id)->where('prefix',$client_prefix)->first();
            Client::where('prefix', $client->prefix)->where('user_id',Auth::user()->id)->update([
                'name' => '[destroy]',
                'email' => ' ',
                'phone' => ' ',
                'social' => ' ',
                'firm' => ' ',
            ]);

            // activity 
            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->action = 'Destroy data';
            $activity->ip_address = request()->ip();
            $activity->what = $client->name.' from Klienci';
            $activity->save();

            $this->dispatch('close-modal');
            session()->flash('success', 'Client remove successfully.');

        } catch(Exception $e) {
            session()->flash('error', 'Failed to delete client!');
            return;
        }

    }
    public function render()
    {
        $clients = Client::search($this->search)->where('user_id',Auth::user()->id)->orderBy('name','asc')->paginate($this->perPage);

        return view('livewire.clients.clients-index',[
            'clients' => $clients, 
        ]);
    }
}
