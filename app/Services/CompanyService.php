<?php

namespace App\Services;

use App\Repository\CompanyRepository;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        return $this->companyRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->companyRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->companyRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $company = $this->companyRepository->create($data);
        if (isset($data['photo']) && $data['photo']) {
            $company->addMediaFromRequest('photo')->toMediaCollection('company');
        }

        if (isset($data['services']) ) {
            foreach ($data['services'] as $service) {
                $company->services()->create([
                    'service_id' => $service,
                ]);
            }
        }

        return $company;
    }
    public function updateAnyColumn($data, $id)
    {
        $company = $this->companyRepository->find($id);
        $company = $this->companyRepository->update($data, $company);
    }
    public function update($data, $id)
    {
        $company = $this->companyRepository->find($id);
        $company = $this->companyRepository->update($data, $company);
        if (isset($data['services'])) {
            $existingServicesIds = collect($data['services'])->pluck('id')->filter();
            $company->services()->whereNotIn('id', $existingServicesIds)->delete();

            foreach ($data['services'] as $service) {
                $company->services()->create([
                    'service_id' => $service,
                ]);
            }
        }
        if (isset($data['photo']) && $data['photo']) {
            $company->clearMediaCollection('company');
            $company->addMediaFromRequest('photo')->toMediaCollection('company');
        }
    }
    public function destroy($id)
    {
        $company = $this->companyRepository->find($id);
        $this->companyRepository->delete($company);
    }
}
