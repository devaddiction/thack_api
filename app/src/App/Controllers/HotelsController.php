<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class HotelsController
{

    protected $hotelsService;

    public function __construct($service)
    {
        $this->hotelsService = $service;
    }

    public function getByCoordinates($checkIn, $checkOut, Request $request)
    {
        $coordinates = $request->request->get("coordinates");
        if (empty($coordinates)) {
            throw new \BadMethodCallException('Missing Coordinates');
        }
        $coordinates = $this->getBestGeoByGeos($coordinates);
        return new JsonResponse(
            $this->hotelsService->getByCoordinates(
                $checkIn, $checkOut, $coordinates['x'], $coordinates['y']
            )
        );
    }

    protected function getBestGeoByGeos($geoArray)
    {
        foreach ($geoArray as $k => $geo) {
            $geoArray[$k][] = 0;
        }
        return $this->getMedian($geoArray, 100);
    }

    protected function addArray($arr1, $arr2)
    {
        foreach (array_intersect_key($arr2, $arr1) as $key => $val) $arr1[$key] += $val;
        $arr1 += $arr2;
        return $arr1;
    }

    protected function subtractArray($arr1, $arr2)
    {
        foreach ($arr1 as $key => &$val) {
            if (isset($arr2[$key])) {
                $val -= $arr2[$key];
            }
        }
        return $arr1;
    }

    protected function vectorNorm($array)
    {
        $squareSum = 0;
        foreach ($array as $value) {
            $squareSum += pow($value, 2);
        }
        $norm = sqrt($squareSum);
        return $norm;
    }

    protected function multiplyArray($arr, $scalar)
    {
        return array_map(
            function ($val, $factor) {
                return $val * $factor;
            },
            $arr,
            array_fill(0, count($arr), $scalar)
        );
    }

    protected function divideArray($arr, $scalar)
    {
        return array_map(
            function ($val, $factor) {
                return $val / $factor;
            },
            $arr,
            array_fill(0, count($arr), $scalar)
        );
    }

    protected function weiszfeld($dataArray, $previousEstimate)
    {
        $numerator = [0];
        $denominator = 0;
        $keys = array_keys($dataArray[0]);
        foreach ($dataArray as $dataPoint) {
            $numerator = $this->addArray($numerator, $this->divideArray($dataPoint, $this->vectorNorm($this->subtractArray($dataPoint, $previousEstimate))));
        }
        foreach ($dataArray as $dataPoint) {
            $denominator = $denominator + 1 / ($this->vectorNorm($this->subtractArray($dataPoint, $previousEstimate)));
        }
        $median = $this->divideArray($numerator, $denominator);
        $median = array_combine($keys, $median);
        return $median;
    }

    protected function getMedian($dataArray, $iterations)
    {
        $median = $this->weiszfeld($dataArray, [0, 0, 0, 0, 0, 0]);
        for ($i = 0; $i < $iterations; $i++) {
            $median = $this->weiszfeld($dataArray, $median);
        }
        return $median;
    }
}
