<?php

namespace App\Modules\Content\Http\Controllers\Crud;

use App\Modules\Base\Http\Controllers\BaseController;
use App\Modules\Content\Http\Requests\ServiceStoreRequest;
use App\Modules\Content\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use ReflectionClass;

class ServiceController extends Controller
{
    public $base_url = "/admin/crud/services";
    public $instance;
    public $model;

    public $dictionary = [
        'article' => [
            'what' => 'Статью',
            'list' => 'Статьи'
        ],
        'service' => [
            'what' => 'Услугу',
            'list' => 'Услуг'
        ]
    ];

    public function __construct(Request $request)
    {
        $this->model = explode('/', explode($this->base_url . '/', $request->getRequestUri())[1])[0];
        try {
            $this->instance = new ReflectionClass('App\Modules\Content\Models\\' . ucfirst($this->model));
            $this->instance = $this->instance->newInstance();
        } catch (\Exception $exception) {
            Redirect::to($this->base_url . "/service")->send();
        }
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $services = $this->instance::all();
        return $this->view("content::services.crud.index", [
            "services" => $services,
            "dictionary" => $this->dictionary[$this->model]
        ]);
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return $this->view("content::services.crud.create", [
            "dictionary" => $this->dictionary[$this->model]
        ]);
    }

    /**
     * @param $id
     * @return Response
     */
    public function edit($model, $id): Response
    {
        $service = $this->instance::find($id);
        return $this->view("content::services.crud.edit", [
            "service" => $service,
            "dictionary" => $this->dictionary[$this->model]
        ]);
    }

    /**
     * @param ServiceStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ServiceStoreRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['is_public'] = $request->has('is_public') ? true : false;
        $data['image'] = '';
        if ($request->file("image")) {
            $data['image'] = BaseController::storeImage($request->file("image"), 400);
        }
        $this->instance::create($data);
        return response()->redirectTo($this->getRedirectPath());
    }

    /**
     * @param ServiceStoreRequest $request
     * @return RedirectResponse
     */
    public function update(ServiceStoreRequest $request): RedirectResponse
    {

        $id = $request->input("id");
        $service = $this->instance::find($id);
        $data = $request->all();
        $data['is_public'] = $request->has('is_public') ? true : false;
        if ($request->file("image")) {
            $preview = $service->getPreview();
            if (file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
                unlink(public_path($preview));
            }
            $data['image'] = BaseController::storeImage($request->file("image"), 400);
        }
        $service->update($data);
        return response()->redirectTo($this->getRedirectPath());
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $service = $this->instance::find($id);
        $preview = $service->getPreview();

        if (file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
            unlink(public_path($preview));
        }
        $service->delete();

        return response()->redirectTo($this->base_url);
    }

    /**
     * @return string
     */
    public function getRedirectPath(): string
    {
        return $this->base_url . '/' . $this->model;
    }
}
