<?php

namespace App\Domain;

use Illuminate\Contracts\Support\Arrayable;

class Consumer implements Arrayable
{
	private int $id;

	public function __construct(
		private string $name
	) {}

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
		];
	}
}