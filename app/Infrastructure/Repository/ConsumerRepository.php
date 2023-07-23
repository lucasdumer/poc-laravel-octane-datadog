<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\ConsumerRepository as ConsumerRepositoryInterface;
use App\Domain\Consumer;
use App\Infrastructure\Model\ConsumerModel;
use Illuminate\Support\Collection;
use Throwable;
use Exception;

class ConsumerRepository implements ConsumerRepositoryInterface
{
	public function save(Consumer $consumer): Consumer
	{
		try {
			$consumerModel = new ConsumerModel();
			$consumerModel->name = $consumer->getName();
			$consumerModel->save();
			$consumer->setId($consumerModel->id);
			return $consumer;
		} catch (Throwable $throwable) {
			throw new Exception("Error on save consumer in database. ".$throwable->getMessage());
		}
	}
	
	public function update(Consumer $consumer): Consumer
	{
		try {
			$consumerModel = ConsumerModel::find($consumer->getId());
			$consumerModel->name = $consumer->getName();
			$consumerModel->save();
			return $consumer;
		} catch (Throwable $throwable) {
			throw new Exception("Error on save consumer in database. ".$throwable->getMessage());
		}
	}

	public function findById(int $id): ?Consumer
	{
		try {
			$consumerModel = ConsumerModel::where([
				'id' => $id
			])->first();
			if (empty($consumerModel)) {
				return null;
			}
			$consumer = new Consumer(
				$consumerModel->name
			);
			$consumer->setId($consumerModel->id);
			return $consumer;
		} catch (Throwable $throwable) {
			throw new Exception("Error on find consumer in database. ".$throwable->getMessage());
		}
	}

	public function findAll(): Collection
	{
		$query = ConsumerModel::where();
		$consumerModels = $query->get();
		$consumers = new Collection();
		foreach ($consumerModels as $consumerModel) {
			$consumer = new Consumer(
				$consumerModel->name
			);
			$consumer->setId($womenModel->id);
			$consumers[] = $consumer;
		}
		return $consumers;
	}
	
	public function delete(Consumer $consumer): void
	{

	}
}