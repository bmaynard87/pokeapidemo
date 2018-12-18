<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class PokemonController extends Controller
{
    private $url;
    private $client;

    public function __construct()
    {
        $this->url = config('pokeapi.url');
        $this->client = new Client();
    }

    public function index(Request $request, $id = null)
    {
        $url = is_null($id) ? "{$this->url}/pokemon/?limit=151" : "{$this->url}/pokemon/$id/";

        // Pagination with offset/limit for PokéAPI v2 is temporarily broken.

        $res =  $this->client->request('GET', $url);

        return $res->getBody();
    }

    public function version($id = null)
    {
        $url = is_null($id) ? "{$this->url}/version/" : "{$this->url}/version/$id/";

        $res =  $this->client->request('GET', $url);

        return $res->getBody();
    }

    public function type($id = null)
    {
        $url = is_null($id) ? "{$this->url}/type/" : "{$this->url}/type/$id/";

        $res =  $this->client->request('GET', $url);

        return $res->getBody();
    }

    public function pokemonByType($typeId)
    {
        return json_decode($this->type($typeId))->pokemon;
    }
}
