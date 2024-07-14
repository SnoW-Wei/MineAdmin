<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Controller;

use App\Park\Service\ParkBannerService;
use App\Park\Service\ParkAnnounceService;
use App\Park\Service\ParkIconGridService;
use App\Park\Service\ParkNewsArticleService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Psr\Http\Message\ResponseInterface;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\RequestMapping;

#[Controller(prefix: 'api/v1')]
class HomepageController extends  BaseController
{
    #[Inject]
    protected ParkBannerService $parkBannerService;
    #[Inject]
    protected ParkAnnounceService $parkAnnounceService;
    #[Inject]
    protected ParkIconGridService $parkIconGridService;
    #[Inject]
    protected ParkNewsArticleService $parkNewsArticleService;

    #[GetMapping("homepage/index")]
    public function index(): ResponseInterface
    {
        // banner
        $params['banners'] = $this->parkBannerService->getList([],false);
        // 公告
        $params['announce'] = $this->parkAnnounceService->getList([],false);
        // 网格图标
        $params['icon'] = $this->parkIconGridService->getList([],false);
        // 产业新闻
        $params['news'] = $this->parkNewsArticleService->getPageList(['pageSize'=>5],false);
        // 商业活动 todo
        // $params['activity'] = $this->CommerceActivityService->getPageList(['pageSize'=>5],false);

        return $this->success($params, []);
    }

    /**
     * 公告详情
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("announce/{id}")]
    public function announce_read(int $id): ResponseInterface
    {
        return $this->success($this->parkAnnounceService->read($id));
    }

    /**
     * 产业新闻详情
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("news/{id}")]
    public function news_read(int $id): ResponseInterface
    {
        return $this->success($this->parkAnnounceService->read($id));
    }

    /**
     * 产业活动详情
     * @param int $id
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[GetMapping("activity/{id}")]
    public function activity_read(int $id): ResponseInterface
    {
        // todo
        //return $this->success($this->CommerceActivityService->read($id));
    }
}
