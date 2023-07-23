<?php

namespace App\Application\Service;

use App\Domain\Repository\ConsumerRepository;
use App\Domain\Consumer;
use Exception;
use Illuminate\Support\Collection;

class ConsumerService
{
	public function __construct(
		private ConsumerRepository $consumerRepository
	) {}

	public function create(
		string $name,
	): Consumer {
		$consumer = new Consumer($name);
		return $this->consumerRepository->save($consumer);
	}

	// public function update(
	// 	int $id,
	// 	int $stateId,
	// 	int $cityId,
	// 	string $name,
	// 	DateTime $birth,
	// 	string $telephone,
	// 	string $description,
	// 	bool $activated,
	// 	Status $status
	// ): Women {
	// 	$women = $this->womenRepository->findById($id);
	// 	if (empty($women)) {
	// 		throw new Exception("This woman doesn't exist.");
	// 	}
	// 	$women->setStateId($stateId);
	// 	$women->setCityId($cityId);
	// 	$women->setName($name);
	// 	$women->setBirth($birth);
	// 	$women->setTelephone($telephone);
	// 	$women->setDescription($description);
	// 	$women->setActived($activated);
	// 	$women->setStatus($status);
	// 	return $this->womenRepository->update($women);
	// }

	// public function get(int $id): Women
	// {
	// 	$women = $this->womenRepository->findById($id);
	// 	if (empty($women)) {
	// 		throw new Exception("This woman doesn't exist.");
	// 	}
	// 	return $women;
	// }

	// public function listAll(int $stateId = null, int $cityId = null): Collection
	// {
	// 	return $this->womenRepository->listAllActive($stateId, $cityId);
	// }
}