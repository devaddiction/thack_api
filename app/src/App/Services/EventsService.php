<?php

namespace App\Services;

class EventsService extends BaseService
{

    public function getByCity($id)
    {
        $baseUrl = 'https://app.xapix.io/api/v1/thm16_tech_beatles/hotels?fields%5Bhotels%5D=license%2Cemail%2Ccity_0_content%2Cpostalcode%2Caddress_0_content%2Caccommodationtypecode%2Cchaincode%2Ccategorycode%2Ccoordinates_0_latitude%2Ccoordinates_0_longitude%2Czonecode%2Cdestinationcode%2Ccountrycode%2Cdescription_0_content%2Cname_0_content%2Ccode&sort=code&page%5Bnumber%5D=1&page%5Bsize%5D=100';
        return ;
    }
}
