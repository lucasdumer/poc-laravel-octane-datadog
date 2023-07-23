<?php

namespace App\Interfaces\Http\Controller;

use App\Application\Service\ConsumerService;
use App\Interfaces\Http\Request\Consumer\CreateRequest;
use App\Interfaces\Http\Request\Consumer\DeleteRequest;
use App\Interfaces\Http\Request\Consumer\GetRequest;
use App\Interfaces\Http\Request\Consumer\UpdateRequest;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
	public function __construct(
		private ConsumerService $consumerService
	) {}

    public function create(CreateRequest $request)
    {
        return $this->success(['test' => 'ok']);
        // return $this->success($this->consumerService->create($request->name)->toArray());
    }

	public function update(UpdateRequest $request)
	{
		return $this->success($this->consumerService->update($request->id, $request->name)->toArray());
	}

	public function get(GetRequest $request)
	{
		return $this->success($this->consumerService->get($request->id)->toArray());
	}

	public function getAll(Request $request)
	{
		return $this->success($this->consumerService->getAll()->toArray());
	}
	
	public function delete(DeleteRequest $request)
	{
		return $this->success($this->consumerService->delete($request->id)->toArray());
	}
}