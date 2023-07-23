<?php

namespace App\Domain\Repository;

use App\Domain\Consumer;
use Illuminate\Support\Collection;

interface ConsumerRepository
{
	public function save(Consumer $consumer): Consumer;
	public function update(Consumer $consumer): Consumer;
	public function findById(int $id): ?Consumer;
	public function findAll(): Collection;
	public function delete(Consumer $consumer): void;
}