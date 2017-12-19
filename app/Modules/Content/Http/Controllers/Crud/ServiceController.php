<?php

namespace App\Modules\Content\Http\Controllers\Crud;

use App\Modules\Base\Http\Controllers\BaseController;
use App\Modules\Content\Http\Requests\ServiceStoreRequest;
use App\Modules\Content\Models\Service;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public $base_url = "/admin/crud/services";

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return $this->view("content::services.crud.index", [
            "services" => $services
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("content::services.crud.create");
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return $this->view("content::services.crud.edit", [
            "service" => $service
        ]);
    }

    /**
     * @param ServiceStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServiceStoreRequest $request)
    {
        $data = $request->all();
        $data['is_public'] = true;
        $data['image'] = BaseController::storeImage($request->file("image"), 400);
        Service::create($data);
        return response()->redirectTo($this->base_url);
    }

    /**
     * @param ServiceStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ServiceStoreRequest $request)
    {

        $id = $request->input("id");
        $service = Service::find($id);
        $data = $request->all();
        $data['is_public'] = true;
        if ($request->file("image")) {
            $preview = $service->getPreview();
            if (file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
                unlink(public_path($preview));
            }
            $data['image'] = BaseController::storeImage($request->file("image"), 400);
        }
        $service->update($data);
        return response()->redirectTo($this->base_url);
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $preview = $service->getPreview();

        if (file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
            unlink(public_path($preview));
        }
        $service->delete();

        return response()->redirectTo($this->base_url);
    }
}
