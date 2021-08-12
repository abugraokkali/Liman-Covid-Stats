<?php

use GuzzleHttp\Client;

class ApiController
{
	public function getResponse()
	{

		$client = new GuzzleHttp\Client(
            ['base_uri' => 'https://api.covid19api.com/']
        );
        $response = $client->request('GET', 'summary');
        return json_decode($response->getBody()->getContents());
	}

	public function listCountries()
	{
		
		$response = $this->getResponse();
		$countries = (array) $response->{'Countries'};
		$data = [];
        foreach($countries as $country){
           
            $data[] = [
                "Country" => $country->{'Country'},
                "CountryCode" => $country->{'CountryCode'},
                "TotalConfirmed" => $country->{'TotalConfirmed'},
                "TotalDeaths" => $country->{'TotalDeaths'},
            ];
        }
		return view('table', [
            "value" => $data,
            "title" => ["Ülke","Ülke Kodu","Vaka Sayısı","Vefat Sayısı"],
            "display" => ["Country","CountryCode","TotalConfirmed","TotalDeaths"]
        ]);
	}

    public function listGlobal()
	{
		
		$response = $this->getResponse();

		$data = [];
           
        $data[] = [
            "NewConfirmed" => $response->{'Global'}->{'NewConfirmed'},
            "TotalConfirmed" => $response->{'Global'}->{'TotalConfirmed'},
            "NewDeaths" => $response->{'Global'}->{'NewDeaths'},
            "TotalDeaths" => $response->{'Global'}->{'TotalDeaths'}
            
        ];

		return view('table', [
            "value" => $data,
            "title" => ["Yeni Vakalar","Vaka Sayısı","Yeni Vefatlar","Vefat Sayısı"],
            "display" => ["NewConfirmed","TotalConfirmed","NewDeaths","TotalDeaths"]
        ]);
	}
}

