<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'var_razon_social' => $this->var_razon_social,
            'var_nombre_comercial' => $this->var_nombre_comercial,
            'var_nro_documento' => $this->var_nro_documento,
            'var_direccion'=> $this->var_direccion,
            'var_telefono' => $this->var_telefono,
            'var_celular' => $this->var_celular,
            'var_email' => $this->var_email,
            'var_pais' => $this->var_pais,
            
            //se verifica si el usuario es un sub usuario, para enviar sus permisos
            $this->mergeWhen(isset($this->users), [
                'users'  => $this->users,
            ]),
        ];
}
