<?php

namespace LegacyFighter\Cabs\Ui;

use LegacyFighter\Cabs\DriverReport\DriverReportCreator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DriverReportController
{
    public function __construct(
        private DriverReportCreator $driverReportCreator
    ) {}

    #[Route('/driverreport/{driverId}', methods: ['GET'])]
    public function loadReportForDriver(int $driverId, Request $request): Response
    {
        return new JsonResponse($this->driverReportCreator->create($driverId, (int) $request->get('lastDays', 1)));
    }
}
