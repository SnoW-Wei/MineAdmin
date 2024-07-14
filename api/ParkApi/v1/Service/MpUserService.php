<?php
declare(strict_types=1);

namespace Api\ParkApi\v1\Service;

use Api\Interface\UserServiceInterface;
use Api\ParkApi\v1\Mapper\MpUserMapper;
use Hyperf\Contract\ContainerInterface;
use Mine\Abstracts\AbstractService;
use Mine\Annotation\DependProxy;
use Mine\Event\UserAdd;
use Mine\Exception\MineException;
use Mine\Exception\NormalStatusException;
use Mine\MineRequest;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Cache\Annotation\Cacheable;
use Hyperf\Cache\Annotation\CacheEvict;

#[DependProxy(values: [UserServiceInterface::class])]
class MpUserService extends AbstractService implements UserServiceInterface
{
    public $mapper;
    #[Inject]
    protected MineRequest $request;

    protected ContainerInterface $container;

    public function __construct(
        ContainerInterface $container,
        MpUserMapper $mapper,

    ) {
        $this->mapper = $mapper;
        $this->container = $container;
    }

    /**
     * 获取用户信息.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getInfo(?int $userId = null): array
    {
        if ($uid = (is_null($userId) ? user('xcx')->getId() : $userId)) {
            return $this->getCacheInfo($uid);
        }
        throw new MineException(t('system.unable_get_userinfo'), 500);
    }

    /**
     * 新增用户.
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function save(array $data): mixed
    {
        if ($this->mapper->existsByXcxOpenId($data['xcx_open_id'])) {
            throw new NormalStatusException(t('system.username_exists'));
        }
        $id = $this->mapper->save($data);
        $data['id'] = $id;
        event(new UserAdd($data));
        return $id;
    }

    /**
     * 更新用户信息.
     */
    #[CacheEvict(prefix: 'MpLoginInfo', value: 'userId_#{id}')]
    public function update(mixed $id, array $data): bool
    {
        if (isset($data['password'])) {
            unset($data['password']);
        }
        return $this->mapper->update($id, $data);
    }

    /**
     * 用户修改密码
     */
    public function modifyPassword(array $params): bool
    {
        return $this->mapper->initUserPassword(user('xcx')->getId(), $params['newPassword']);
    }

    /**
     * 获取缓存用户信息.
     */
    #[Cacheable(prefix: 'MpLoginInfo', value: 'userId_#{id}', ttl: 0)]
    protected function getCacheInfo(int $id): array
    {
        $user = $this->mapper->getModel()->find($id);
        $user->addHidden('deleted_at','mp_open_id','xcx_open_id','union_open_id', 'password');
        $data['user'] = $user->toArray();
        return $data;
    }
}
