<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller\Common;

use Api\ParkApi\v1\Controller\BaseController;
use Api\ParkApi\v1\Request\UploadRequest;
use Api\ParkApi\v1\Service\UploadFileService;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\GetMapping;

use Mine\Annotation\Auth;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

#[Controller(prefix: 'api/v1'), Auth('xcx')]
class UploadController extends BaseController
{
    #[Inject]
    protected UploadFileService $service;

    /**
     * 上传文件.
     * @throws FileExistsException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[PostMapping('upload/file')]
    public function uploadFile(UploadRequest $request): ResponseInterface
    {
        if ($request->validated() && $request->file('file')->isValid()) {
            $data = $this->service->upload(
                $request->file('file'),
                $request->all()
            );
            return empty($data) ? $this->error() : $this->success($data);
        }
        return $this->error(t('system.upload_file_verification_fail'));
    }


    /**
     * 上传图片.
     * @throws FileExistsException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[PostMapping('upload/image')]
    public function uploadImage(UploadRequest $request): ResponseInterface
    {
        if ($request->validated() && $request->file('image')->isValid()) {
            $data = $this->service->upload(
                $request->file('image'),
                $request->all()
            );
            return empty($data) ? $this->error() : $this->success($data);
        }
        return $this->error(t('system.upload_image_verification_fail'));
    }
}
